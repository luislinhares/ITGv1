<?php
$host = "10.162.213.148";
$dbname = "db1042849_Registos";
$dbuser = "u1042849_admin";
$password = "Itoolgest@12345";

try {
    $conn = new PDO("pgsql:dbname=$dbname;host=$host", $dbuser, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
    }
catch(PDOException $e)
    {
    echo "Não foi possível estabelecer a ligação: " . $e->getMessage();
    }
 
?>