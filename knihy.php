<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdn.tailwindcss.com"></script>

    <title>Programování pro internet</title>
    <script src="js/ajax.js"></script>
    <script src="js/dom.js"></script>

    <style>
      body.dark {
        background: lightgray;
      }
    </style>
  </head>

  <body onload="loadXML('./xml/knihy.xml', processDOM)">
    <div id="knihy">Knihy</div>
  </body>
</html>