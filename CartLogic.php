<?php



class Product
{
    private string $name;
    private float $price;

    public function __construct(string $name, float $price)
    {
        $this->name = $name;
        $this->price = $price;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): float
    {
        return $this->price;
    }
}


class CartItem
{
    private Product $product;
    private int $quantity;

    public function __construct(Product $product, int $quantity)
    {
        if ($quantity <= 0) {
            throw new InvalidArgumentException(
                "Quantity must be greater than zero."
            );
        }

        $this->product = $product;
        $this->quantity = $quantity;
    }

    public function getSubtotal(): float
    {
        return $this->product->getPrice() * $this->quantity;
    }
}


class Cart
{
    private array $items = [];

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
}


// Create products
$apple = new Product("apple", 150);
$banana = new Product("banana", 300);
$mango = new Product("mango", 950);


// Create cart items
$appleItem = new CartItem($apple, 1);
$bananaItem = new CartItem($banana, 2);
$mangoItem = new CartItem($mango, 1);


// Create cart
$cart = new Cart(new NoDiscount());


// Add items to cart
$cart->addItem($appleItem);
$cart->addItem($bananaItem);
$cart->addItem($mangoItem);


// Print final total
echo "Cart Total: " . $cart->getTotal();