<?php

namespace App\Farm;

class Farm
{
    public $animals = [];

    public function addAnimal(Animal $animal)
    {
        $this->animals[] = $animal;
        $animal->walk();
    }

    public function rollCall()
    {
        foreach ($this->animals as $animal) {
            $animal->say();
        }
    }
}

class BirdFarm extends Farm {

    public function showAnimalsCount()
    {
        echo 'Птиц на ферме: ' . count($this->animals) . PHP_EOL;
    }

    public function addAnimal(Animal $animal)
    {
        parent::addAnimal($animal);
        $this->showAnimalsCount();
    }
}

class Farmer {

    public function addAnimal(Farm $farm, Animal $animal)
    {
        $farm->addAnimal($animal);
    }

    public function rollCall(Farm $farm)
    {
        $farm->rollCall();
    }
}


class Animal
{
    public function say()
    {

    }

    public function walk()
    {

    }

}

class Ungulates extends Animal {

    public function walk()
    {
        echo 'топ-топ' . PHP_EOL;
    }
}

class Bird extends Animal {

    public function tryToFly() {
        echo 'Вжих-вжих-топ-топ' . PHP_EOL;
    }

    public function walk()
    {
        $this->tryToFly();
    }
}

class Cow extends Ungulates
{

    public function say()
    {
        echo 'Муу' . PHP_EOL;
    }
}

class Pig extends Ungulates
{

    public function say()
    {
        echo 'Хрю' . PHP_EOL;
    }
}

class Chicken extends Bird
{

    public function say()
    {
        echo 'Ко-ко' . PHP_EOL;
    }
}

class Goose extends Bird {

    public function say()
    {
        echo 'Га-га' . PHP_EOL;
    }
}

class Turkey extends Bird {

    public function say()
    {
        echo 'КрикИндюка' . PHP_EOL;
    }
}

class Horse extends Ungulates {

    public function say()
    {
        echo 'Иго-го' . PHP_EOL;
    }
}

$farm = new Farm();
$birdFarm = new BirdFarm();
$farmer = new Farmer();

$cow = new Cow();
$pig1 = new Pig();
$pig2 = new Pig();
$chicken = new Chicken();
$turkey1 = new Turkey();
$turkey2 = new Turkey();
$turkey3 = new Turkey();
$horse1 = new Horse();
$horse2 = new Horse();
$goose = new Goose();

$farmer->addAnimal($farm, $cow);
$farmer->addAnimal($farm, $pig1);
$farmer->addAnimal($farm, $pig2);
$farmer->addAnimal($birdFarm, $chicken);
$farmer->addAnimal($birdFarm,$turkey1);
$farmer->addAnimal($birdFarm,$turkey2);
$farmer->addAnimal($birdFarm,$turkey3);
$farmer->addAnimal($farm,$horse1);
$farmer->addAnimal($farm,$horse2);
$farmer->addAnimal($birdFarm,$goose);

$farmer->rollCall($farm);
$farmer->rollCall($birdFarm);