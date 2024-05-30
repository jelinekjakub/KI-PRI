<?php
// Create a new SimpleXMLElement object
$fakulta = new SimpleXMLElement('<fakulta></fakulta>');

// Set the attribute 'děkan'
$fakulta->addAttribute('děkan', 'Ing. Petr Novák');

// Add a department (katedra)
$katedra = $fakulta->addChild('katedra');
$katedra->addAttribute('zkratka_katedry', 'KIV');
$katedra->addAttribute('webové_stránky', 'https://www.kiv.zcu.cz/');

// Add the head of the department (vedoucí)
$vedouci = $katedra->addChild('vedoucí');
$vedouci_jmeno = $vedouci->addChild('jméno', 'Doc. Jana Dvořáková');
$vedouci_kontakt1 = $vedouci->addChild('telefon', '+420 123 456 789');
$vedouci_kontakt2 = $vedouci->addChild('email', 'jana.dvorakova@kiv.zcu.cz');

// Add employees (zaměstnanci)
$zamestnanci = $katedra->addChild('zaměstnanci');
$zamestnanec1 = $zamestnanci->addChild('zaměstnanec');
$zamestnanec1->addChild('jméno', 'Mgr. Pavel Svoboda');
$zamestnanec1->addChild('telefon', '+420 987 654 321');
$zamestnanec1->addChild('email', 'pavel.svoboda@kiv.zcu.cz');
$pozice1 = $zamestnanec1->addChild('pozice');
$pozice1->addChild('asistent', '');

// Add another employee
$zamestnanec2 = $zamestnanci->addChild('zaměstnanec');
$zamestnanec2->addChild('jméno', 'PhDr. Eva Novotná');
$zamestnanec2->addChild('telefon', '+420 654 321 987');
$zamestnanec2->addChild('email', 'eva.novotna@kiv.zcu.cz');
$pozice2 = $zamestnanec2->addChild('pozice');
$pozice2->addChild('docent', '');

// Add subjects (předměty)
$predmety = $katedra->addChild('předměty');

$predmet1 = $predmety->addChild('předmět');
$predmet1->addAttribute('zkratka', 'KIV/WEB');
$predmet1->addAttribute('typ', 'seminář');
$predmet1->addChild('název', 'Webové aplikace');
$predmet1->addChild('popis', 'Kurz zaměřený na tvorbu webových aplikací.');

$predmet2 = $predmety->addChild('předmět');
$predmet2->addAttribute('zkratka', 'KIV/DBS');
$predmet2->addAttribute('typ', 'přednáška');
$predmet2->addChild('název', 'Databázové systémy');
$predmet2->addChild('popis', 'Kurz pokrývající základy databázových systémů.');

// Output the XML
Header('Content-type: text/xml');
echo $fakulta->asXML();