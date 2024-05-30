<?php
// Database connection settings
$host = 'localhost';
$dbname = 'FakultaDB';
$username = 'root';
$password = '';

// Connect to the database
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Create a new SimpleXMLElement object
    $xmlstr = '<?xml version="1.0" encoding="UTF-8"?><fakulta></fakulta>';
    $fakulta = new SimpleXMLElement($xmlstr);

    // Fetch the dean
    $stmt = $pdo->query("SELECT dekan FROM Fakulta LIMIT 1");
    $dekan = $stmt->fetch(PDO::FETCH_ASSOC);
    $fakulta->addAttribute('dekan', $dekan['dekan']);

    // Fetch the departments
    $stmt = $pdo->query("SELECT zkratka_katedry, webove_stranky FROM Katedra");
    while ($katedra_row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $katedra = $fakulta->addChild('katedra');
        $katedra->addAttribute('zkratka_katedry', $katedra_row['zkratka_katedry']);
        $katedra->addAttribute('webove_stranky', $katedra_row['webove_stranky']);

        // Fetch the head of the department
        $stmt_vedouci = $pdo->prepare("SELECT jmeno, telefon, email FROM Vedouci WHERE zkratka_katedry = ?");
        $stmt_vedouci->execute([$katedra_row['zkratka_katedry']]);
        $vedouci_row = $stmt_vedouci->fetch(PDO::FETCH_ASSOC);

        $vedouci = $katedra->addChild('vedouci');
        $vedouci->addChild('jmeno', $vedouci_row['jmeno']);
        if ($vedouci_row['telefon']) {
            $vedouci->addChild('telefon', $vedouci_row['telefon']);
        }
        if ($vedouci_row['email']) {
            $vedouci->addChild('email', $vedouci_row['email']);
        }

        // Fetch the employees
        $stmt_zamestnanci = $pdo->prepare("SELECT jmeno, telefon, email, pozice FROM Zamestnanci WHERE zkratka_katedry = ?");
        $stmt_zamestnanci->execute([$katedra_row['zkratka_katedry']]);

        $zamestnanci = $katedra->addChild('zamestnanci');
        while ($zamestnanec_row = $stmt_zamestnanci->fetch(PDO::FETCH_ASSOC)) {
            $zamestnanec = $zamestnanci->addChild('zamestnanec');
            $zamestnanec->addChild('jmeno', $zamestnanec_row['jmeno']);
            if ($zamestnanec_row['telefon']) {
                $zamestnanec->addChild('telefon', $zamestnanec_row['telefon']);
            }
            if ($zamestnanec_row['email']) {
                $zamestnanec->addChild('email', $zamestnanec_row['email']);
            }
            if ($zamestnanec_row['pozice']) {
                $pozice = $zamestnanec->addChild('pozice');
                $pozice->addChild($zamestnanec_row['pozice'], '');
            }
        }

        // Fetch the subjects
        $stmt_predmety = $pdo->prepare("SELECT zkratka, typ, nazev, popis FROM Predmety WHERE zkratka_katedry = ?");
        $stmt_predmety->execute([$katedra_row['zkratka_katedry']]);

        $predmety = $katedra->addChild('predmety');
        while ($predmet_row = $stmt_predmety->fetch(PDO::FETCH_ASSOC)) {
            $predmet = $predmety->addChild('predmet');
            $predmet->addAttribute('zkratka', $predmet_row['zkratka']);
            $predmet->addAttribute('typ', $predmet_row['typ'] ?? 'kombinovane');
            $predmet->addChild('nazev', $predmet_row['nazev']);
            if ($predmet_row['popis']) {
                $predmet->addChild('popis', $predmet_row['popis']);
            }
        }
    }

    // Output the XML
    Header('Content-type: text/xml');
    echo $fakulta->asXML();

} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
?>
