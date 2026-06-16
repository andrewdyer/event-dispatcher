<?php

namespace AndrewDyer\EventDispatcher\Tests;

use AndrewDyer\EventDispatcher\EventDispatcher;
use AndrewDyer\EventDispatcher\Tests\Fixtures\Events\DummyEvent;
use AndrewDyer\EventDispatcher\Tests\Fixtures\Listeners\AnotherDummyListener;
use AndrewDyer\EventDispatcher\Tests\Fixtures\Listeners\DummyListener;
use PHPUnit\Framework\TestCase;

/**
 * Unit tests for EventDispatcher.
 */
class EventDispatcherTest extends TestCase
{
    /**
     * Asserts that a listener can be added to the dispatcher.
     */
    public function testCanAddListenerToDispatcher(): void
    {
        $eventDispatcher = new EventDispatcher();
        $eventDispatcher->addListener('DummyEvent', new DummyListener());

        $listeners = $eventDispatcher->getListeners();

        $this->assertIsArray($listeners);
        $this->assertCount(1, $listeners);
    }

    /**
     * Asserts that the dispatcher correctly reports when no listeners are registered for an event.
     */
    public function testCanCheckIfDispatcherHasListenerRegisteredForEvent()
    {
        $eventDispatcher = new EventDispatcher();

        $this->assertFalse($eventDispatcher->hasListeners('DummyEvent'));
    }

    /**
     * Asserts that listeners can be retrieved by event name.
     */
    public function testCanGetListenersByEventName(): void
    {
        $eventDispatcher = new EventDispatcher();
        $eventDispatcher->addListener('DummyEvent', new DummyListener());

        $listeners = $eventDispatcher->getListenersByEvent('DummyEvent');

        $this->assertIsArray($listeners);
        $this->assertCount(1, $listeners);
    }

    /**
     * Asserts that an empty array is returned when no listeners are registered for an event.
     */
    public function testDispatcherReturnsEmptyArrayIfNoListenersSetForEvent(): void
    {
        $eventDispatcher = new EventDispatcher();

        $listeners = $eventDispatcher->getListenersByEvent('DummyEvent');

        $this->assertIsArray($listeners);
        $this->assertCount(0, $listeners);
    }

    /**
     * Asserts that the dispatcher calls the listener's handle method when an event is dispatched.
     */
    public function testDispatcherCanDispatchAnEvent()
    {
        $event = new DummyEvent();

        $mockedListener = $this->createMock(DummyListener::class);
        $mockedListener->expects($this->once())->method('handle')->with($event);

        $eventDispatcher = new EventDispatcher();
        $eventDispatcher->addListener('DummyEvent', $mockedListener);
        $eventDispatcher->dispatch($event);
    }

    /**
     * Asserts that the dispatcher calls every listener's handle method when an event is dispatched to multiple listeners.
     */
    public function testDispatcherCanDispatchAnEventWithMultipleListeners()
    {
        $event = new DummyEvent();

        $mockedListener = $this->createMock(DummyListener::class);
        $mockedListener->expects($this->once())->method('handle')->with($event);

        $anotherMockedListener = $this->createMock(AnotherDummyListener::class);
        $anotherMockedListener->expects($this->once())->method('handle')->with($event);

        $eventDispatcher = new EventDispatcher();
        $eventDispatcher->addListener('DummyEvent', $mockedListener);
        $eventDispatcher->addListener('DummyEvent', $anotherMockedListener);
        $eventDispatcher->dispatch($event);
    }
}
