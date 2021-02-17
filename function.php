<?php

function checkEmail($param1) {
	$limit = '/^[a-zA-Z0-9]+@test\.co\.jp$/';
	//半角英数字を1文字以上使用し、末尾に@test.co.jpのアドレスを$で固定。
	if ($param1 != "" && !preg_match($limit, $param1)) {
		return false;
	}else{
		return true;
	}
}
/*
 * 文字数チェック
 *
 * 【引数】
 * param1：チェック対象文字列
 * param2：文字数
 *
 * 【返り値】
 * TRUE：param1の文字数 <= param2
 * FALSE：param1の文字数 > param2
 */
function checkLen($param1, $param2) {
	//mb_strlenで文字列の長さを取得
	if (mb_strlen ( $param1 ) > $param2) {

		return false;
	}else{
		return true;
	}
}

function isBlank($param1) {
	if ($param1 != "") {
		return false;
	}else{
		return true;
	}
}

?>