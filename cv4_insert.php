<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zobrazení kódu ve stylu GitHub</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-800 p-4">
    <div class="max-w-2xl mx-auto">
        <div class="bg-gray-100 border border-gray-300 rounded-t-md p-2 font-semibold text-gray-700 mt-4">
            Import dat
        </div>
        <pre class="bg-gray-50 border border-gray-300 rounded-b-md p-4 overflow-auto whitespace-pre-wrap">
            <code class="text-xs">
-- Vložení dat o fakultě
INSERT INTO Fakulta (dekan)
VALUES ('Prof. RNDr. Jan Novák, CSc.');

-- Vložení dat o katedře
INSERT INTO Katedra (zkratka_katedry, dekan, webove_stranky)
VALUES ('KBI', 'Prof. RNDr. Jan Novák, CSc.', 'https://www.ujep.cz/cs/kbi');

-- Vložení dat o vedoucím katedry
INSERT INTO Vedouci (zkratka_katedry, jmeno, telefon, email)
VALUES ('KBI', 'Doc. RNDr. Petr Svoboda, Ph.D.', '+420 123 456 789', 'petr.svoboda@ujep.cz');

-- Vložení dat o zaměstnanci
INSERT INTO Zamestnanci (zkratka_katedry, jmeno, telefon, email, pozice)
VALUES ('KBI', 'Mgr. Jana Novotná', '+420 987 654 321', 'jana.novotna@ujep.cz', 'lektor');

-- Vložení dat o předmětu
INSERT INTO Predmety (zkratka_katedry, zkratka, typ, nazev, popis)
VALUES ('KBI', 'BI101', 'přednáška', 'Biologie pro začátečníky', 'Úvod do biologie.');</code>
        </pre>
    </div>
</body>
</html>
