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
      // 独自のソート関数を作成
      // 引数1: &$array (ソートする配列・参照渡し)
      // 引数2: $order (TRUEなら昇順、FALSEなら降順)
      // ---------------------------------------------------------
      function sort_2way(&$array, $order) {
          if ($order) {
              // TRUE の場合は昇順 (sort)
              sort($array);
              echo "昇順にソートします。<br>" . PHP_EOL;
          } else {
              // FALSE の場合は降順 (rsort)
              rsort($array);
              echo "降順にソートします。<br>" . PHP_EOL;
          }
      }

      // 対象の配列
      $nums = [15, 4, 18, 23, 10];

      // ---------------------------
      // 1. 昇順（TRUE）で呼び出し
      // ---------------------------
      sort_2way($nums, true);

      foreach ($nums as $val) {
          echo $val . "<br>" . PHP_EOL;
      }

      // 見やすくするために改行を入れる
      echo "<br>" . PHP_EOL;

      // ---------------------------
      // 2. 降順（FALSE）で呼び出し
      // ---------------------------
      sort_2way($nums, false);

      foreach ($nums as $val) {
          echo $val . "<br>" . PHP_EOL;
      }
    ?>
    </p>
</body>
</html>
