<?php

namespace AndrewDyer\EventDispatcher\Tests\Fixtures\Events;

use AndrewDyer\EventDispatcher\Events\AbstractEvent;

class AnotherDummyEvent extends AbstractEvent
{
    #[\Override]
    public function getName(): string
    {
        return 'CustomDummyEvent';
    }
}
