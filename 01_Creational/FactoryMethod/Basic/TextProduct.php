<?php

include_once('Product.php');

class TextProduct implements Product
{
    private $mfgProduct;

    public function getProperties()
    {
        $this->mfgProduct = "Text";
        return $this->mfgProduct;
    }
}
