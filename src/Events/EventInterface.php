<?php

namespace Anddye\EventDispatcher\Events;

/**
 * Interface EventInterface.
 */
interface EventInterface
{
    /**
     * @return string
     */
    public function getName(): string;
}
