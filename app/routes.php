<?php
// Home
$app->get('/', function ($request, $response, $args) {
   return $response->withRedirect('/shop/home', 301);
});

// Shop
$app->group('/shop', function () {
  $this->map(['GET', 'POST', 'DELETE', 'PATCH', 'PUT'], '', function ($request, $response, $args) {
    // REST-api
  });

  $this->get('/{req:[a-z]+}', 'App\Shop:dispatch')->setName('shop');
});

// Product
$app->get('/product/{id:[_a-z0-9-]+}', 'App\Product:get')->setName('product');
