<?php

namespace AndrewDyer\EventDispatcher\Tests;

use AndrewDyer\EventDispatcher\EventDispatcher;
use AndrewDyer\EventDispatcher\Tests\Fixtures\Events\DummyEvent;
use AndrewDyer\EventDispatcher\Tests\Fixtures\Listeners\AnotherDummyListener;
use AndrewDyer\EventDispatcher\Tests\Fixtures\Listeners\DummyListener;
use PHPUnit\Framework\TestCase;

class EventDispatcherTest extends TestCase
{
    public function testCanAddListenerToDispatcher(): void
    {
        $eventDispatcher = new EventDispatcher();
        $eventDispatcher->addListener('DummyEvent', new DummyListener());

        $listeners = $eventDispatcher->getListeners();

        $this->assertIsArray($listeners);
        $this->assertCount(1, $listeners);
    }

    public function testCanCheckIfDispatcherHasListenerRegisteredForEvent()
    {
        $eventDispatcher = new EventDispatcher();

        $this->assertFalse($eventDispatcher->hasListeners('DummyEvent'));
    }

    public function testCanGetListenersByEventName(): void
    {
        $eventDispatcher = new EventDispatcher();
        $eventDispatcher->addListener('DummyEvent', new DummyListener());

        $listeners = $eventDispatcher->getListenersByEvent('DummyEvent');

        $this->assertIsArray($listeners);
        $this->assertCount(1, $listeners);
    }

    public function testDispatcherReturnsEmptyArrayIfNoListenersSetForEvent(): void
    {
        $eventDispatcher = new EventDispatcher();

        $listeners = $eventDispatcher->getListenersByEvent('DummyEvent');

        $this->assertIsArray($listeners);
        $this->assertCount(0, $listeners);
    }

    public function testDispatcherCanDispatchAnEvent()
    {
        $event = new DummyEvent();

        $mockedListener = $this->createMock(DummyListener::class);
        $mockedListener->expects($this->once())->method('handle')->with($event);

        $eventDispatcher = new EventDispatcher();
        $eventDispatcher->addListener('DummyEvent', $mockedListener);
        $eventDispatcher->dispatch($event);
    }

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
