<?php

interface Subscription
{
    public function price();
    public function description();
}

class BasicSubscription implements Subscription
{
    public function price()
    {
        return 5;
    }

    public function description()
    {
        return 'BasicSubscription';
    }
}

abstract class SubscriptionFeature implements Subscription
{
    protected $subscription;

    public function __construct(Subscription $subscription)
    {
        $this->subscription = $subscription;
    }

    abstract public function price();
    abstract public function description();
}

class AdditionalSpaceFeature extends SubscriptionFeature
{
    public function price()
    {
        return $this->subscription->price() + 3;
    }

    public function description()
    {
        return $this->subscription->description() . ' + AdditionalSpaceFeature';
    }
}

class SupportFeature extends SubscriptionFeature
{
    public function price()
    {
        return $this->subscription->price() + 10;
    }

    public function description()
    {
        return $this->subscription->description() . ' + SupportFeature';
    }
}

// $subscription = new SupportFeature(new AdditionalSpaceFeature(new BasicSubscription));

$subscription = new BasicSubscription;
$subscription = new SupportFeature($subscription);
$subscription = new AdditionalSpaceFeature($subscription);

echo $subscription->price();
echo $subscription->description();

// class Subscription
// {
//     public $cost;
//
//     public function price()
//     {
//         return 5;
//     }
//
//     public function priceWithSupport()
//     {
//         return 2;
//     }
//
//     public function setCost($cost)
//     {
//         $this->cost += $cost;
//     }
//
//     public function getCost()
//     {
//         return $this->cost;
//     }
// }
//
// $sub = new Subscription;
// $sub->setCost($sub->price());
// $sub->setCost($sub->priceWithSupport());
// echo $sub->getCost();
