<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP基礎編</title>
</head>

<body>
    <p>
    <?php
      // ---------------------------------------------------------
      // 独自のソート関数
      // 引数1: $array (値渡し。関数内でコピーが作られるため、元の配列は変化しない)
      // 引数2: $order (TRUEなら昇順、FALSEなら降順)
      // ---------------------------------------------------------
      function sort_2way($array, $order) {
          
          // ソート処理の分岐
          if ($order) {
              // TRUE の場合は昇順
              echo "昇順にソートします。<br>" . PHP_EOL;
              sort($array);
          } else {
              // FALSE の場合は降順
              echo "降順にソートします。<br>" . PHP_EOL;
              rsort($array);
          }

          // 表示処理（関数内で完結させる）
          foreach ($array as $val) {
              echo $val . "<br>" . PHP_EOL;
          }
      }

      // ---------------------------
      // メイン処理
      // ---------------------------
      
      // 対象の配列
      $nums = [15, 4, 18, 23, 10];

      // 1. 昇順（TRUE）で呼び出し
      // 関数内で表示まで行われるため、1行書くだけでOK
      sort_2way($nums, true);

      // 表示間隔を見やすくするために改行を入れる
      echo "<br>" . PHP_EOL;

      // 2. 降順（FALSE）で呼び出し
      // 値渡し（コピー）を使っているため、$nums は初期状態のまま渡され、関数内で再びソートされる
      sort_2way($nums, false);
    ?>
  </p>
</body>
</html>
