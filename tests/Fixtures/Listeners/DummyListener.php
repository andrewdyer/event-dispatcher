<?php

namespace AndrewDyer\EventDispatcher\Tests\Fixtures\Listeners;

use AndrewDyer\EventDispatcher\Events\EventInterface;
use AndrewDyer\EventDispatcher\Listeners\AbstractListener;

/**
 * Handles a dummy test event.
 */
class DummyListener extends AbstractListener
{
    /**
     * Handles the given event.
     *
     * @param EventInterface $event The event to handle.
     */
    #[\Override]
    public function handle(EventInterface $event): void
    {
        // TODO: Implement handle() method.
    }
}
