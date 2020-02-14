<?php

namespace Anddye\EventDispatcher\Listeners;

use Anddye\EventDispatcher\Events\EventInterface;

/**
 * Class AbstractListener.
 */
abstract class AbstractListener implements ListenerInterface
{
    /**
     * @param EventInterface $event
     */
    abstract public function handle(EventInterface $event): void;
}
