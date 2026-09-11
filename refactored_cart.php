<?php

//$items = [["name" => "banana","price" => 20,"quantity" => 3],
 //   ["name" => "mango" , "price" => 50 , "quantity" => 4],
 //   ["name" => "apple" , "price" => 700 , "quantity" => 5]
//];

$subtotal = 0;
function calculateSubtotal($items):float
{
    $subtotal = 0;

    foreach ($items as $item) {
        $subtotal += $item["price"] * $item["quantity"];
    }
    return $subtotal;
}

function calculateDiscount($subtotal):float
{
    if($subtotal >= 1000)
    {
        return $subtotal * 0.10;
        //$discount = $subtotal * (10 / 100);
        //$subtotal_after_discount = $subtotal - $discount;
        //$final_total = $subtotal_after_discount;
        //return "subtotal = : " . $subtotal . "\n" . "discount = : " . $discount . "\n" . "final total after discount = ".$final_total;
    }
    return 0;
    /*
    else
    {
        $final_total = $subtotal;
        return "final total = ".$final_total;
    }
    */
}

$items = [["name" => "apple" , "price" => 700 , "quantity" => 5]];
// $items = [["name" => "banana","price" => 20,"quantity" => 3]];
$subtotal = calculateSubtotal($items);
$discount = calculateDiscount($subtotal);
$finalTotal = $subtotal - $discount;

echo "Subtotal = : " . $subtotal . "\n";
echo "Discount = : " . $discount . "\n";
echo "Final Total: " . $finalTotal . "\n";




