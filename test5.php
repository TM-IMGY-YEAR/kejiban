<?php
//以下コメントアウト内のFC=フローチャート

session_start( );

include 'commonFunction.php';

$db = new DbFunction();

if (isset($_SESSION['userId'])) {
	header('Location: ./input.php');
	exit();
}

//FC ログインボタンを押したor押さないの判定
if (isset($_POST['Login'])) {
		//シートログイン押下時の記述
	if ($_POST['Login'] == 'ログイン') {
		$err = "";
	}
		//FC 空文字チェック isBlank($_POST['userID'])、エラーメッセージ記入
	if (isBlank($_POST['userID'])) {
		$err = "「ID」";
	}
	if (isBlank($_POST['password'])) {
		$err .= "「パスワード」";
	}
	/*FC DBのACCOUNTテーブルからUSER_IDが$_POST['userID']に一致、
		 かつUSER_PASSが$_POST['password"]に一致するデータを取得*/
	if (isBlank($err)) {
		$stmt = $db->DbFunction()->prepare("select USER_ID,
				 USER_NAME, EMAIL from ACCOUNT where
				 USER_ID=:userID AND USER_PASS=:userPass;");

		//1つ目=stmt内ID,2つ目=入力フォーム,3つ目=文字列ということ
		$stmt->bindValue(":userID", $_POST['userID'], PDO::PARAM_STR);
		$stmt->bindValue(":userPass", $_POST['password'], PDO::PARAM_STR);

		$stmt->execute();

		$row = $stmt->fetch();
		//FC データがDBに無い場合、$errに"存在しません"を追加
		if ($row['EMAIL'] =="" && $row['USER_NAME'] ==
				"" && $row['USER_ID'] =="") {
			$err = "「ID]「パスワード」が存在しません";

		//FC $_SESSIONにACCOUNTデータを格納
		}else{
			$_SESSION['userId'] = $row['USER_ID'];
			$_SESSION['userName'] = $row['USER_NAME'];
			$_SESSION['email'] = $row['EMAIL'];

			//FC $_SESSION["actionName"]に"index_login"を格納
			$_SESSION['actionName'] = "index_login";
			//FC 一覧画面(input.php)へ遷移
			header('Location: ./input.php');
			exit();  // 処理終了
		}
	}else{
		$err .="が入力されていません" ;
	}
	//FC $_SESSION["actionName"]に"index_display"を格納（=何もしていない）
}else{
	$_SESSION['actionName'] = "index_display";
}

/*
 $stmt = $db->prepare("select USER_ID, USER_PASS from ACCOUNT
 where USER_ID = $_POST['userID']
 && USER_PASS = $_POST['password']");

 $stmt = $db->prepare($s_Query);
 $stmt -> execute();
 $row = $stmt -> fetchAll();
 */
/* $stmt = $db->prepare("select USER_ID, USER_PASS from ACCOUNT");
 		USER_ID == $_POST['userID'] && USER_PASS == $_POST['password'];

 $stmt->execute();

 $row = $stmt -> fetchAll(PDO::FETCH_ASSOC);

 $stmt = $db->prepare("select from ACCOUNT WHERE USER_ID = $_POST['userID']
 			&& ("select from ACCOUNT WHERE USER_PASS") = $_POST['password'];
 $stmt->execute();
 $row = $stmt->fetch();
*/


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
<!-- エラー項目赤字で出るようになっている -->
		<?php if ($err != ""){}echo '<FONT COLOR="RED">'.$err.'</FONT>'; ?>
		<form action="" method="POST" name="Form1">
			<p>
				<label class="itemName">ID:</label>
				<input type="text" name="userID" value =
				"<?php if (!empty($_POST["userID"]))
				 {echo htmlspecialchars($_POST["userID"], ENT_QUOTES);} ?>">
			</p>
			<p>
				<label class="itemName">パスワード:</label>
				<input type="password" name="password" value =
				"<?php if (!empty($_POST["password"]))
				{echo htmlspecialchars($_POST["USER_PASS"], ENT_QUOTES);} ?>">
			</p>
			<div>
				<input class="button" type="submit" name="Login" value="ログイン">
			</div>
			<div>
				<input type="submit" name="logout" value="ログアウト">
			</div>
		</form>
	</div>
</main>
</body>
</html>