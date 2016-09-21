<?php
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
//$connection = mysql_connect("10.162.213.148", "u1042849_admin", "Itoolgest@12345");
$connection = mysql_connect("localhost", "root", "");
// Selecting Database
$db = mysql_select_db("db1042849_registos", $connection);
//$db = mysql_select_db("db1042849_Registos", $connection);
session_start();// Starting Session
// Storing Session
$user_check=$_SESSION['login_user'];
// SQL Query To Fetch Complete Information Of User
$ses_sql=mysql_query("select username from login where username='$user_check'", $connection);
$row = mysql_fetch_assoc($ses_sql);
$login_session =$row['username'];
if(!isset($login_session)){
mysql_close($connection); // Closing Connection
header('Location: index.php'); // Redirecting To Home Page
}
?>