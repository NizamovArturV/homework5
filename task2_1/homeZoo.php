<?php

namespace App\HomeZoo;

class Cat {
    public $name;

    public function __construct($name)
    {
        $this->name = $name;
    }
}

class Dog {
    public $name;

    public function __construct($name)
    {
        $this->name = $name;
    }
}

class Fish {
    public $name;

    public function __construct($name)
    {
        $this->name = $name;
    }
}

$cat1 = new Cat("Пушок");
$cat2 = new Cat("Мурзик");
$cat3 = new Cat("Рыжик");

$dog1 = new Dog("Шарик");
$dog2 = new Dog("Шурик");
$dog3 = new Dog("Артемон");
$dog4 = new Dog("Барбос");
$dog5 = new Dog("Ляля");

$fish1 = new Fish("Немо");

class HungryCat
{
    public $name;
    public $color;
    public $favoriteFood;

    public function __construct($name,$color,$favoriteFood)
    {
        $this->name = $name;
        $this->color = $color;
        $this->favoriteFood = $favoriteFood;
    }

    public function eat($food)
    {
        $result = 'Голодный кот ' . $this->name . ', особые приметы: цвет - ' . $this->color . ', съел ' . $food;
        $result .= ($food === $this->favoriteFood) ? ' и замурчал мррррр от своей любимой еды' : '';
        $result .= "<br>";
        return $result;
    }
}

$HungryCat1 = new HungryCat('Кот 1', 'Серый', 'Рыба');
$HungryCat2 = new HungryCat('Кот 2', 'Белый', 'Китикет');

echo $HungryCat1->eat('Мясо');
echo $HungryCat1->eat('Молоко');
echo $HungryCat1->eat('Сыр');
echo $HungryCat1->eat('Рыба');
echo $HungryCat1->eat('Китикет');

echo $HungryCat2->eat('Мясо');
echo $HungryCat2->eat('Молоко');
echo $HungryCat2->eat('Сыр');
echo $HungryCat2->eat('Рыба');
echo $HungryCat2->eat('Китикет');






