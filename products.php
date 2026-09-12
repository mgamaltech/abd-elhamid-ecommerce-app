<?php

$products = [
    ["name" => "kofta" ,"price" => 500, "in_stock" => true],
    ["name" => "salata" , "price" => 200, "in_stock" => false],
    ["name" => "kago" , "price" => 900, "in_stock" => true],
    ["name" => "mango" , "price" => 300, "in_stock" => false],
    ["name" => "apple" , "price" => 100, "in_stock" => false],
];

$available_in_stock = [];
foreach ($products as $product) {

    if ($product["in_stock"] == true) {
        $available_in_stock[] = $product;


    }
}

    uasort($available_in_stock, function ($a, $b) {
        return $a["price"] <=> $b["price"];
    });

    echo "The available products in stock are: ";

    foreach ($available_in_stock as $product) {
        echo $product["name"] . " - " . $product["price"] . "\n";


}

// var_dump($available_in_stock);



// var_dump($products);