<?php

declare(strict_types=1);

namespace AndrewDyer\EventDispatcher\Tests;

use AndrewDyer\EventDispatcher\Tests\Fixtures\Events\AnotherDummyEvent;
use AndrewDyer\EventDispatcher\Tests\Fixtures\Events\DummyEvent;
use PHPUnit\Framework\TestCase;

/**
 * Unit tests for AbstractEvent.
 */
class EventTest extends TestCase
{
    /**
     * Asserts that an event returns its short class name as the default event name.
     */
    public function testEventHasDefaultNameIfNotSet()
    {
        $event = new DummyEvent();

        $this->assertEquals('DummyEvent', $event->getName());
    }

    /**
     * Asserts that an event returns the overridden name when getName is implemented.
     */
    public function testCanGetNameOfEvent(): void
    {
        $event = new AnotherDummyEvent();

        $this->assertEquals('CustomDummyEvent', $event->getName());
    }
}
