<?php

namespace Anddye\EventDispatcher\Tests\Stubs\Listeners;

use Anddye\EventDispatcher\Events\EventInterface;
use Anddye\EventDispatcher\Listeners\AbstractListener;

/**
 * Class UpdateLastSignedInDate.
 */
class UpdateLastSignedInDate extends AbstractListener
{
    /**
     * @param EventInterface $event
     */
    public function handle(EventInterface $event): void
    {
        // TODO: This is where you would update the users last signed in date!
    }
}
