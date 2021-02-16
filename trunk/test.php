<?php
      //   $name="山田";
      //   $name.="花子";
      //   echo "ようこそ".$name."さん";
?>

<?php
      //   $a = 8;
      //   $b = 3;

      //   echo $a + $b ."<br>";
      //   echo $a - $b ."<br>";
      //   echo $a * $b ."<br>";
      //   echo $a / $b ."<br>";
      //   echo $a % $b ."<br>";

      //   echo 2+3 * 100 ."<br>"; //3＊100が先に計算される
      //   echo (2+3) * 100 ."<br>"; //2+3が先に計算される
?>

<?php
      // $true = TRUE;
      // $false = FALSE;

      // $a = $true && $true;              //どちらもTRUEなので結果はTRUE
      // $b = $true && $false;             //片方がFALSEなので結果はFALSE
      // $c = $true && $true && $true;     //一度に複数の塩酸も可能　TRUE
      // $d = $true && $false && $false;   //FALSE
      // $e = $true && ($true && $false);  //FALSE
      // var_dump($a, $b, $c, $d, $e);
?>

<?php
      // $a = $true || $true;              //どちらもTRUEなので結果はTRUE
      // $b = $true ||  $false;             //片方がTRUEなので結果はFALSE
      // $c = $true || $true && $true;     //一度に複数の演算も可能　TRUE
      // $d = $true || $false && $false;   //TRUE
      // $e = $true || ($true && $false);  //TRUE
      // $f = $false || $false;            //FALSE
      // var_dump($a, $b, $c, $d, $e, $f);
?>

<?php
      // $true = TRUE;
      // $false = FALSE;

      // $a = !$true;                //TRUEの否定なので結果はFALUS
      // $b = !$false;               //FALSEの否定なので結果はTRUE
      // $c = !$true && $true;       //TRUEの否定(FALSE)同士のANDなのでFALSE
      // $d = !($true && $true);     //TRUE同士のANDの結果(TRUE)を反転しFALSE
      // var_dump($a, $b, $c, $d);
?>

<?php
      // $age = 23;
      // if ($age >= 20) {                 //もし20歳以上なら
      // 	        echo "お酒が買えます";   //購入できます
      // } else {                          //それ以外、つまり20歳に満たない場合は
      // 	        echo "お酒は買えません"; //購入できません
      // }
?>

<?php
      //  $i = 0;
      //  switch ($i) {
      // 	case 0:
      //  		      echo "iは0に等しい";
      //  		      break;
      //   	case 1:
      //   		      echo "iは1に等しい";
      //   	          break;
      //   	default:
      //   		      echo "iは0と1のどちらでもない";
      //   		      break;
      //   }
?>

<?php
      // for ($i = 1; $i <= 31; $i++) {
      //  	     echo $i . " ";
      // 	     if($i % 7 == 0) {
      //  	     	echo "</br>";
      //  	     }
      // }
?>

<?php
         //文字列の配列
      //   $friends = array("はるき","かおる","ひでと","まさとし","たかのり");
      //   var_dump($friends);        //配列の中身を確認

         //数値の配列
      //   $numbers = array(128,256,512,1024,2048);
      //   var_dump($numbers);       //配列の中身を確認
?>

<?php
      //  $friends[] = "はるき";
      //  $friends[] = "かおる";
      //  $friends[] = "ひでと";
      //  $friends[] = "まさとし";
      //  $friends[] = "たかのり";
      //  var_dump($friends);
?>

<?php
      //  $class1 = array("はるき","かおる","ひでと");
      //  $class2 = array("ゆきこ","ゆか","まなみ");
      //  $students = array($class1,$class2);

      //  var_dump($students);
 ?>

 <?php
      // 基本の連想配列を作成
      // $result = array(
      //         "japanese" =>80,
 		//       "math" => 75,
 		//       "science" => 90,
 		//       "history" => 85,
 		//       "english" => 80);

    //  var_dump($result); // 連想配列の確認

      // mathの点数を上書き
    //  $result["math"] = 85;
    //  var_dump($result); // 連想配列の確認

      //musicの点数を追加
    //  $result["music"] = 90;
    //  var_dump($result); //連想配列の確認
 ?>

 <?php
     //   $result = array(
     //   		"japanese" => 80,
     //   		"math" => 75,
     //   		"english" => 80);

     //   foreach ($result as $score) {
     //   	echo $score . "<br>";
     //   }
 ?>

 <?php
       //  $result = array(
  		//         "japanese" => 80,
   		//         "math" => 75,
 		//         "english" => 80);

 		//  foreach ($result as $title => $score) {
    	//         echo $title . ":" . $score . "<br>";
 		//  }
 ?>

 <?php
       //  function get_price($price) {
 	   //          $price = $price * 1.10;
 	   //          return $price; //return $price * 1.10;としてもいい
       //  }

       //  echo get_price(300);
 ?>

