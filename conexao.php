<?php
session_start();
error_reporting(0);
$s = session_id();
$options_array = array (
    'expires' => time()+60*60*24*30,
    'httponly' => true
);
setcookie('us_uuid', $s, $options_array);
setcookie('PHPSESSID', $s, $options_array);
	try {
		$dns = "mysql:dbname=fastalk;host=localhost:3306";
		$user = "root";
		$pass = "";
		$pdo = new PDO($dns, $user, $pass);
	}catch (PDOException $e){
		echo "";
	}

	define ('HOST', 'localhost:3306');
	define ('USER', 'root');
	define ('PASS', '');
	define ('DATABASE', 'Fastalk');
	
	$conexao = mysqli_connect(HOST, USER, PASS, DATABASE);

?>