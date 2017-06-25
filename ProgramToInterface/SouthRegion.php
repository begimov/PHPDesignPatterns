<?php

require_once('IAbstract.php');

class SouthRegion extends IAbstract
{
    private $city;

    public function __construct($data, $city)
    {
        $this->valueNow = $data;
        $this->city = $city;
    }

    protected function giveCost()
    {
        return $this->valueNow;
    }

    protected function giveCity()
    {
        return $this->city;
    }
}
