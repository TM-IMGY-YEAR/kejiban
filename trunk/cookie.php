<?php
	if(isset ( $_COOKIE["test"])){
		$count = $_COOKIE["test"] + 1 ;
	}else{
		$count = 1 ;
	}
	$flag = setcookie("test",$count);
?>

<html>
<body>
	<?php
		print ("<p>訪問回数は".$count."回目です</p>");
	?>
</body>
</html>