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
          // 対象の配列
          $nums = [15, 4, 18, 23, 10];

          // ---------------------------
          // 1. 昇順（小さい順）で表示
          // ---------------------------
          sort($nums); // 標準関数 sort() で並べ替え

          echo "昇順にソートします。<br>" . PHP_EOL;
          foreach ($nums as $val) {
          echo $val . "<br>" . PHP_EOL;
          }

          // 見やすくするために改行を入れる
          echo PHP_EOL;

          // ---------------------------
          // 2. 降順（大きい順）で表示
          // ---------------------------
          rsort($nums); // 標準関数 rsort() で逆順に並べ替え

          echo "降順にソートします。<br>" . PHP_EOL;
          foreach ($nums as $val) {
          echo $val . "<br>" . PHP_EOL;
          }
        ?>
    </p>
</body>
</html>
