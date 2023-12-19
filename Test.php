<?php

class Car
{
    private string $name;
    private string $color;
    private string $model;
    private float $price;
    private Engine $engine;

    public function __construct(string $name,string $color,string $model,float $price, Engine $engine)
    {
        $this->name = $name;
        $this->color = $color;
        $this->model = $model;
        $this->price = $price;
        $this->engine = $engine;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setColor(string $color)
    {
        $this->color = $color;
    }

    public function getColor(): string
    {
        return $this->color;
    }

    public function setModel(string $model)
    {
        $this->model = $model;
    }

    public function getModel(): string
    {
        return $this->model;
    }

    public function setPrice(float $price)
    {
        $this->price = $price;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getEngine()
    {
        return $this->engine;
    }
}

class ElectricalCar extends Car
{
    private float $batteryCapacity;

    public function __construct(string $name,string $color,string $model,float $price,float $batteryCapacity,Engine $engine)
    {
        parent::__construct($name,$color,$model,$price,$engine);
        $this->batteryCapacity = $batteryCapacity;
    }

    public function getEnginePowering(): string
    {
        return "Charger";
    }
}


class Engine
{
    private float $power;


    public function __construct(float $power)
    {
        $this->power = $power;
    }

    public function getPower(): float
    {
        return $this->power;
    }
}
$engine1 = new Engine(100);
$engine2 = new Engine(200);
$car1 = new Car("BMW","Black","X5",50000,$engine1);
$car2 = new ElectricalCar("Tesla","White","Model 3",70000,100,$engine2);

echo $car1->getEngine()->getPower();


?>