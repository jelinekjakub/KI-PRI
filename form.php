<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com?plugins=forms"></script>
    <title>Programování pro internet</title>
</head>
<body class="bg-gray-100 flex flex-col items-center justify-center">

    <?php $myName = htmlspecialchars(@$_REQUEST['my-name']); ?>

    <form method='post' class="bg-white p-6 mt-6 rounded-lg shadow-md w-full max-w-sm">
        <div class="mb-4">
            <label for="my-name" class="block text-gray-700 text-sm font-bold mb-2">Name</label>
            <input type="text" id="my-name" name="my-name" value="<?= $myName ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div class="flex items-center justify-between">
            <input type="submit" value="Submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline cursor-pointer">
        </div>
    </form>

    <pre class="mt-6 p-6 bg-white rounded-lg shadow-md max-w-3xl overflow-auto">
        <?php
        echo 'GET:' . PHP_EOL;
        print_r($_GET);
        echo 'POST:' . PHP_EOL;
        print_r($_POST);
        echo 'REQUEST:' . PHP_EOL;
        print_r($_REQUEST);
        echo 'SERVER:' . PHP_EOL;
        print_r($_SERVER);
        ?>
    </pre>

</body>
</html>
