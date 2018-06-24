<?php

include_once('Product.php');

class GraphicProduct implements Product
{
    private $mfgProduct;

    public function getProperties()
    {
        $this->mfgProduct = "Image";
        return $this->mfgProduct;
    }
}
