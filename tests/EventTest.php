<?php

namespace AndrewDyer\EventDispatcher\Tests;

use AndrewDyer\EventDispatcher\Tests\Fixtures\Events\AnotherDummyEvent;
use AndrewDyer\EventDispatcher\Tests\Fixtures\Events\DummyEvent;
use PHPUnit\Framework\TestCase;

class EventTest extends TestCase
{
    public function testEventHasDefaultNameIfNotSet()
    {
        $event = new DummyEvent();

        $this->assertEquals('DummyEvent', $event->getName());
    }

    public function testCanGetNameOfEvent(): void
    {
        $event = new AnotherDummyEvent();

        $this->assertEquals('CustomDummyEvent', $event->getName());
    }
}
