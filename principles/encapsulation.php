<?php

namespace App\BlackBox;

class BlackBox {

    private $data = [];

    public function addLog($message) {
        $this->data[] = $message;
    }

    public function getDataByEngineer(Engineer $engineer)
    {
        return $this->data;
    }
}

class Plane {

    private $blackBox;

    public function __construct(BlackBox $blackBox)
    {
        $this->blackBox = $blackBox;
    }

    public function flyAndCrush()
    {
        $this->flyProcess();
        $this->crushProcess();
    }

    public function flyProcess()
    {
        echo 'Самолет летит' . PHP_EOL;
        $this->addLog('Координаты самолета: в небе');
    }

    public function crushProcess()
    {
        echo 'Самолет потерпел крушение' . PHP_EOL;
        $this->addLog('Координаты самолета: на земле');
    }

    protected function addLog($message)
    {
        $this->blackBox->addLog($message);
    }

    public function getBoxForEngineer(Engineer $engineer)
    {
       return $engineer->setBox($this->blackBox);
    }


}

class AnotherPlane extends Plane
{
    public function flyProcess()
    {
        echo 'Самолет летит по-другому' . PHP_EOL;
        $this->addLog('Летит очень высоко');
    }

    public function crushProcess()
    {
        echo 'Упал очень неудачно' . PHP_EOL;
        $this->addLog('Все живые, все хорошо');
    }
}

class Engineer {

    private $blackbox;

    public function setBox(BlackBox $blackBox)
    {
        return $blackBox->getDataByEngineer($this);
    }

    public function takeBox(Plane $plane)
    {
       $this->blackbox = $plane->getBoxForEngineer($this);
    }

    public function decodeBox()
    {
        foreach ($this->blackbox as $message){
            echo $message . PHP_EOL;
        }
    }
}
$blackBox = new BlackBox();
$blackBox2 = new BlackBox();
$plane = new Plane($blackBox);
$plane2 = new AnotherPlane($blackBox2);
$engineer = new Engineer();

$plane->flyAndCrush();
$engineer->takeBox($plane);
$engineer->decodeBox();



$plane2->flyAndCrush();
$engineer->takeBox($plane2);
$engineer->decodeBox();
