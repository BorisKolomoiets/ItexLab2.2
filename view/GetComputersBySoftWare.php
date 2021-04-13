<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
<?php
include_once '../MongoConnection.php';

$software = $_GET['software'];
$filter = ["software" => $software];
$cursor = $collection->find($filter);

$res = [];
foreach ($cursor as $document) {
    array_push($res, $document);
}
echo "<p>Computers with software: </p><h2 id = 'header'>" . $software . "</h2>";
echo "<pre id = 'content'>" . json_encode($res, JSON_PRETTY_PRINT) . "</pre>";
?>
<footer>
    <script>
        let key = document.getElementById('header').innerText;
        if (localStorage.getItem(key) !== null) {
            localStorage.removeItem(key);
            localStorage.setItem(key, document.getElementById('content').innerText);
        } else {
            localStorage.setItem(key, document.getElementById('content').innerText);
        }
    </script>
</footer>
</body>
</html>

