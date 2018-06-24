<?php

abstract class IAbstract
{
    protected $valueNow;
    //Must return decimal value
    abstract protected function giveCost();
    //Must return string value
    abstract protected function giveCity();

    public function displayShow()
    {
        $stringCost = $this->giveCost();
        $stringCost = (string)$stringCost;
        $allTogether=("Cost: $" . $stringCost . " for " . $this->giveCity());
        return $allTogether;
    }
}
