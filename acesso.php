<?php	

		
		session_start(); // Starting Session
		$error=''; // Variable To Store Error Message
		if (isset($_POST['submit'])) {
		if (empty($_POST['username']) || empty($_POST['password'])) {
		$error = "Nome ou password incorreto..";
		}
		else
		{
		// Define $username and $password
		$username=$_POST['username'];
		$password=$_POST['password'];
		// Establishing Connection with Server by passing server_name, user_id and password as a parameter
		//$connection = mysql_connect("10.162.213.148", "u1042849_admin", "Itoolgest@12345");
		$connection = mysql_connect("localhost", "root", "");
		// To protect MySQL injection for Security purpose
		$username = stripslashes($username);
		$password = stripslashes($password);
		$username = mysql_real_escape_string($username);
		$password = mysql_real_escape_string($password);
		// Selecting Database
		//$db = mysql_select_db("db1042849_Registos", $connection);
		$db = mysql_select_db("db1042849_registos", $connection);
		// SQL query to fetch information of registerd users and finds user match.
		$query = mysql_query("select * from login where password='$password' AND username='$username'", $connection);
		$rows = mysql_num_rows($query);
		if ($rows == 1) {
		$_SESSION['login_user']=$username; // Initializing Session
		header("location:index.php"); // Redirecting To Other Page
				include_once 'class.crud.php';

		$crud = new crud($DB_con);
		} else {
		$error = "Nome ou Password incorretos";
		}
		mysql_close($connection); // Closing Connection
		}
		
		}
		
	
?>