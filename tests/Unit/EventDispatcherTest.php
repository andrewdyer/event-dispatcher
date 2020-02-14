<?php

namespace Anddye\EventDispatcher\Tests\Unit;

use Anddye\EventDispatcher\EventDispatcher;
use Anddye\EventDispatcher\Tests\Stubs\Listeners\SendSignedUpEmail;
use PHPUnit\Framework\TestCase;

/**
 * Class EventDispatcherTest.
 */
final class EventDispatcherTest extends TestCase
{
    /**
     * @var EventDispatcher
     */
    protected $dispatcher;

    /**
     * This method is called before each test.
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->dispatcher = new EventDispatcher();
    }

    /**
     * @test
     */
    public function can_add_listener_to_dispatcher()
    {
        $this->dispatcher->addListener('UserRegistered', new SendSignedUpEmail());

        $this->assertCount(1, $this->dispatcher->getListeners()['UserRegistered']);
    }

    /**
     * @test
     */
    public function can_check_if_dispatcher_has_listener_registered_for_event()
    {
        $this->assertFalse($this->dispatcher->hasListeners('UserRegistered'));
    }

    /**
     * @test
     */
    public function can_get_listeners_by_event_name_from_dispatcher()
    {
        $this->dispatcher->addListener('UserRegistered', new SendSignedUpEmail());

        $this->assertCount(1, $this->dispatcher->getListenersByEvent('UserRegistered'));
    }

    /**
     * @test
     */
    public function dispatcher_returns_empty_array_if_no_listeners_set_for_event()
    {
        $this->assertCount(0, $this->dispatcher->getListenersByEvent('UserRegistered'));
    }

    /**
     * @test
     */
    public function dispatcher_stores_listeners_in_an_array()
    {
        $this->assertEmpty($this->dispatcher->getListeners());
        $this->assertIsArray($this->dispatcher->getListeners());
    }
}
