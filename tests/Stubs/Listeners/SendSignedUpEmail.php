<?php

namespace Anddye\EventDispatcher\Tests\Stubs\Listeners;

use Anddye\EventDispatcher\Events\EventInterface;
use Anddye\EventDispatcher\Listeners\AbstractListener;

/**
 * Class SendSignedUpEmail.
 */
class SendSignedUpEmail extends AbstractListener
{
    /**
     * @param EventInterface $event
     */
    public function handle(EventInterface $event): void
    {
        // TODO: This is where you would send the signed up email to the user!
        // mail($event->user->getEmail(), 'Hello ' . $event->user->getForename() . ' ' . $event->user->getSurname() . '!');
    }
}
