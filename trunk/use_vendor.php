<?php
    //  include "vendor.php";
    //  echo vending_machine(120,"オレンジジュース");  //引数に値を直接指定

    //  $drink_price = 90;
    //  $drink_name = "アップルジュース";

    //  echo vending_machine($drink_price,$drink_name);  //引数に変数を指定
?>

<?php
      include "vending_machine.php";

      $vendor = new CupnoodleVendor();
      echo $vendor->buy(180);
      echo "製造元:" . $vendor->getMaker() . "<br>";
   //   echo $vendor->maker . "<br>";
?>