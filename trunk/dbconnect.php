<?php
 class  DbConnectClass {
 	public function getDbConnect() {

 		$dsn = "mysql:host=localhost;dbname=SLJ;charset=UTF-8";
 		$user = "root";
 		$password = "sljslj";

 		try {

 			$db = new PDO($dsn, $user, $password);

 			$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
 			return $db;

 		} catch (PDOExceptioin $e) {
 			header('Location: ./error.php');

 		}
 	}
 }
 ?>