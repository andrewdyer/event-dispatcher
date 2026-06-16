<?php

namespace AndrewDyer\EventDispatcher;

use AndrewDyer\EventDispatcher\Events\EventInterface;
use AndrewDyer\EventDispatcher\Listeners\ListenerInterface;

/**
 * Dispatches events to their registered listeners.
 */
class EventDispatcher
{
    /**
     * Registered listeners indexed by event name.
     *
     * @var array<string, list<ListenerInterface>>
     */
    protected array $listeners = [];

    /**
     * Adds a listener for the given event name.
     *
     * @param string $eventName The name of the event to listen for.
     * @param ListenerInterface $listener The listener to register.
     * @return self The dispatcher instance.
     */
    public function addListener(string $eventName, ListenerInterface $listener): self
    {
        $this->listeners[$eventName][] = $listener;

        return $this;
    }

    /**
     * Dispatches an event to all registered listeners.
     *
     * @param EventInterface $event The event to dispatch.
     */
    public function dispatch(EventInterface $event): void
    {
        $eventName = $event->getName();
        foreach ($this->getListenersByEvent($eventName) as $listener) {
            $listener->handle($event);
        }
    }

    /**
     * Returns all registered listeners.
     *
     * @return array<string, list<ListenerInterface>> All listeners indexed by event name.
     */
    public function getListeners(): array
    {
        return $this->listeners;
    }

    /**
     * Returns all listeners registered for the given event name.
     *
     * @param string $eventName The name of the event.
     * @return list<ListenerInterface> The listeners registered for the event.
     */
    public function getListenersByEvent(string $eventName): array
    {
        if (!$this->hasListeners($eventName)) {
            return [];
        }

        return $this->listeners[$eventName];
    }

    /**
     * Determines whether any listeners are registered for the given event name.
     *
     * @param string $eventName The name of the event.
     * @return bool True if at least one listener is registered, false otherwise.
     */
    public function hasListeners(string $eventName): bool
    {
        return isset($this->listeners[$eventName]);
    }
}
