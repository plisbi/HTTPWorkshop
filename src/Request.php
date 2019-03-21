<?php

declare(strict_types=1);

namespace Workshop;

class Request
{
    /**
     * @var array
     */
    public $query;

    /**
     * @var Server
     */
    public $server;

    public function __construct()
    {
        $this->query = $_GET;
        $this->server = new Server($_SERVER);
    }

    public function getByKey($key, $default = null): ?string
    {
        if (!isset($this->query[$key])) {
            return $default;
        }

        return htmlspecialchars($this->query[$key], ENT_QUOTES);
    }
}
