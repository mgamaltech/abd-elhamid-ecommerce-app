<?php
$item1 = "item1";
$item2 = "item2";
$item3 = "item3";
$name = "";
$price = 0;
$quantity = 0;
$items = [$item1 => ["banana", 20, 3],
    $item2 => ["mango" , 50 , 4],
    $item3 => ["apple" , 700 , 5]];
$subtotal = 0;

foreach ($items as $item => $value) {
    $subtotal += $value[1] * $value[2];
}

if($subtotal >= 1000)
{
    $discount = $subtotal * (10 / 100);
    $subtotal_after_discount = $subtotal - $discount;
    $final_total = $subtotal_after_discount;
    echo "subtotal = : " . $subtotal . "\n";
    echo "discount = : " . $discount , "\n";
    echo "final total after discount = ".$final_total;
}
else
{
    $final_total = $subtotal;
    echo "final total = ".$final_total;
}

//echo "Subtotal: $subtotal";



