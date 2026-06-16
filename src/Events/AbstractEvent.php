<?php

declare(strict_types=1);

namespace AndrewDyer\EventDispatcher\Events;

/**
 * Provides a base implementation of EventInterface.
 */
abstract class AbstractEvent implements EventInterface
{
    /**
     * Returns the short class name as the default event name.
     *
     * @return string The short (unqualified) class name of the event.
     */
    public function getName(): string
    {
        return (new \ReflectionClass($this))->getShortName();
    }
}
