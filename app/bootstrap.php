<?php
// Init Session
session_start();

// Constant
define('ROOT', dirname(__DIR__));
define('APP',  ROOT . '/app');
define('CONF', APP . '/config');

// Autoloader
require_once ROOT . '/vendor/autoload.php';

// Init Slim
$c = new \Slim\Container(include 'settings.php');
$app = new \Slim\App($c);

// Containers
$c['pdo'] = function ($c) {
  $ref = new \ReflectionClass('\Slim\PDO\Database');
  return $ref->newInstanceArgs($c['settings']['pdo']);
};

// View
$c['view'] = function ($c) {
  $view = new \Slim\Views\Twig($c['settings']['view']['tpl_path'], $c['settings']['view']['twig']);
  $view->addExtension(new \Slim\Views\TwigExtension($c['router'], $c['request']->getUri()));

  // Add globals
  $twig = $view->getEnvironment();
  $twig->addGlobal('gl', include CONF . '/globals.php');

  return $view;
};

// Init App
require 'deps.php';
require 'routes.php';
$app->run();
