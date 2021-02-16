<?php

class DbconnectClass {

public function getDbconnect(){

		$dsn = 'mysql:host=localhost;dbname=SLJ;charset=utf8';
		$user = 'root';
		$password = 'sljslj';

	try {
		$db = new PDO($dsn,$user,$password);
		$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		return $db;

	} catch (PDOException $e){
		header('Location: ./error.php');
	}

	}
}


?>