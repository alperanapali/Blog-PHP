<?php
$PDO_host = "172.16.17.92:3308";
$PDO_user = "root";
$PDO_password = "root";
$PDO_db_name = "newblog";

// Setting DSN
$dsn = 'mysql:host=' . $PDO_host . ';dbname=' . $PDO_db_name;

// Creating a PDO instance
try {
    $conn = new PDO($dsn, $PDO_user, $PDO_password);
    //setting the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
