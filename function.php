<?php

function checkEmail($param1) {
	// param1 = $_SESSION['email']
		$reg_str = '/[a-zA-Z0-9]+@(test\.co\.jp)$/';
		//a-zA-Z0-9を1回以上使用し、@test.co.jpのアドレスを固定。
		if (!$param1 == "" && !preg_match($reg_str, $param1)) {
			return false;
		} else {
			return true;
		}
	}

function checkLen($param1, $param2) {
		// $param1 = $_SESSION['']
		if (mb_strlen ( $param1 ) > $param2) {
			return false;
		} else {
			return true;
		}
	}

function isBlank($param1) {
		if ($param1 == "") {
			return true;
		} else {
			return false;
		}
	}


?>