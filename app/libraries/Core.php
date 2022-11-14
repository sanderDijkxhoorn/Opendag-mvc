<?php

class Core
{
  protected $currentController = 'Homepages';
  protected $currentMethod = 'index';
  protected $params = [];

  public function __construct()
  {
    $url = $this->getURL();

    // We hebben ../nodig omdat we Core.php require vanuit index.php
    if (file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {
      // Zet de currentController gelijk aan het eerste woord na het domein
      $this->currentController = ucwords($url[0]);
      unset($url[0]);
    }
    // Als de controller niet bestaat, dan is hij gelijk aan pages
    require_once '../app/controllers/' . $this->currentController . ".php";

    // Maak een nieuwe instantie van de controllerClass
    $this->currentController = new $this->currentController();

    // Kijk naar het tweede gedeelte van de url en zet de method
    if (isset($url[1])) {
      if (method_exists($this->currentController, $url[1])) {
        $this->currentMethod = $url[1];
        unset($url[1]);
      }
    }

    $this->params = $url ? array_values($url) : [];

    call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
  }

  public function getURL()
  {
    if (isset($_GET['url'])) {
      // Haal de backslash vooraan de url af
      $url = rtrim($_GET['url'], '/');

      $url = filter_var($url, FILTER_SANITIZE_URL);

      $url = explode('/', $url);
      return $url;
    } else {
      return array('homepages', 'index');
    }
  }
}
