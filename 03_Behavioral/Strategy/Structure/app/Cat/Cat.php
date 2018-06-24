<?php

namespace App\Cat;

use App\Cat\Contracts\JumpActionInterface;
use App\Cat\Contracts\SpeakActionInterface;

class Cat
{
    private $speakAction;
    private $jumpAction;

    public function __construct(SpeakActionInterface $speakAction, JumpActionInterface $jumpAction)
    {
        $this->speakAction = $speakAction;
        $this->jumpAction = $jumpAction;
    }

    public function setSpeakAction(SpeakActionInterface $speakAction)
    {
        $this->speakAction = $speakAction;
    }

    public function setJumpAction(JumpActionInterface $jumpAction)
    {
        $this->jumpAction = $jumpAction;
    }

    public function speak()
    {
        return $this->speakAction->speak();
    }

    public function jump()
    {
        return $this->jumpAction->jump();
    }
}
