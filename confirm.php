<?php
session_start();

include 'dbconnect.php';
include 'function.php';

$db = new DbconnectClass();

session_regenerate_id(true);

if (!isset($_SESSION['userId'])) {
	header('Location: ./index.php');
	exit();
}

if (isset($_POST['back'])) {
		$_SESSION['actionName'] = "confirm_back";

		header('Location: ./input.php');
		exit();
}

if (isset($_POST['submit'])) {

	if ($_SESSION['token'] !== $_POST['token']) {
		$_SESSION = array();
		session_destroy();

		header('Location: ./index.php');
		exit();
	}


	if (!checkEmail($_SESSION['email']) || !checkLen($_SESSION['title'], 50) || isBlank($_SESSION['text'])) {

		header('Location: ./input.php');
		exit();
	}


	$stmt = $db->getDbconnect()->prepare('insert into ARTICLE (CREATE_DATE,NAME,EMAIL,TITLE,TEXT,COLOR_ID,DEL_FLG) values(now(),:name,:email,:title,:text,:colorID,0)');
	$stmt->bindParam(':name',$_SESSION['username'], PDO::PARAM_STR);
	$stmt->bindParam(':email',$_SESSION['email'], PDO::PARAM_STR);
	$stmt->bindParam(':title',$_SESSION['title'], PDO::PARAM_STR);
	$stmt->bindParam(':text',$_SESSION['text'], PDO::PARAM_STR);
	$stmt->bindParam(':colorID',$_SESSION['color'], PDO::PARAM_STR);
	$stmt->execute();


	$_SESSION['title'] = "";
	$_SESSION['text'] = "";
	$_SESSION['color'] ="";

	$_SESSION['actionName'] = "confirm_post";

	header('Location: ./complete.php');
	exit();

}

if ($_SESSION['actionName'] == "input_check") {

	$_SESSION['actionName'] = "confirm_display";

	$stmt2 = $db->getDbconnect()->prepare("select COLOR_CODE from COLOR_MASTER where COLOR_ID=:colorID;");
	$stmt2->bindParam(":colorID", $_SESSION['color'], PDO::PARAM_STR);
	$stmt2->execute();
	$row = $stmt2->fetch();

}else{

	header('Location: ./input.php');
	exit();
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="./css/master.css" type="text/css">
	<title>掲示板</title>
</head>
<body>
<header>
掲示板
</header>
<main>
	<div>
		<p>以下の内容で投稿します。</p>
		<form method="POST">
			<div>
			<table class="inputArticle">
				<tr>
					<td class="itemName"><div>名前</div></td>
					<td><div style="color:#<?php echo $row['COLOR_CODE'];?>">
					<?php
					if (isBlank($_SESSION['username'])) {
						echo "nobody";
					}else{
						echo htmlspecialchars($_SESSION['username'],ENT_QUOTES,"UTF-8");
					}
					?>
					</div></td>
				</tr>
				<tr>
					<td class="itemName"><div>E-mail</div></td>
					<td><div style="color:#<?php echo $row['COLOR_CODE'];?>"><?php echo htmlspecialchars($_SESSION['email'],ENT_QUOTES,"UTF-8"); ?></div></td>
				</tr>
				<tr>
					<td class="itemName"><div>タイトル</div></td>
					<td><div style="color:#<?php echo $row['COLOR_CODE'];?>">
					<?php
					if (isBlank($_SESSION['title'])) {
						echo "(no title)";
					}else{
						echo htmlspecialchars($_SESSION['title'], ENT_QUOTES, "UTF-8");
					}
					?>
					</div></td>
				</tr>
				<tr>
					<td class="itemName"><div>本文</div></td>
					<td><div style="color:#<?php echo $row['COLOR_CODE'];?>"><?php echo nl2br(htmlspecialchars($_SESSION['text'], ENT_QUOTES, "UTF-8")); ?></div></td>
				</tr>
			</table>
		</div>
		<div>
			<input class="button" type="submit" name="back" value="戻る">
			<input class="button" type="submit" name="submit" value="投稿">
			<?php
					$token = hash(sha256, session_id());
					$_SESSION['token'] = $token;
				?>
					<input type="hidden" name="token" value="<?php echo $token ?>">
		</div>
		</form>
	</div>
</main>
</body>
</html>