<html>
  <head><title>暗号メーカー</title></head>
  <body>
    <h1>暗号メーカー</h1>
    <h3>
    <?php
      // POSTデータで変換前の文字列を取得
      $name = $_POST["code"];
      for ($i = 0; $i < mb_strlen($name); $i++)
      {
          // 文字を一文字ずつ取り出す
          $char = mb_substr($name, $i, 1);
	  // 文字→16進数値→10進数値と変換する
          $val = hexdec(bin2hex($char));
	  // 100を足して、10進数値→16進数値→文字へと逆変換する
          $conv = sprintf("%X", $val + 100);
          // 最後の1文字を抜き出す
          $lastidx = mb_strlen($conv) - 1;
          $conv = mb_substr($conv, $lastidx, 1);
          // 出力
          print $conv;
      }
    ?>
    </h3>
    <br>
    <a href="code_maker.php">診断に戻る</a>
  </body>
</html>