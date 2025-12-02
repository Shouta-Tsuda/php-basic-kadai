<?php
declare(strict_types=1);
?>

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
        class Food{
            public $name;
            public $price;

            public function __construct(string $name, string $price){
                $this->name = $name;
                $this->price = $price;
            }

            public function show_price() {
            echo $this->price . '<br>';
            }
        }

        class Animal{
            public $name;
            public $height;
            public $weight;

            public function __construct(string $name, string $height, string $weight){
                $this->name = $name;
                $this->height = $height;
                $this->weight = $weight;
            }

            public function show_height() {
            echo $this->height . '<br>';
            }
        }



        $potato = new Food('ポテト',200);
        print_r($potato);
        $potato->show_price();
        

        $zoo = new Animal('ポテト',200,600);
        print_r($zoo);
        $zoo->show_height();

        ?>
    </p>

</body>
</html>
