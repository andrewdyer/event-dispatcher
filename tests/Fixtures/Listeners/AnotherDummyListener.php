<?php

namespace AndrewDyer\EventDispatcher\Tests\Fixtures\Listeners;

use AndrewDyer\EventDispatcher\Events\EventInterface;
use AndrewDyer\EventDispatcher\Listeners\AbstractListener;

class AnotherDummyListener extends AbstractListener
{
    #[\Override]
    public function handle(EventInterface $event): void
    {
        // TODO: Implement handle() method.
    }
}
