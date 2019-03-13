<?php
include "createDB.php";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bakeryOrdersDB";

try {
    $conn = new PDO("mysql:host=$servername;dbname=bakeryOrdersDB", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>