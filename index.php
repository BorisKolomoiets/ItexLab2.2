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
include_once 'MongoConnection.php';
$software = [];
$list = $collection->find();
?>
<div class="block">
    <h2>Get Computers by processor type</h2>
    <form action="/view/GetComputerByProcessor.php" method="get">
        <p>
            <input type="text" name="processor" id="processor"/>
        </p>
        <button type="submit">Get Computers</button>
    </form>
    <p> History: </p>
    <div id="historyProcessor">
    </div>
    <button onclick="getHistory('processor','historyProcessor')">Get history</button>
</div>

<div class="block">
    <h2>Get Computers by software</h2>
    <form action="/view/GetComputersBySoftWare.php" method="get">
        <p>
            <select name='software' id = 'software'>
                <option disabled>select software</option>
                <?php
                foreach ($list as $document) {
                    for ($i = 0; $i < count($document['software']); $i++) {
                        array_push($software, $document['software'][$i]);
                    }
                }
                for ($i = 0; $i < count($software); $i++) {
                    echo "<option value='" . $software[$i] . "'>" . $software[$i] . "</option>";
                }
                ?>
            </select>
        </p>
        <button type="submit">Get Computers</button>
    </form>
    <p> History: </p>
    <div id="historySoftware">
    </div>
    <button onclick="getHistory('software','historySoftware')">Get history</button>
</div>

<div class="block">
    <h2>Get Computers with bad garantee up to date</h2>
    <form action="/view/GetComputerWithBadGarantee.php" method="get">
        <p>
            <input type="datetime-local" name="date" id="date">
        </p>
        <button type="submit">Get Computers</button>
    </form>
    <p> History: </p>
    <div id="historyDate">
    </div>
    <button onclick="getHistory('date','historyDate')">Get history</button>
</div>
<script>
    function getHistory(inputClassName, elementId) {
        let key = document.getElementById(inputClassName).value;
        if (key === "") {
            alert("History not found for empty parameter");
        } else {
            document.getElementById(elementId).innerHTML = JSON.stringify(JSON.parse(localStorage.getItem(key)),null,2);
        }
    }
</script>
</body>
</html>
