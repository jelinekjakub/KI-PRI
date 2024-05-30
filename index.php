<?php
function listFiles($directory) {
    $files = scandir($directory);
    foreach ($files as $file) {
        if ($file != '.' && $file != '..') {
            echo '<a href="' . $directory . '/' . $file . '" class="p-2">' . $file . '</a>';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdn.tailwindcss.com"></script>

    <title>Programování pro internet</title>
</head>
<body>
    <section class="p-16 flex flex-row gap-8 justify-center">
        <nav class="flex flex-col text-right">
            <h2 class="p-2 font-bold">Úkoly z cvičení</h2>
            <a href="cv1.php" class="p-2">Cvičení 1</a>
            <a href="cv2.php" class="p-2">Cvičení 2</a>
            <a href="cv3.php" class="p-2">Cvičení 3</a>
            <a href="cv4.php" class="p-2">Cvičení 4</a>
            <a href="cv5.php" class="p-2">Cvičení 5</a>
            <a href="cv6.php" class="p-2">Cvičení 6</a>
            <a href="cv7.php" class="p-2">Cvičení 7</a>
            <a href="cv8.php" class="p-2">Cvičení 8</a>
            <a href="cv9.php" class="p-2">Cvičení 9</a>
            <a href="cv10.php" class="p-2">Cvičení 10</a>
            <a href="cv11.php" class="p-2">Cvičení 11</a>
        </nav>
        <nav class="flex flex-col gap-0 text-slate-500">
            <h2 class="p-2 font-bold">Soubory adresáře DTD</h2>
            <?php listFiles('dtd'); ?>
        </nav>
        <nav class="flex flex-col gap-0 text-slate-500">
            <h2 class="p-2 font-bold">Soubory adresáře XSD</h2>
            <?php listFiles('xsd'); ?>
        </nav>
        <nav class="flex flex-col gap-0 text-slate-500">
            <h2 class="p-2 font-bold">Soubory adresáře XSL</h2>
            <?php listFiles('xsl'); ?>
        </nav>
        <nav class="flex flex-col gap-0 text-slate-500">
            <h2 class="p-2 font-bold">Soubory adresáře XML</h2>
            <?php listFiles('xml'); ?>
        </nav>
    </section>
</body>
</html>