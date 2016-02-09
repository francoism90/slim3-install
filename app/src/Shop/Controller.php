<?php
namespace App\Shop;
use Slim\{Http\Request, Http\Response, PDO\Database, Views\Twig};
class Controller {
  public $db;
  public $view;

  public function __construct(Database $db, Twig $view) {
    $this->db = $db;
    $this->view = $view;
  }

  public function get(Request $request, Response $response, $args) {
    $this->view->render($response, 'home.html');
  }
}
