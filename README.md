# Event Dispatcher
A simple event dispatcher that you can fit into the framework of your choice.

## License
Licensed under MIT. Totally free for private or commercial projects.

## Installation
```text
composer require andrewdyer/event-dispatcher
```

## Usage
```php
$dispatcher = new Anddye\EventDispatcher\EventDispatcher();

// add listeners for when a user signed up event is dispatched
$dispatcher->addListener('UserRegistered', new App\Listeners\SendSignedUpEmail());
$dispatcher->addListener('UserRegistered', new App\Listeners\UpdateLastSignedInDate());

// create a user somehow
$user = new App\Models\User();
// ...

// create the user signed up event and dispatch it
$dispatcher->dispatch(new App\Events\UserSignedUp($user));
```

### Events
All events must be an instance of `Anddye\EventDispatcher\Events\EventInterface` and ideally should extend `Anddye\EventDispatcher\Events\AbstractEvent` - which will implement the required interface by default.

When an event is dispatched, it's identified by a unique name. By default, the name of an event will be that of the class, however you can manually set an event name by overwriting the `getName()` method.

```php
namespace App\Events;

use Anddye\EventDispatcher\Events\AbstractEvent;

class UserSignedUp extends AbstractEvent
{
    public function getName(): string
    {
        return 'UserRegistered';
    }
}
```

### Listeners
All listeners must be an instance of `Anddye\EventDispatcher\Listeners\ListenerInterface` and ideally should extend `Anddye\EventDispatcher\Listeners\AbstractListener` - which will implement the required interface by default.

```php
namespace App\Listeners;

use Anddye\EventDispatcher\Events\EventInterface;
use Anddye\EventDispatcher\Listeners\AbstractListener;

class SendSignedUpEmail extends AbstractListener
{
    public function handle(EventInterface $event): void
    {
        // TODO: This is where you would send the signed up email to the user!
    }
}
```

## Support
If you're using this package, I'd love to hear your thoughts! Feel free to contact me on [Twitter](https://twitter.com/andyer92).

Found a bug? Please report it using the [issue tracker](https://github.com/andrewdyer/event-dispatcher/issues), or better yet, fork the repository and submit a pull request.
