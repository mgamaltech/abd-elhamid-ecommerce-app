<?php

$products = [
    ["name" => "kofta" ,"price" => 500, "in_stock" => true],
    ["name" => "salata" , "price" => 200, "in_stock" => false],
    ["name" => "kago" , "price" => 900, "in_stock" => true],
    ["name" => "mango" , "price" => 300, "in_stock" => false],
    ["name" => "apple" , "price" => 100, "in_stock" => false],
];

function filterAvailableProducts($products):array
{
    $available_in_stock = [];
    foreach ($products as $product) {

        if($product["in_stock"] == true)
        {
            $available_in_stock[] = $product;

        }


    }
    return $available_in_stock;
}





function sortProductsByPrice($products):array
{
    uasort($products, function ($a, $b) {
        return $a["price"] <=> $b["price"];
    });
    return $products;


}

$availableProducts = filterAvailableProducts($products);
$sortedProducts = sortProductsByPrice($availableProducts);

echo "The available products in stock are: ";
    foreach ($sortedProducts as $product) {
        echo $product["name"] . " - " . $product["price"] . "\n";
    }
