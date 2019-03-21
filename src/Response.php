<?php

declare(strict_types=1);

namespace Workshop;

class Response
{
    /**
     * @var string
     */
    protected $content;

    /**
     * @var int
     */
    protected $protocolVersion;

    /**
     * @var int
     */
    protected $statusCode;

    /**
     * @var array
     */
    protected $statusTexts = [
        200 => 'OK',
        404 => 'Not found',
    ];

    public function __construct(string $content = '', int $statusCode = 200, $protocolVersion = '1.1')
    {
        $this->content = $content;
        $this->statusCode = $statusCode;
        $this->protocolVersion = $protocolVersion;
    }

    public function send(): void
    {
        if (!isset($this->statusTexts[$this->statusCode])) {
            throw new \RuntimeException('We don\'t accept this status code.');
        }

        $statusText = $this->statusTexts[$this->statusCode];

        header(
            sprintf('HTTP/%s %s %s', $this->protocolVersion, $this->statusCode, $statusText),
            true,
            $this->statusCode
        );

        echo $this->content;
        exit;
    }

    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    public function setStatusCode(int $statusCode): void
    {
        $this->statusCode = $statusCode;
    }

    public function setHeaders(array $headers): void
    {
        $this->headers = $headers;
    }
}
