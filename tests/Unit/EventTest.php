<?php

namespace Anddye\EventDispatcher\Tests\Unit;

use Anddye\EventDispatcher\Tests\Stubs\Events\UserSignedIn;
use Anddye\EventDispatcher\Tests\Stubs\Events\UserSignedUp;
use Anddye\EventDispatcher\Tests\Stubs\Models\User;
use PHPUnit\Framework\TestCase;

/**
 * Class EventTest.
 */
final class EventTest extends TestCase
{
    /**
     * @test
     */
    public function can_get_name_of_event()
    {
        $user = User::build(
            1,
            'Andrew',
            'Dyer',
            'andrewdyer@mail.com'
        );

        $event = new UserSignedUp($user);

        $this->assertEquals('UserRegistered', $event->getName());
    }

    /**
     * @test
     */
    public function event_has_default_name_if_not_set()
    {
        $event = new UserSignedIn();

        $this->assertEquals('UserSignedIn', $event->getName());
    }
}
