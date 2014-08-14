<?php
$app->get('/users/', function() use ($app) {
  $controller = new UsersController;
  $json = $controller->index();
  echo $json;
});

$app->get('/users/:id', function ($id) use ($app) {
  $controller = new UsersController;
  $json = $controller->show($id);
  echo $json;
});

$app->post('/users/', function() use ($app) {
  $controller = new UsersController;
  $params = $app->request()->getBody()['user'];
  $json = $controller->create($params);
  echo $json;
});

$app->put('/users/:id', function($id) use ($app) {
  $controller = new UsersController;
  $params = $app->request()->getBody()['user'];
  $json = $controller->update($id, $params);
  echo $json;
});

$app->delete('/users/:id', function($id) use ($app) {
  $controller = new UsersController;
  if($controller->delete($id)) {
    echo 200;
  }
});