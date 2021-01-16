<?php

namespace App\InternetStore;

use App\User\User;

require $_SERVER['DOCUMENT_ROOT'] . "/objects/task2_1/User.php";

class Order {

    public $basket = NULL;

    public function __construct(Basket $basket)
    {
        $this->basket = $basket;
    }

    public function getBasket()
    {
        return $this->basket;
    }

    public function getPrice()
    {
        return $this->basket->getPrice();
    }

}

class Basket
{
    public $basket = [];

    public function addProduct(Product $product, $quantity)
    {
        $this->basket[] = [
          'product' => $product,
          'quantity' => $quantity
        ];
    }

    public function getPrice()
    {
        $basketPriceSum = 0;
        foreach ($this->basket as $product) {
            $basketPriceSum += $product['product']->getprice() * $product['quantity'];
        }
        return $basketPriceSum;
    }

    public function describe()
    {
        $result = '';
        foreach ($this->basket as $product) {
            $result .= $product['product']->getname() . ' - ' . $product['product']->getprice() . ' - ' . $product['quantity'] . "<br>";
        }
        return $result;
    }

}

class Product
{
    public $name;
    public $price;

    public function __construct($name, $price)
    {
        $this->name = $name;
        $this->price = $price;
    }

    public function getName ()
    {
        return $this->name;
    }

    public function getPrice()
    {
        return $this->price;
    }
}

$basket = new Basket;

$product1 = new Product('Продукт 1', 100);
$product2 = new Product('Продукт 2', 200);
$product3 = new Product('Продукт 3', 300);

$basket->addProduct($product1,2);
$basket->addProduct($product2, 4);
$basket->addProduct($product3, 10);

$order = new Order($basket);

echo $order->getBasket()->describe() . 'Общая стоимость заказа ' . $order->getPrice() . "<br>";

$newUser = new User('Николай Николаич', 'nikola@mail.ru', 'Мужской', 44,'');
$newUser->notify('Для вас создан заказ, на сумму ' . $order->getPrice() . '. Сотав: ' . $order->getBasket()->describe());
