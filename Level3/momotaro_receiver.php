<html>
  <head><title>桃太郎メーカー</title></head>
  <body>
    <h1>桃太郎メーカー</h1>
    <h3>
    <?php
      // 関連ファイルを読み込む
      require_once("momotaro_func.php");
      require_once("momotaro_table.php");

      // POSTデータで変換前の文字列を取得
      $name = $_POST["momotaro"];

      // 文字列を、10進のコードに変換する。
      $code = name_to_code($name);
      //debug_print($code);

      // コード(10進)を元に、3種の動物のレベル(0～9)を決める
      $dog    = code_to_level($code, 3);
      $bird   = code_to_level($code, 5);
      $monkey = code_to_level($code, 7);

      // 桃太郎メーカーのメッセージ表示
      if ($name == "") $name = "(名無しさん)";
      print $name."に付いてきてくれる動物は。。。<br><br>";

      // 家来を描画する
      draw_companion($dog, $bird, $monkey, $dog_list, $bird_list, $monkey_list);

      // 三種の動物のレベル平均をとり、該当するメッセージを表示
      $ave = intval(($dog + $bird + $monkey) / 3);
      print $result_list[$ave]['result']."<br>";
    ?>
    </h3>
    <br>
    <a href="momotaro_maker.php">診断に戻る</a>
  </body>
</html>