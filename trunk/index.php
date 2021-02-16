<?php
session_start();
include 'dbconnect.php';
include 'common.php';

$db = new DbConnectClass();

if (isset($_SESSION['userId'])) {
	header('Location: ./input.php');
	exit();
}

if (isset($_POST['Login'])) {

		$err = "";

		if (isBlank($_POST['userID'])) {
			$err = "「ID」";
		}

		if (isBlank($_POST['password'])) {
			$err .= "「パスワード」";
		}
		/*DBのACCOUNTテーブルからUSER_IDが$_POST['userID']に一致、
		 かつUSER_PASSが$_POST['password"]に一致するデータを取得*/
		if (isBlank($err)) {
			$stmt = $db->getDbConnect()->prepare( "select USER_ID,USER_NAME,EMAIL from ACCOUNT where USER_ID=:userID AND USER_PASS=:userPS;");
			$stmt->bindParam(":userID", $_POST['userID'], PDO::PARAM_STR);
			$stmt->bindParam(":userPS", $_POST['password'], PDO::PARAM_STR);
			$stmt->execute();
			$row = $stmt ->fetch();

			//データがDBにない場合、$errに"存在しません"を追加
			if (!$row['EMAIL'] == "" && !$row['USER_NAME'] =="" && !$row['USER_ID'] =="") {
				$_SESSION['userId'] = $row['USER_ID'];
				$_SESSION['userName'] = $row['USER_NAME'];
				$_SESSION['email'] = $row['EMAIL'];

				//$_SESSION["actionName"]に"index_login"を格納
				$_SESSION['actionName'] = "index_login";

				//FC 一覧画面(input.php)へ遷移
				header('Location: ./input.php');
				exit();  // 処理終了
			}
		}else{
			$err .= "が入力されていません";
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
     <form action="" method="post" name="Form1">
       <p>
          <label class="itemName">ID:</label>
          <input type="text" name="userID" value="">
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