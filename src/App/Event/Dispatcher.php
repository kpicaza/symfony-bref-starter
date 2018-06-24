<?php

declare(strict_types=1);

namespace App\Event;

use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class Dispatcher extends EventDispatcher
{
    private static $dispatcher;

    private function __construct()
    {
    }

    public static function create(): self
    {
        if (null === static::$dispatcher) {
            static::$dispatcher =  new self();
        }

        return static::$dispatcher;
    }

    public static function withExistingOne(EventDispatcherInterface $dispatcher): self
    {
        static::$dispatcher =  $dispatcher;

        return static::$dispatcher;
    }
}
