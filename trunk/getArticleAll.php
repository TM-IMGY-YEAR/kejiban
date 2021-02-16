<?php
	$dsn = "mysql:host=localhost;dbname=SLJ;charset=UTF-8";
	$user = "root";
	$password = "sljslj";
	$db = new PDO($dsn, $user, $password);

	try {
		$db = new PDO($dsn , $user , $password);

		$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	} catch (PDOExceptioin $e) {
		die("エラー:". $e->getMessage());
	}
	$stmt = $db->prepare("select * from ARTICLE");
	$stmt->execute();

	$row = $stmt->fetch();

	while ($row = $stmt->fetch ()) {
		echo "ARTICLE_ID:" .$row ['ARTICLE_ID']. "<br>";
		echo "CREATE_DATE:" .$row ['CREATE_DATE']. "<br>";
		echo "NAME:" .$row ['NAME']. "<br>";
		echo "EMAIL:" .$row ['EMAIL']. "<br>";
		echo "TITLE:" .$row ['TITLE']. "<br>";
		echo "TEXT:" .$row ['TEXT']. "<br>";
		echo "COLOR_ID" .$row ['COLOR_ID']. "<br>";
		echo "DEL_FLG:" .$row ['DEL_FLG']. "<br><br>";
	}
?>