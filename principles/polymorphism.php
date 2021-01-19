<?php

namespace App\Forge;

class Forge
{
    public function burn($object)
    {
        $flame = $object->burn();
        echo $flame->render((string)$object) . PHP_EOL;
    }
}

class BlueFlame
{
    public function render($name)
    {
        return $name . ' сгорел синем пламенем';
    }
}

class RedFlame
{
    public function render($name)
    {
        return $name . ' сгорел ярко-красным пламенем';
    }
}

class Smoke
{
    public function render($name)
    {
        return $name . ' лишь задымился';
    }
}

class Thing
{
    public $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function __toString()
    {
        return $this->name;
    }

    public function burn()
    {

    }
}

class Flammable extends Thing
{
    public function burn()
    {
        return new RedFlame();
    }
}

class HeavyFlammable extends Thing
{
    public function burn()
    {
        return new Smoke();
    }
}

class Chemical extends Thing
{
    public function burn()
    {
        return new BlueFlame();
    }

}

class FlammableToo extends Thing
{
    public function burn()
    {
        return new RedFlame();
    }
}

class AnotherChemical extends Thing
{
    public function burn()
    {
        return new BlueFlame();
    }
}

class NewFlammable extends Thing
{
    public function burn()
    {
        return new Smoke();
    }
}
$forge = new Forge();

$piano = new HeavyFlammable('пианино');
$chicken = new Flammable('курица');
$hydrogen = new Chemical('водород');
$polyethylene = new AnotherChemical('полиэтилен');
$paper = new FlammableToo('бумага');

$forge->burn($piano);
$forge->burn($chicken);
$forge->burn($hydrogen);
$forge->burn($polyethylene);
$forge->burn($paper);

$newObject = new NewFlammable('Странная вещица');

$forge->burn($newObject);


