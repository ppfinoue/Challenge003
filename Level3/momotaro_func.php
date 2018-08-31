<?php

  // --------------------------------
  //   名前をコード(10進)に変換する
  // --------------------------------
  function name_to_code($name)
  {
      $code = 0;

      //一文字ずつ分解して、文字コード(10進)の合計値を算出
      for ($i = 0; $i < mb_strlen($name); $i++)
      {
        // 文字を一文字ずつ取り出す
        $char = mb_substr($name, $i, 1);
        // 文字→16進数値→10進数値と変換して、合計値をとる
        $code += hexdec(bin2hex($char));
      }

      // 計算した合計値を返す
      return $code;
  }

  // -----------------------------------------
  //   コード(10進)をレベル(0～9)に変換する
  // -----------------------------------------
  function code_to_level($code, $seed)
  {
      // レベル値計算
      $level = $code / $seed % 10;
      
      // 計算したレベル値を返す
      return $level;
  }

  // ------------------
  //   デバッグ出力
  // ------------------
  function debug_print($msg)
  {
      print $msg."<br>";
  }

  // --------------------
  //   お伴を描画する
  // --------------------
  function draw_companion($dog, $bird, $monkey, $dog_list, $bird_list, $monkey_list)
  {
      $gz = imagecreatetruecolor(600, 200);
      //$white = imagecolorallocate($gz, 255, 255, 255);
      //$font = 'font/arial.ttf';

      //横に並べて、お伴の動物を描画
      $dog_img = imagecreatefromjpeg('img/dog/'.$dog_list[$dog]["image"]);
      imagecopy($gz, $dog_img, 0, 0, 0, 0, 200, 200);
      $bird_img = imagecreatefromjpeg('img/bird/'.$bird_list[$bird]["image"]);
      imagecopy($gz, $bird_img, 200, 0, 0, 0, 200, 200);
      $monkey_img = imagecreatefromjpeg('img/monkey/'.$monkey_list[$monkey]["image"]);
      imagecopy($gz, $monkey_img, 400, 0, 0, 0, 200, 200);

      //動物の名前を書きたいが、うまく表示されない？今回は断念。。。
      //imagettftext($gz, 20, 0,  10, 80, $white, $font,  $dog_list[$dog]["name"]);
      //imagettftext($gz, 20, 0, 110, 80, $col, $font, $bird_list[$bird]["name"]);
      //imagettftext($gz, 20, 0, 210, 80, $col, $font, $monkey_list[$monkey]["name"]);

      // 画像の保存と表示
      imagepng($gz, "companion.png");
      imagedestroy($gz);
      print "<img src='companion.png'><br>";

      // うまく画像中に描画できないので、文字で書く。
      print "【犬】".$dog_list[$dog]["name"]."　　　";
      print "【鳥】".$bird_list[$bird]["name"]."　　　";
      print "【猿】".$monkey_list[$monkey]["name"];
      print "<br><br>";

  }

?>