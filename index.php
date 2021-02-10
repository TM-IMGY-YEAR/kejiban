<?php

session_start( );

include 'dbFunction.php';

$db = new DBfunctionCLASS();

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
 			$stmt = $db->getconnection()->prepare("SELECT USER_ID, USER_PASS FROM ACCOUNT");
 			$stmt->execute();
 			//$row = $stmt->fetch();

 			if ($row['USER_ID'] == $_POST['userID'] && $row['USER_PASS'] == $_POST['password']) {

 				$_SESSION['userId'] = ACCOUNT.USER_ID;
 				$_SESSION['userName'] = ACCOUNT.USER_NAME;
 				$_SESSION['email'] = ACCOUNT.EMAIL;

 				$_SESSION['actionName'] = "index_login";

 				header('Location: ./input.php');  // 一覧画面へ遷移
 				exit();  // 処理終了

 			}else{
				$err = "「ID」「パスワード」が存在しません";

			}

		}else{
			$err .= "が入力されていません";
		}}

		}

	}else{
	$_SESSION['actionName'] = "index_display";
	}


// $stmt = $db->prepare("select USER_ID, USER_PASS from ACCOUNT");
// 		USER_ID == $_POST['userID'] && USER_PASS == $_POST['password'];

// $stmt->execute();

// $row = $stmt -> fetchAll(PDO::FETCH_ASSOC);

// $stmt = $db->prepare("select from ACCOUNT WHERE USER_ID = $_POST['userID'] && ("select from ACCOUNT WHERE USER_PASS") = $_POST['password'];
// $stmt->execute();
// $row = $stmt->fetch();



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
				<input type="text" name="userID" value="<?php if (!empty($_POST["userID"])) {echo htmlspecialchars($_POST["userID"], ENT_QUOTES);} ?>">
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