<?php
session_start( );

include 'dbconnect.php';
include 'Function.php';

$db = new DBconnnectCLASS();

if (isset($_SESSION['userId'])) {
        header('Location: ./input.php');
        exit();
		}

if (isset($_POST['Login'])) {
		//シートログイン押下時の記述
	if ($_POST['Login'] == 'ログイン') {

		$err = "";

		if (isBlank($_POST['userID'])) {
			$err = "「ID」";
		}

		if (isBlank($_POST['password'])) {
			$err .= "「パスワード」";
		}

		if (isBlank($err)) {
			$stmt = $db->getconnnect()->prepare("select USER_ID, USER_NAME, EMAIL from ACCOUNT where USER_ID=:userID AND USER_PASS=:userPS;");
			$stmt->bindParam(":userID", $_POST['userID'], PDO::PARAM_STR);
			$stmt->bindParam(":userPS", $_POST['password'], PDO::PARAM_STR);
			$stmt->execute();
			$row = $stmt->fetch();

				if ($row['EMAIL'] =="" && $row['USER_NAME'] =="" && $row['USER_ID'] =="") {

				$err = "「ID]「パスワード」が存在しません";
			}else{
				$_SESSION['userId'] = $row['USER_ID'];
				$_SESSION['username'] = $row['USER_NAME'];
				$_SESSION['email'] = $row['EMAIL'];

				$_SESSION['actionName'] = "index_login";

				header('Location: ./input.php');  // 一覧画面へ遷移
				exit();  // 処理終了
				}

		}else{
			$err .="が入力されていません" ;
			}
		}
	}else{
	$_SESSION['actionName'] = "index_display";
}

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
		<p><?php echo '<FONT COLOR="RED">'.$err.'</FONT>'; ?></p>
		<form action="" method="POST" name="Form1">
			<p>
				<label class="itemName">ID:</label>
				<input type="text" name="userID" value="<?php if (!isBlank($_POST["userID"])) {echo htmlspecialchars($_POST["userID"], ENT_QUOTES);} ?>">
			</p>
			<p>
				<label class="itemName">パスワード:</label>
				<input type="password" name="password" value="">
			</p>
			<div>
				<input class="button" type="submit" name="Login" value="ログイン">
			</div>
		</form>
	</div>
</main>
</body>
</html>