<?php

declare(strict_types=1);

namespace Workshop;

class Request
{
    public $query;

    public function __construct()
    {
        $this->query = $_GET;
    }

    public function getByKey($key, $default = null): ?string
    {
        if (!isset($this->query[$key])) {
            return $default;
        }

        return htmlspecialchars($this->query[$key], ENT_QUOTES);
    }
}
