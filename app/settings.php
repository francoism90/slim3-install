<?php
return ['settings' => [
  // Slim
  'determineRouteBeforeAppMiddleware' => false,
  'displayErrorDetails' => true,

  // View
  'view' => [
    'tpl_path' => __DIR__ . '/tpl',
    'twig' => [
      //'cache' => __DIR__ . '/cache/twig',
      'cache' => false,
      'debug' => true,
      'auto_reload' => true,
    ],
  ],

  // PDO
  'pdo' => [
    'dsn' => 'mysql:host=localhost;dbname=phpsimple;charset=utf8',
    'user' => 'myuser',
    'pass' => 'mypass'
  ]
]];
