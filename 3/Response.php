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
      return $this;
    }

    public function setContent($content)
    {
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
}
