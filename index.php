<?php
include "common.php";
$db = new DbconnectClass ();
@session_start ();
$other = 'test1';
$test2 = "";
if (isset ( $_SESSION ['userid'] )) {
	header ( 'Location: /input.php' );
	exit ();
}
if (isset ( $_POST ['Login'] )) {
	if ($_POST ['Login'] == 'ログイン') {
		// シートログイン押下時の記述
	} else {
		$_SESSION ['actionName'] = "index_display";
	}
}

$err = "";

if (isBlank ( $_POST ['userID'] )) {
	$err = 'ID';
}
if (isBlank ( $_POST ['password'] )) {
	$err .= 'パスワード';
}
if (isBlank ( $err )) {
	// return;
} else {
	$err .= "が入力されていません";
}
// 入力されたIDとPASSで2箇所PHP側で判断　PASS=で照合
//$stmt = $db->getdbconnect()->prepare("select * from ACCOUNT group by USER_PASS = :test2");
//$query = "select from ACCOUNT where USER_ID=:other"
//select * from ACCOUNT where USER_ID = 'test1';
//$query = "select * from ACCOUNT where USER_ID=:other";
$query2 = "select USER_PASS from ACCOUNT where USER_ID = (select USER_ID from ACCOUNT where USER_ID='test1')";
$stmt = $db->getdbconnect()->prepare($query2);
$stmt->bindValue(":other","$other",PDO::PARAM_STR);
//$stmt = $pdo->prepare($query);
//$stmt = $dbh->prepare('SELECT * FROM ACCOUNT WHERE USER_ID = :other');
$stmt->execute();
$count = $stmt ->fetchColumn();
echo $count;

//$query2 = "select * from ACCOUNT where USER_PASS =:count";
//$stmt2 = $db->getdbconnect()->prepare($query2);
//$stmt2->bindValue(":count","$count",PDO::PARAM_STR);
//$stmt2->execute();
//$ans = $stmt2->fetchColumn();
//echo $ans;
//$name = "\". $name . "\";
//$stmt->bindParam(':name',$name, PDO::PARAM_STR);

?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="./css/master.css" type="text/css">
<title>掲示板</title>
</head>
<body>
	<header> 掲示板 </header>
	<main>
	<div>
		<p>あなたのIDとパスワードを入力してログインしてください。</p>
		<form action="./input.html" method="post">
			<p>
				<label class="itemName">ID:</label> <input type="text" name="userID"
					value="">
			</p>
			<p>
				<label class="itemName">パスワード:</label> <input type="password"
					name="password">
			</p>
			<div>
				<input class="button" type="submit" name="Login" value="ログイン">
			</div>
		</form>
	</div>
	</main>
</body>
</html>