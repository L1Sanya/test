<?php

class User
{
    private string $name;
    private string $surname;
    private int $phoneNumber;
    private Basket $basket;


    public function getName(): string
    {
        return $this->name;
    }
    public function setName(string $name): void
    {
        $this->name = $name;
    }
    public function getSurname(): string
    {
        return $this->surname;
    }
    public function setSurname(string $surname): void
    {
        $this->surname = $surname;
    }
    public function getPhoneNumber(): int
    {
        return $this->phoneNumber;
    }
    public function setPhoneNumber(int $phoneNumber): void
    {
        $this->phoneNumber = $phoneNumber;
    }

    public function __construct(string $name, string $surname, int $phoneNumber)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->phoneNumber = $phoneNumber;
    }

    public function getBasket(): Basket
    {
        return $this->basket;
    }

    public function setBasket(Basket $basket): void
    {
        $this->basket = $basket;
    }
}


class Good
{
    protected string $name;
    protected float $cost;

    public function __construct(string $name, float $cost)
    {
        $this->name = $name;
        $this->cost = $cost;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName()
    {
        $this->name = $name;
    }

    public function setCost(float $cost): void
    {
        $this->cost = $cost;
    }

    public function getCost(): float
    {
        return $this->cost;
    }

    public function getDescription(): string
    {
        return $this->name . ' | ' . $this->cost . ' USD | ';
    }
}

class Cloth extends Good
{
    private string $size;

    public function __construct(string $name,float $cost,string $size)
    {
        parent::__construct($name, $cost);
        $this->setSize($size);
    }

    public function getSize()
    {
        return $this->size;
    }

    public function setSize($size)
    {
        if (in_array($size, ["S", "M", "L"]))
        {
            $this->size = $size;
        }
        else
        {
            throw new Exception("Неверный размер одежды. Допустимые значения: S, M, L");
        }
    }
    public function getDescription(): string
    {
        return "Cloth -> " . parent::getDescription() .'  '. $this->getSize() . " size" ."\n";
    }
}



class Product extends Good
{
    private int $expirationDate;

    public function __construct(string $name, float $cost, int $expirationDate)
    {
        parent::__construct($name, $cost);
        $this->expirationDate = $expirationDate;
    }

    public function getExpirationDate(): int
    {
        return $this->expirationDate;
    }

    public function setExpirationDate(int $expirationDate): void
    {
        $this->expirationDate = $expirationDate;
    }
    public function getDescription(): string
    {
        return "Product -> " . parent::getDescription() .' ' . $this->expirationDate . " days \n";
    }
}

class Basket
{
    private $basket = [];

    public function getArray(): array
    {
        return $this->basket;
    }

    public function addToBasketCloth(Cloth $cloth)
    {
        $this->basket[] = $cloth;
    }

    public function addToBasketProduct(Product $product)
    {
        $this->basket[] = $product;
    }

    public function removeFromBasket(int $index)
    {
        unset($this->basket[$index]);
    }

    public function getBasketTotalCost(): float
    {
        $totalCost = 0;
        foreach ($this->basket as $item)
        {
            $totalCost += $item->getCost();
        }
        return $totalCost;
    }

    public function clearBasket(): void
    {
        $this->basket = [];
    }
}
$user1 = new User("Ivan", "Ivanov", "+38012345678", []);

$cloth1 = new Cloth("T-shirt", "10.99", "S");
$cloth2 = new Cloth("Jeans", "25.99", "L");
$cloth3 = new Cloth("Jacket", "50.99", "M");
$cloth4 = new Cloth("Dress", "30.99", "S");
$cloth5 = new Cloth("Skirt", "15.99", "L");

$product1 = new Product("Bread", "2.99", "30");
$product2 = new Product("Milk", "3.99", "30");
$product3 = new Product("Eggs", "4.99", "30");
$product4 = new Product("Butter", "5.99", "30");
$product5 = new Product("Cheese", "6.99", "30");

$basket1 = new Basket();

$basket1->addToBasketCloth($cloth1);
$basket1->addToBasketCloth($cloth2);
$basket1->addToBasketCloth($cloth3);
$basket1->addToBasketCloth($cloth4);
$basket1->addToBasketCloth($cloth5);
$basket1->addToBasketProduct($product1);
$basket1->addToBasketProduct($product2);
$basket1->addToBasketProduct($product3);
$basket1->addToBasketProduct($product4);
$basket1->addToBasketProduct($product5);
$basket1->removeFromBasket(0);

$user1->setBasket($basket1);

foreach ($user1->getBasket()->getArray() as $item)
{
    echo $item->getDescription() . "<br>";
}

echo "Total Cost: " .$user1->getBasket()->getBasketTotalCost() . " USD \n";



?>