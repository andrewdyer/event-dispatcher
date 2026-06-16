<?php

namespace AndrewDyer\EventDispatcher\Listeners;

use AndrewDyer\EventDispatcher\Events\EventInterface;

/**
 * Provides a base implementation of ListenerInterface.
 */
abstract class AbstractListener implements ListenerInterface
{
    /**
     * Handles the given event.
     *
     * @param EventInterface $event The event to handle.
     */
    abstract public function handle(EventInterface $event): void;
}
