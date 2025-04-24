<?php

namespace AndrewDyer\EventDispatcher\Listeners;

use AndrewDyer\EventDispatcher\Events\EventInterface;

abstract class AbstractListener implements ListenerInterface
{
    abstract public function handle(EventInterface $event): void;
}
