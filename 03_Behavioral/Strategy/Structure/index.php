<?php

require 'vendor/autoload.php';

$cat = new App\Cat\Cat(
    new App\Cat\Actions\Speak\MeowAction,
    new App\Cat\Actions\Jump\JumpAction
);

var_dump($cat);

echo $cat->speak();
echo $cat->jump();

$cat->setSpeakAction(new App\Cat\Actions\Speak\GrowlAction);

echo $cat->speak();
