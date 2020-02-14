<?php

namespace Anddye\EventDispatcher\Tests\Stubs\Events;

use Anddye\EventDispatcher\Events\AbstractEvent;
use Anddye\EventDispatcher\Tests\Stubs\Models\User;

/**
 * Class UserSignedUp.
 */
class UserSignedUp extends AbstractEvent
{
    /**
     * @var User
     */
    public $user;

    /**
     * UserSignedUp constructor.
     *
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return 'UserRegistered';
    }
}
