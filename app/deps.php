<?php
$c['App\Product'] = function ($c) {
  return new \App\Product\Controller($c['pdo'], $c['view']);
};

$c['App\Shop'] = function ($c) {
  return new \App\Shop\Controller($c['pdo'], $c['view']);
};
