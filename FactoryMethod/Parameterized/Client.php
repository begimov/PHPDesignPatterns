<?php

include_once('GraphicFactory.php');
include_once('TextFactory.php');

class Client
{
    private $graphicObj;
    private $textObj;

    public function __construct()
    {
        $this->graphicObj = new GraphicFactory();
        echo $this->graphicObj->startFactory();
        $this->textObj = new TextFactory();
        echo $this->textObj->startFactory();
    }
}
