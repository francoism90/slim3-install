<?php
// Autoloader
require_once dirname(__DIR__ ) . '/vendor/autoload.php';

// Init Slim
$app = new \Slim\App(include 'settings.php');
$c = $app->getContainer();

// Init Dependencies
$c['pdo'] = function ($c) {
  $settings = $c['settings'];
  $ref = new \ReflectionClass('\Slim\PDO\Database');
  return $ref->newInstanceArgs($settings['pdo']);
};

$c['view'] = function ($c) {
  $settings = $c['settings'];
  $view = new \Slim\Views\Twig($settings['view']['tpl_path'], $settings['view']['twig']);
  $view->addExtension(new \Slim\Views\TwigExtension($c['router'], $c['request']->getUri()));
  return $view;
};

// Init App
require 'deps.php';
require 'routes.php';
$app->run();
