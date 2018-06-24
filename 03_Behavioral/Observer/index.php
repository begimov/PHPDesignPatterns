<?php

require 'vendor/autoload.php';

interface Subject
{
    public function attach(Observer $observer);
    public function detach(Observer $observer);
    public function notify();
}

interface Observer
{
    public function handle($event);
}

trait Subjectable
{
    protected $observers = [];

    public function attach(Observer $observer)
    {
        $this->observers[] = $observer;
    }
    public function detach(Observer $observer)
    {
        foreach ($this->observers as $key => $observerVal) {
            if ($observerVal == $observer) {
                unset($this->observers[$key]);
            }
        }
        $this->observers = array_values($this->observers);
    }
    public function notify()
    {
        foreach ($this->observers as $observer) {
            $observer->handle($this);
        }
    }
}

class Login implements Subject
{
    use Subjectable;
}

class MailingListSignup implements Subject
{
    use Subjectable;

    public $user;

    public function __construct($user)
    {
        $this->user = $user;
    }
}

class UpdateMailingStatusInDatabase implements Observer
{
    public function handle($event)
    {
        echo "UpdateMailingStatusInDatabase</br>";
    }
}

class SubscribeUserToService implements Observer
{
    public function handle($event)
    {
        var_dump($event);
        echo "SubscribeUserToService</br>" . $event->user->email;
    }
}

class User
{
    public $id = 10;
    public $email = 'test@test.com';
}

$user = new User();

$event = new MailingListSignup($user);
$event->attach(new UpdateMailingStatusInDatabase());
$event->attach(new SubscribeUserToService());

$event->detach(new UpdateMailingStatusInDatabase());

$event->notify();

// var_dump($event);

// $event->detach(new UpdateMailingStatusInDatabase());
// $event->detach(new SubscribeUserToService());
//
// var_dump($event);
