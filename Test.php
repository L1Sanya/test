<?php

class User
{
    protected string $name;
    protected int $age;

    public function __construct(string $name, int $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getAge(): int
    {
        return $this->age;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setAge(int $age): void
    {
        $this->age = $age;
    }
}

class Worker extends User
{
    private float $salary;

    public function __construct(string $name, int $age, float $salary)
    {
        parent:: __construct($name, $age);
        $this->salary = $salary;
    }

    public function getSalary(): float
    {
        return $this->salary;
    }

    public function setSalary(int $salary): void
    {
        $this->salary = $salary;
    }
}

class Student extends User
{
    private int $course;
    private float $scholarship;

    public function __construct(string $name, int $age, int $course, float $scholarship)
    {
        parent:: __construct($name, $age);
        $this->course = $course;
        $this->scholarship = $scholarship;
    }

    public function getCourse(): int
    {
        return $this->course;
    }

    public function getScholarship(): float
    {
        return $this->scholarship;
    }

    public function setCourse(string $course): void
    {
        $this->course = $course;
    }
}

enum Category
{
    case A;
    case B;
    case C;
}

class Driver extends Worker
{
    private string $category;
    private int $experience;

    public function __construct(string $name, int $age, float $salary, string $category, int $experience)
    {
        parent:: __construct($name, $age, $salary);
        $this->category = $category;
        $this->experience = $experience;
    }

    public function getCategory(): string
    {
        if ($this->category == Category::A)
            return "A";
        if ($this->category == Category::B)
            return "B";
        if ($this->category == Category::C)
            return "C";
        return "A";
    }

    public function getExperience(): int
    {
        return $this->experience;
    }

    public function setCategory(Category $category): void
    {
        $this->category = $category;
    }

    public function setExperience(int $experience): void
    {
        $this->experience = $experience;
    }
}


$worker1 = new Worker("Иван", "25", "1000");
$worker2 = new Worker("Вася", "26", "2000");
echo "SalarySum = " . $worker1->getSalary() + $worker2->getSalary();

