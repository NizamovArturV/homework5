<?php

namespace App\User;

class User
{
    public $fullName;
    public $email;
    public $gender;
    public $age;
    public $phone;

    public function __construct($fullName, $email, $gender = '', $age = '', $phone = '')
    {
        $this->fullName = $fullName;
        $this->email = $email;
        $this->gender = $gender;
        $this->age = $age;
        $this->phone = $phone;
    }

    public function notifyOnEmail($message)
    {
        $notify = new Notification($this->fullName, 'email', $this->email);
        return $notify->send($message);
    }

    public function notifyOnPhone($message)
    {
        $notify = new Notification($this->fullName, 'phone', $this->phone);
        return $notify->send($message);
    }

    public function censor($message)
    {
        return $message = ($this->age < 18) ? 'Подтвердите свой возраст' : $message;
    }

    public function notify ($message)
    {
        $notify = $this->notifyOnEmail($this->censor($message));
        if ($this->phone !== '') {
            $notify .= $this->notifyOnPhone($this->censor($message));
        }
        return $notify;
    }
}

class Notification
{
    public $receiver;
    public $via;
    public $to;

    public function __construct($receiver, $via, $to)
    {
        $this->receiver = $receiver;
        $this->via = $via;
        $this->to = $to;
    }

    public function send($message)
    {
        echo 'Уведомление клиенту ' . $this->receiver . ' на ' . $this->via . " ($this->to): " . $message . "<br>";
    }
}

$user1 = new User('Артур Низамов', 'mail@mail.com', 'Мужской', 23, '89998887755');
$user2 = new User('Несовершеннолетний с телефоном', 'mail1@mail.ru','',15,'89998887766');
$user3 = new User('Несовершеннолетний без телефона', 'mail2@mail.ru','',16);
$user1->notify('Hello!');
$user2->notify('Привет!');
$user3->notify('Привет!');
