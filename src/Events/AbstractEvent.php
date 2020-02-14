<?php

namespace Anddye\EventDispatcher\Events;

use ReflectionClass;
use ReflectionException;

/**
 * Class AbstractEvent.
 */
abstract class AbstractEvent implements EventInterface
{
    /**
     * @return string
     *
     * @throws ReflectionException
     */
    public function getName(): string
    {
        return (new ReflectionClass($this))->getShortName();
    }
}
