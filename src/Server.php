<?php

declare(strict_types=1);

namespace Workshop;

class Server
{
    private $properties;

    public function __construct(array $properties)
    {
        $this->properties = $properties;
    }

    public function getRequestUri(): string
    {
        return $this->properties['REQUEST_URI'];
    }

    public function getPathInfo(): string
    {
        return $this->properties['PATH_INFO'];
    }
}
