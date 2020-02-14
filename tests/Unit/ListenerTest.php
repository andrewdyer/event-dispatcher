<?php

namespace Anddye\EventDispatcher\Tests\Unit;

use Anddye\EventDispatcher\Tests\Stubs\Events\UserSignedUp;
use Anddye\EventDispatcher\Tests\Stubs\Listeners\SendSignedUpEmail;
use Anddye\EventDispatcher\Tests\Stubs\Models\User;
use PHPUnit\Framework\TestCase;
use TypeError;

/**
 * Class ListenerTest.
 */
final class ListenerTest extends TestCase
{
    /**
     * @var SendSignedUpEmail
     */
    protected $listener;

    /**
     * This method is called before each test.
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->listener = new SendSignedUpEmail();
    }

    /**
     * @test
     */
    public function handle_method_accepts_an_event()
    {
        $user = User::build(
            1,
            'Andrew',
            'Dyer',
            'andrewdyer@mail.com'
        );

        $this->listener->handle(new UserSignedUp($user));

        $this->addToAssertionCount(1);
    }

    /**
     * @test
     */
    public function handle_method_throws_error_if_invalid_event_given()
    {
        $this->expectException(TypeError::class);

        $this->listener->handle('I am not an event, troll');
    }
}
