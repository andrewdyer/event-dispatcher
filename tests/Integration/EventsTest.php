<?php

namespace Anddye\EventDispatcher\Tests\Integration;

use Anddye\EventDispatcher\EventDispatcher;
use Anddye\EventDispatcher\Tests\Stubs\Events\UserSignedUp;
use Anddye\EventDispatcher\Tests\Stubs\Listeners\SendSignedUpEmail;
use Anddye\EventDispatcher\Tests\Stubs\Listeners\UpdateLastSignedInDate;
use Anddye\EventDispatcher\Tests\Stubs\Models\User;
use PHPUnit\Framework\TestCase;

/**
 * Class EventsTest.
 */
final class EventsTest extends TestCase
{
    /**
     * @var EventDispatcher
     */
    protected $dispatcher;

    /**
     * @var UserSignedUp
     */
    protected $event;

    /**
     * This method is called before each test.
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->dispatcher = new EventDispatcher();

        $user = User::build(
            1,
            'Andrew',
            'Dyer',
            'andrewdyer@mail.com'
        );

        $this->event = new UserSignedUp($user);
    }

    /**
     * @test
     */
    public function dispatcher_can_dispatch_an_event()
    {
        $mockedListener = $this->createMock(SendSignedUpEmail::class);
        $mockedListener->expects($this->once())->method('handle')->with($this->event);

        $this->dispatcher->addListener('UserRegistered', $mockedListener);
        $this->dispatcher->dispatch($this->event);
    }

    /**
     * @test
     */
    public function dispatcher_can_dispatch_an_event_with_multiple_listeners()
    {
        $mockedListener = $this->createMock(SendSignedUpEmail::class);
        $mockedListener->expects($this->once())->method('handle')->with($this->event);

        $anotherMockedListener = $this->createMock(UpdateLastSignedInDate::class);
        $anotherMockedListener->expects($this->once())->method('handle')->with($this->event);

        $this->dispatcher->addListener('UserRegistered', $mockedListener);
        $this->dispatcher->addListener('UserRegistered', $anotherMockedListener);
        $this->dispatcher->dispatch($this->event);
    }
}
