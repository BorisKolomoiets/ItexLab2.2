<?php
require 'vendor/autoload.php';
$connection = new MongoDB\Client();
$collection = $connection->LabItex->Computers;