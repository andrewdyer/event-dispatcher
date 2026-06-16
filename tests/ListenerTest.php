<?php

declare(strict_types=1);

namespace AndrewDyer\EventDispatcher\Tests;

use AndrewDyer\EventDispatcher\Tests\Fixtures\Events\DummyEvent;
use AndrewDyer\EventDispatcher\Tests\Fixtures\Listeners\DummyListener;
use PHPUnit\Framework\TestCase;

/**
 * Unit tests for AbstractListener.
 */
class ListenerTest extends TestCase
{
    /**
     * Asserts that the handle method accepts a valid event instance.
     */
    public function testHandleMethodAcceptsAnEvent()
    {
        $listener = new DummyListener();

        $listener->handle(new DummyEvent());

        $this->addToAssertionCount(1);
    }

    /**
     * Asserts that the handle method throws a TypeError when a non-event argument is passed.
     */
    public function testHandleMethodThrowsErrorIfInvalidEventGiven()
    {
        $this->expectException(\TypeError::class);

        $listener = new DummyListener();

        $listener->handle('I am not an event, troll');
    }
}
