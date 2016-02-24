<?php
namespace App\Shop;
use \Exception;
use Slim\{Http\Request, Http\Response, PDO\Database, Views\Twig};
use Volnix\CSRF\CSRF;
use Valitron\Validator;
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

  public function process(Request $request, Response $response, $args) {
    $response->withHeader('Content-type', 'application/json'); // Talk in JSON
    try {
      // Check $_POST
      if (!$request->isXhr() || !CSRF::validate($_POST))
        throw new Exception('Invalid Post');

      // do something
      //$this->insert();
    } catch (Exception $e) {
      $response->write($e->getMessage());
    }
  }
}
