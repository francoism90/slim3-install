<?php
//if (php_sapi_name() === 'cli')
  //exit($c['App\CLI']);

// Home
$app->get('/', function ($request, $response, $args) {
   return $response->withRedirect('/shop/home', 301);
});

// Shop
$app->group('/shop', function () {
  // Rest-Api
  $this->map(['POST', 'DELETE', 'PATCH', 'PUT'], '', 'App\Shop:process');

  $this->get('/{req:[a-z]+}', 'App\Shop:dispatch')->setName('shop');
});

// Product
$app->get('/product/{id:[_a-z0-9-]+}', 'App\Product:get')->setName('product');
