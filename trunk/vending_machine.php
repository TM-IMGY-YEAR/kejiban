<?php
     // function vending_machine($price,$juice_name) {
     // 	if ($price >= 120) {
     // 		return $juice_name . "のお買い上げありがとうございます";
     // 	} else {
     // 		return $juice_name . "の購入金額が不足しています";
     // 	}
     // }
?>

<?php
     // echo vending_machine(120,"オレンジジュース");  //引数に値を直接指定

     // $drink_price = 90;
     // $drink_name = "アップルジュース";

     // echo vending_machine($drink_price,$drink_name);  //引数に変数を指定

     // function vending_machine($price,$juice_name) {
	 //  if ($price >= 120) {
		//   return $juice_name . "のお買い上げありがとうございます！<br>";
	   // } else {
		//   return $juice_name . "の購入金額が不足しています。<br>";
	   // }
     // }
?>

<?php
class VendingMachine{

	private $maker = "翔栄電気";

	public function buy($money) {
		$message = "";
		if ($money >= 150) {

			$message .= "お買い上げありがとうございます<br>";
			$message .= $this->lucky();

		} else {

			$message .= "購入金額が不足しています<br>";

		}
		return $message;
	}

	private function lucky() {
		        if (rand(1, 10) == 1) {
		        	         return "もう一本サービス！<br>";
		        } else {
		        	         return "ハズレ<br>";
		        }
	}

	public function getMaker() {
		      return $this->maker;
	}
}
 class CupnoodleVendor extends VendingMachine {
 	      private $maker = "翔栄エレクトロニクス";

 	      public function getMaker() {
 	      	        return $this->maker;
 	      }
 }
?>