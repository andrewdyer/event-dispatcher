<?php

namespace AndrewDyer\EventDispatcher\Events;

abstract class AbstractEvent implements EventInterface
{
    public function getName(): string
    {
        return (new \ReflectionClass($this))->getShortName();
    }
}
