<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdn.tailwindcss.com"></script>

    <title>Programování pro internet</title>
</head>
<body>
    <div id="5-2">
        <h1 class="mb-2 text-xl font-bold">Úkol 5.2</h1>
        <?php
        $xml = simplexml_load_file('xml/prf.xml');
        print_r($xml);
        ?>
    </div>
    <hr class="my-16">
    <div id="5-3">
        <h1 class="mb-2 text-xl font-bold">Úkol 5.3</h1>
        <?php
        function traverseSimpleXML($xml, $level=0) {
            $space = fn($level) => str_repeat(' ', $level * 2);
        
            $attributes = $xml->attributes();
        
            foreach ($attributes as $name => $value) {
                echo $space($level) . "$name - " . (string)$value . "\n";
            }
        
            $children = $xml->children();
            foreach ($children as $name => $value) {
                if(0 < $value->count()) {
                    echo $space($level) . "$name: \n";
                    traverseSimpleXML($value, $level+1);
                } else {
                    echo $space($level) . "$name = " . (string)$value . "\n";
                }
            }
        }
        
        traverseSimpleXML($xml);
        ?>
    </div>
</body>
</html>