<?php

interface DiscountStrategy
{
    public function apply(float $total): float;
}


class NoDiscount implements DiscountStrategy
{
    public function apply(float $total): float
    {
        return $total;
    }
}


class PercentageDiscount implements DiscountStrategy
{
    private float $percentage;

    public function __construct(float $percentage)
    {
        if ($percentage < 0 || $percentage > 100) {
            throw new InvalidArgumentException(
                "Percentage must be between 0 and 100."
            );
        }

        $this->percentage = $percentage;
    }

    public function apply(float $total): float
    {
        return $total - ($total * $this->percentage / 100);
    }
}


class Product
{
    public function __construct(
        private string $name,
        private float $price
    ) {
    }

    public function getPrice(): float
    {
        return $this->price;
    }
}


class CartItem
{
    public function __construct(
        private Product $product,
        private int $quantity
    ) {
        if ($quantity <= 0) {
            throw new InvalidArgumentException(
                "Quantity must be greater than zero."
            );
        }
    }

    public function getSubtotal(): float
    {
        return $this->product->getPrice() * $this->quantity;
    }
}


class Cart
{
    private array $items = [];

    public function __construct(
        private DiscountStrategy $discountStrategy
    ) {
    }

    public function addItem(CartItem $item): void
    {
        $this->items[] = $item;
    }

    public function getTotal(): float
    {
        $total = 0;

        foreach ($this->items as $item) {
            $total += $item->getSubtotal();
        }

        return $total;
    }

    public function getFinalTotal(): float
    {
        return $this->discountStrategy->apply($this->getTotal());
    }
}


// Product Object
$product = new Product("Cocktail", 500);

// Cart item instantiation
$item = new CartItem($product, 2);


// This is when there is no discount
$cart1 = new Cart(new NoDiscount());
$cart1->addItem($item);

echo "No discount: " . $cart1->getFinalTotal() . PHP_EOL;


// This is the 10% discount
$cart2 = new Cart(new PercentageDiscount(10));
$cart2->addItem($item);

echo "10% discount: " . $cart2->getFinalTotal() . PHP_EOL;
