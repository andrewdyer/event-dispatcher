<?php

declare(strict_types=1);

namespace YourVendor\YourPackage\Tests;

use PHPUnit\Framework\TestCase;
use YourVendor\YourPackage\Example;

class ExampleTest extends TestCase
{
    public function testSayHello(): void
    {
        $pkg = new Example();
        $this->assertSame('Hello, John!', $pkg->sayHello('John'));
    }
}
