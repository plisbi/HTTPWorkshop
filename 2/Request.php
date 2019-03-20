<?php

class Request
{
  /**
   * Query string parameters ($_GET).
   *
   * @var array
   */
  public $query;

  public function __construct()
  {
    $this->query = $_GET;
    //Similar can be done for other parameters sent by the request, as $_SERVER, $_HEADERS ...
  }

  public function getByKey($key, $default = null)
  {
      if (array_key_exists($key, $this->query)) {
          return $_GET[$key];
      }

      return $default;
  }
}
