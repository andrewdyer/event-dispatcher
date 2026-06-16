<?php

namespace AndrewDyer\EventDispatcher\Tests\Fixtures\Events;

use AndrewDyer\EventDispatcher\Events\AbstractEvent;

/**
 * Dispatched when a dummy test event with a custom name is triggered.
 */
class AnotherDummyEvent extends AbstractEvent
{
    /**
     * Returns the custom event name.
     *
     * @return string The custom event name.
     */
    #[\Override]
    public function getName(): string
    {
        return 'CustomDummyEvent';
    }
}
