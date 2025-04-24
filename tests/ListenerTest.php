<?php

namespace AndrewDyer\EventDispatcher\Tests;

use AndrewDyer\EventDispatcher\Tests\Fixtures\Events\DummyEvent;
use AndrewDyer\EventDispatcher\Tests\Fixtures\Listeners\DummyListener;
use PHPUnit\Framework\TestCase;

class ListenerTest extends TestCase
{
    public function testHandleMethodAcceptsAnEvent()
    {
        $listener = new DummyListener();

        $listener->handle(new DummyEvent());

        $this->addToAssertionCount(1);
    }

    public function testHandleMethodThrowsErrorIfInvalidEventGiven()
    {
        $this->expectException(\TypeError::class);

        $listener = new DummyListener();

        $listener->handle('I am not an event, troll');
    }
}
