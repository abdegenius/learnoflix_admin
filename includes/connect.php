<?php
$dsn = "mysql:host=localhost;dbname=learnoflix";
$usr = "root";
$pwd = "";

try { 
    $conn = new PDO($dsn,$usr,$pwd); 
}
catch(PDOException $e){
    echo "ConnectionError: ".$e->getMessage();
}
