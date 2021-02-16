<?php
	session_start();
?>

<html>
<body>
	<?php
		if(!isset($_COOKIE["PHPSESSID"])){
			print ("初回の訪問です。セッションを開始します。");
		}else{
			print("セッションは開始しています。<br> ");
            print("セッションIDは".$_COOKIE["PHPSESSID"]."です。");
		}
	?>
</body>
</html>