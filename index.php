<?php
session_start();
include "common.php";

$_SESSION['username'];
if (isset($_SESSION['username'])) {
        header('Location: /input.php');
        exit();
    }
if (isset($_POST['Login'])) {
	if ($_POST['Login'] == 'ログイン') {
		//シートログイン押下時の記述
	}else{
		$_SESSION['actionName'] = "index_display";
	}
}
$err = "";
if (isBlank($_POST['userID'])==true){
	$err='ID';
}
if (isBlank($_POST['password'])==true){
	$err.='パスワード';
}
if (isBlank($err)==true){
	return;
}else{
	$err.="が入力されていません";
}

$stmt = $db->prepare("select from ACCOUNT WHERE USER_ID = $_POST['userID'] && ("select from ACCOUNT WHERE USER_PASS") = $_POST['password'];
$stmt->execute();
$row = $stmt->fetch();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="./css/master.css" type="text/css">
  <title>掲示板</title>
</head>
<body>
<header>
   掲示板
</header>
<main>
  <div>
     <p>あなたのIDとパスワードを入力してログインしてください。</p>
     <form action="./input.html" method="post">
       <p>
          <label class="itemName">ID:</label>
          <input type="text" name="userID" value="">
       </p>
       <p>
          <label class="itemName">パスワード:</label>
          <input type="password" name="password">
       </p>
       <div>
          <input class="button" type="submit" name="Login" value="ログイン">
       </div>
     </form>
    </div>
</main>
</body>
</html>
