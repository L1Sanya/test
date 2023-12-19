<?php

abstract class Car
{
    protected string $name;
    protected string $color;
    protected string $model;
    protected float $price;
    protected Engine $engine;


    public abstract function setName(string $name);
    public abstract function getName(): string;
    public abstract function setColor(string $color);
    public abstract function getColor(): string;
    public abstract function setModel(string $model);
    public abstract function getModel(): string;
    public abstract function setPrice(float $price);
    public abstract function getPrice(): float;
    public abstract function getEngine(): Engine;
    public abstract function getEnginePowering(): string;
}

class ElectricalCar extends Car
{
    private float $batteryCapacity;

    public function __construct(string $name,string $color,string $model,float $price,float $batteryCapacity, Engine $engine)
    {
        $this->name = $name;
        $this->color = $color;
        $this->model = $model;
        $this->price = $price;
        $this->batteryCapacity = $batteryCapacity;
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

    public function getEngine(): Engine
    {
        return $this->engine;
    }
    public function getEnginePowering(): string
    {
        return "Charger";
    }
}

class FuelCar extends Car
{
    private float $fuelCapacity;

    public function __construct(string $name,string $color,string $model,float $price,float $fuelCapacity, Engine $engine)
    {
        $this->name = $name;
        $this->color = $color;
        $this->model = $model;
        $this->price = $price;
        $this->fuelCapacity = $fuelCapacity;
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

    public function getEngine(): Engine
    {
        return $this->engine;
    }

    public function getEnginePowering(): string
    {
        return "Fuel";
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
$fuelCar1 = new FuelCar("BMW","Black","X5",50000,40,$engine1);
$electricalCar1 = new ElectricalCar("Tesla","White","Model 3",70000,100,$engine2);

echo $fuelCar1->getEngine()->getPower(). "\n";
echo $electricalCar1->getEngine()->getPower(). "\n";
echo $fuelCar1->getEnginePowering(). "\n";
echo $electricalCar1->getEnginePowering(). "\n";
echo $fuelCar1->getPrice();


?>