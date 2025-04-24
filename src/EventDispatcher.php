<?php

namespace AndrewDyer\EventDispatcher;

use AndrewDyer\EventDispatcher\Events\EventInterface;
use AndrewDyer\EventDispatcher\Listeners\ListenerInterface;

class EventDispatcher
{
    protected array $listeners = [];

    public function addListener(string $eventName, ListenerInterface $listener): self
    {
        $this->listeners[$eventName][] = $listener;

        return $this;
    }

    public function dispatch(EventInterface $event): void
    {
        $eventName = $event->getName();
        foreach ($this->getListenersByEvent($eventName) as $listener) {
            $listener->handle($event);
        }
    }

    public function getListeners(): array
    {
        return $this->listeners;
    }

    public function getListenersByEvent(string $eventName): array
    {
        if (!$this->hasListeners($eventName)) {
            return [];
        }

        return $this->listeners[$eventName];
    }

    public function hasListeners(string $eventName): bool
    {
        return isset($this->listeners[$eventName]);
    }
}
