<?php

namespace Anddye\EventDispatcher;

use Anddye\EventDispatcher\Events\EventInterface;
use Anddye\EventDispatcher\Listeners\ListenerInterface;

/**
 * Class EventDispatcher.
 */
final class EventDispatcher
{
    /**
     * @var array
     */
    protected $listeners = [];

    /**
     * @param string            $eventName
     * @param ListenerInterface $listener
     *
     * @return $this
     */
    public function addListener(string $eventName, ListenerInterface $listener): self
    {
        $this->listeners[$eventName][] = $listener;

        return $this;
    }

    /**
     * @param EventInterface $event
     */
    public function dispatch(EventInterface $event): void
    {
        $eventName = $event->getName();
        foreach ($this->getListenersByEvent($eventName) as $listener) {
            $listener->handle($event);
        }
    }

    /**
     * @return array
     */
    public function getListeners(): array
    {
        return $this->listeners;
    }

    /**
     * @param string $eventName
     *
     * @return array
     */
    public function getListenersByEvent(string $eventName): array
    {
        if (!$this->hasListeners($eventName)) {
            return [];
        }

        return $this->listeners[$eventName];
    }

    /**
     * @param string $eventName
     *
     * @return bool
     */
    public function hasListeners(string $eventName): bool
    {
        return isset($this->listeners[$eventName]);
    }
}
