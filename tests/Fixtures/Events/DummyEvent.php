<?php

declare(strict_types=1);

namespace AndrewDyer\EventDispatcher\Tests\Fixtures\Events;

use AndrewDyer\EventDispatcher\Events\AbstractEvent;

/**
 * Dispatched when a dummy test event is triggered.
 */
class DummyEvent extends AbstractEvent
{
}
