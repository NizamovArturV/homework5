<?php

namespace App\ToyFactory;

class ToyFactory
{
    public function createToy($name)
    {
        return new Toy($name, rand(100, 1000));
    }
}

class Toy
{
    public $name;
    public $price;

    public function __construct($name, $price)
    {
        $this->name = $name;
        $this->price = $price;
    }
}

$toyFactory = new ToyFactory;


$toysCount = rand (5,20);
$toysPriceSum = 0;
$createdToys = [];

for ($i=1; $i < $toysCount; $i++) {
    $createdToys[] = $toyFactory->createToy("Игрушка $i");
}

foreach ($createdToys as $toy) {
    echo "Название игрушки " . $toy->name . ' - Стоимость игрушки ' . $toy->price . "<br>";
    $toysPriceSum += $toy->price;
}

echo 'Итого - ' . $toysPriceSum;
