<?php

class Response
{
    /**
    * @var array
    */
    public $headers;

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

    public function send ($content = '', int $statusCode = 200, array $headers = [], $protocolVersion = '1.0'){
      //send header
      header(sprintf('HTTP/%s %s %s', $protocolVersion, $statusCode, $this->statusText), true, $statusCode);
      echo $this->content;
      // if (\function_exists('fastcgi_finish_request')) {
      //     fastcgi_finish_request();
      // } elseif (!\in_array(\PHP_SAPI, array('cli', 'phpdbg'), true)) {
      //     static::closeOutputBuffers(0, true);
      // }
      return $this;
    }

    public function setContent($content)
    {
      var_dump($content);die();
        if (null !== $content && !\is_string($content)) {
            throw new \UnexpectedValueException(sprintf('The Response content must be a string, "%s" given.', \gettype($content)));
        }
        $this->content = (string) $content;

        return $this;
    }

    public function setStatusCode(int $statusCode)
    {
      if (null !== $statusCode && !\is_int($content)) {
          throw new \UnexpectedValueException(sprintf('The Response content must be a int, "%s" given.', \gettype($content)));
      }
      $this->statusCode = (int)$statusCode;

      return $this;
    }

    public function setHeaders(array $headers)
    {
      if (null !== $headers && !\is_array($content)) {
          throw new \UnexpectedValueException(sprintf('The Response content must be a array, "%s" given.', \gettype($content)));
      }
      $this->headers = $headers;

      return $this;
    }

    //from Symfony
    public static function closeOutputBuffers(int $targetLevel, bool $flush)
    {
        $status = ob_get_status(true);
        $level = \count($status);
        $flags = PHP_OUTPUT_HANDLER_REMOVABLE | ($flush ? PHP_OUTPUT_HANDLER_FLUSHABLE : PHP_OUTPUT_HANDLER_CLEANABLE);

        while ($level-- > $targetLevel && ($s = $status[$level]) && (!isset($s['del']) ? !isset($s['flags']) || ($s['flags'] & $flags) === $flags : $s['del'])) {
            if ($flush) {
                ob_end_flush();
            } else {
                ob_end_clean();
            }
        }
    }
}

