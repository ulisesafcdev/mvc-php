<?php

class Core
{

  protected $controller;
  protected $method;
  protected $parameters = [];

  public function __construct()
  {
    $url = $this->getUrl();

    if(file_exists('../app/controllers/' . ucwords($url[0]) . '.php'))
    {
      $this->controller = ucwords($url[0]);
      unset($url[0]);
    }

    require_once '../app/controllers/' . $this->controller . '.php';
    $this->controller = new $this->controller;

    if(isset($url[1]))
    {
      if(method_exists($this->controller, $url[1]))
      {
        $this->method = $url[1];
        unset($url[1]);
      }
    }

    $this->parameters = $url ? array_values($url) : [];
    call_user_func_array([$this->controller, $this->method], $this->parameters);
  }

  public function getUrl()
  {
    if(isset($_GET['url']))
    {
      $url = rtrim($_GET['url'], '/');
      $url = filter_var($url, FILTER_SANITIZE_URL);
      $url = explode('/', $url);

      return $url;
    }
  }
}