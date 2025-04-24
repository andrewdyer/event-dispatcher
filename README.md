# Event Dispatcher

A simple event dispatcher that you can fit into the framework of your choice.

## ⚖️ License

Licensed under the [MIT license](https://opensource.org/licenses/MIT) and is free for private or commercial projects.

## 📦 Installation

Install the package via Composer:

```bash
composer require andrewdyer/event-dispatcher
```

## 🚀 Getting Started

### 1. Define Your Events

Create a class that implements `AndrewDyer\EventDispatcher\Events\EventInterface` (or extend `AbstractEvent`).

By default, the event name is the class name, but you can override it:

```php
namespace App\Events;

use AndrewDyer\EventDispatcher\Events\AbstractEvent;

class UserRegistered extends AbstractEvent
{
    public function getName(): string
    {
        return 'UserRegistered';
    }
}
```

### 2. Create Your Listeners

Listeners must implement `AndrewDyer\EventDispatcher\Listeners\ListenerInterface` (or extend `AbstractListener`).

```php
namespace App\Listeners;

use AndrewDyer\EventDispatcher\Events\EventInterface;
use AndrewDyer\EventDispatcher\Listeners\AbstractListener;

class SendRegistrationEmail extends AbstractListener
{
    public function handle(EventInterface $event): void
    {
        // Send welcome email to user...
    }
}
```

## 📖 Usage

### Initialize the Dispatcher

Create a new instance of the event dispatcher:

```php
use AndrewDyer\EventDispatcher\EventDispatcher;

$dispatcher = new EventDispatcher();
```

### Register a Listener

Attach a listener class to respond to a specific event:

```php
use App\Listeners\SendRegistrationEmail;

$dispatcher->addListener('UserRegistered', new SendRegistrationEmail());
```

> 💡 **Tip**: You can register multiple listeners for the same event name, and they will be executed in the order they were added.

### Dispatch an Event

Trigger the event and notify all registered listeners:

```php
use App\Events\UserRegistered;

$dispatcher->dispatch(new UserRegistered());
```

## 🤝 Contributing

Found a bug or want to improve this package? Feel free to open a pull request or submit an issue.
