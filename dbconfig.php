<?php

$DB_host = "localhost";
$DB_user = "root";
$DB_pass = "";
$DB_name = "db1042849_registos";


//$DB_host = "10.162.213.148";
//$DB_user = "u1042849_admin";
//$DB_pass = "Itoolgest@12345";
//$DB_name = "db1042849_Registos";


try
{
	$DB_con = new PDO("mysql:host={$DB_host};dbname={$DB_name}",$DB_user,$DB_pass);
	$DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
	echo $e->getMessage();
}

include_once 'class.crud.php';

$crud = new crud($DB_con);

?>