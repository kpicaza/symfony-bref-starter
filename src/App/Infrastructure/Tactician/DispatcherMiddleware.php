<?php

declare(strict_types=1);

namespace App\Infrastructure\Tactician;

use App\Event\Dispatcher;
use League\Tactician\Middleware;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class DispatcherMiddleware implements Middleware
{
    private $dispatcher;

    public function __construct(EventDispatcherInterface $dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }

    public function execute($command, callable $next)
    {
        Dispatcher::withExistingOne($this->dispatcher);

        return $next($command);
    }
}
