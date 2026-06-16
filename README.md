# Event Dispatcher

A framework-agnostic library for implementing the observer pattern through named events and registered listeners.

[![Latest Stable Version](http://poser.pugx.org/andrewdyer/event-dispatcher/v?style=flat-square)](https://packagist.org/packages/andrewdyer/event-dispatcher)
[![Total Downloads](http://poser.pugx.org/andrewdyer/event-dispatcher/downloads?style=flat-square)](https://packagist.org/packages/andrewdyer/event-dispatcher)
[![License](http://poser.pugx.org/andrewdyer/event-dispatcher/license?style=flat-square)](https://packagist.org/packages/andrewdyer/event-dispatcher)
[![PHP Version Require](http://poser.pugx.org/andrewdyer/event-dispatcher/require/php?style=flat-square)](https://packagist.org/packages/andrewdyer/event-dispatcher)

## Introduction

This library lets events be defined as classes and listeners attached to them by name, with the dispatcher notifying every registered listener in the order they were added when an event is triggered. Listeners are kept fully decoupled from the code that raises the event, making it straightforward to extend application behaviour without modifying the originating logic, regardless of the framework in use.

## Prerequisites

- **[PHP](https://www.php.net/)**: Version 8.3 or higher is required.
- **[Composer](https://getcomposer.org/)**: Dependency management tool for PHP.

## Installation

```bash
composer require andrewdyer/event-dispatcher
```

## Getting Started

### 1. Define an event

Create a class that implements `EventInterface`, or extend `AbstractEvent`. By default, the event name is the short (unqualified) class name, but this can be overridden:

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

### 2. Create a listener

Create a class that implements `ListenerInterface`, or extend `AbstractListener`:

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

### 3. Set up the dispatcher

Instantiate `EventDispatcher`:

```php
use AndrewDyer\EventDispatcher\EventDispatcher;

$dispatcher = new EventDispatcher();
```

## Usage

### Registering a listener

Attach a listener to a specific event name via `addListener()`:

```php
use App\Listeners\SendRegistrationEmail;

$dispatcher->addListener('UserRegistered', new SendRegistrationEmail());
```

Multiple listeners can be registered against the same event name; they are executed in the order they were added.

### Dispatching an event

Trigger an event and notify all of its registered listeners via `dispatch()`:

```php
use App\Events\UserRegistered;

$dispatcher->dispatch(new UserRegistered());
```

## License

Licensed under the [MIT licence](https://opensource.org/licenses/MIT) and is free for private or commercial projects.