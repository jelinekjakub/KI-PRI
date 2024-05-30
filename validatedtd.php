<!DOCTYPE html>
<html lang="cs">

<?php $title = 'XML validátor' ?>

<head>
    <title><?= $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 p-6">
    <div class="max-w-3xl mx-auto bg-white p-8 shadow-lg rounded-lg">
        <h1 class="text-3xl font-bold mb-6"><?= $title ?></h1>
        <p class="mb-4">Nahrajte XML soubor, případně také DTD soubor.</p>
        <hr class="mb-4">

        <form enctype="multipart/form-data" method="POST" class="space-y-4">
            <div class="flex items-center">
                <label class="w-32" for="xml">XML soubor:</label>
                <input type="file" name="xml" accept="text/xml" data-max-file-size="2M" class="flex-1 border border-gray-300 p-2 rounded">
            </div>
            <div class="flex items-center">
                <label class="w-32" for="dtd">DTD soubor:</label>
                <input type="file" name="dtd" data-max-file-size="2M" class="flex-1 border border-gray-300 p-2 rounded">
            </div>
            <div class="flex justify-end">
                <input type="submit" value="Odeslat" class="bg-blue-500 text-white px-4 py-2 rounded cursor-pointer">
            </div>
        </form>
        <hr class="my-4">

        <?php
        function printErrors()
        { ?>
            <table class="w-full border-collapse">
                <thead>
                    <tr>
                        <th class="border px-4 py-2">Řádek</th>
                        <th class="border px-4 py-2">Chyba</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach (libxml_get_errors() as $error) { ?>
                        <tr>
                            <td class="border px-4 py-2"><?= $error->line ?></td>
                            <td class="border px-4 py-2"><?= $error->message ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php
        }

        function validate($xmlPath, $dtdPath = '')
        {
            $doc = new DOMDocument;

            libxml_use_internal_errors(true);
            $doc->loadXML(file_get_contents($xmlPath));
            printErrors();
            libxml_use_internal_errors(false);

            @$root = $doc->firstElementChild->tagName;
            if ($root && $dtdPath) {
                $systemId = 'data://text/plain;base64,' . base64_encode(file_get_contents($dtdPath));

                echo "<p class='my-4'>Validuji podle DTD. Kořen: <b>$root</b></p>";

                $creator = new DOMImplementation;
                $doctype = $creator->createDocumentType($root, '', $systemId);
                $newDoc = $creator->createDocument(null, '', $doctype);
                $newDoc->encoding = "utf-8";

                $oldRootNode = $doc->getElementsByTagName($root)->item(0);
                $newRootNode = $newDoc->importNode($oldRootNode, true);

                $newDoc->appendChild($newRootNode);
                $doc = $newDoc;
            }

            libxml_use_internal_errors(true);
            $isValid = $doc->validate();
            printErrors();
            libxml_use_internal_errors(false);

            return $isValid;
        }

        $xmlFile = @$_FILES['xml'];
        $dtdFile = @$_FILES['dtd'];

        if (@$xmlTmpName = $xmlFile['tmp_name']) {
            $dtdTmpName = $dtdFile['tmp_name'];
            $isValid = validate($xmlTmpName, $dtdTmpName);
            if ($isValid)
                echo "<p class='text-green-500'>Nahraný XML soubor je validní.</p>";
        }
        ?>
    </div>
</body>

</html>
