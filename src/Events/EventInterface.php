<?php

namespace AndrewDyer\EventDispatcher\Events;

/**
 * Defines the contract for an event.
 */
interface EventInterface
{
    /**
     * Returns the event name.
     *
     * @return string The event name.
     */
    public function getName(): string;
}
