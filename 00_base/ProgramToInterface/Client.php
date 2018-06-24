<?php

require_once('NorthRegion.php');
require_once('WestRegion.php');
require_once('SouthRegion.php');

class Client
{
    public function __construct()
    {
        $north = new NorthRegion();
        $west = new WestRegion();
        $south = new SouthRegion(1, 'CITY');

        $this->showInterface($north);
        $this->showInterface($west);
        $this->showInterface($south);
    }

    private function showInterface(IAbstract $region)
    {
        echo $region->displayShow() . "<br/>";
    }
}

$worker = new Client;
