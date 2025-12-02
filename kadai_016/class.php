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

            public function set_name(string $name){
                $this->name = $name;
            }

            public function show_name(){
                echo $this->name . '<br>';
            }

            public function set_price(string $price){
                $this->price = $price;
            }

            public function show_price(){
                echo $this->price . '<br>';
            }
        }

        class Animal{
            public $name;
            public $height;
            public $weight;

            public function set_name(string $name){
                $this->name = $name;
            }

            public function show_name(){
                echo $this->name . '<br>';
            }

            public function set_height(string $height){
                $this->height = $height;
            }

            public function show_height(){
                echo $this->height . '<br>';
            }

            public function set_weight(string $weight){
                $this->weight = $weight;
            }

            public function show_weight(){
                echo $this->weight . '<br>';
            }
        }



        $potato = new Food();

        $potato->set_name('ポテト');
        $potato->show_name();
        ?>
    </p>

</body>
</html>
