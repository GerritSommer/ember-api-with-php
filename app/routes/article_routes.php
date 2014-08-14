<?php
$app->get('/articles/', function() use ($app) {
  $controller = new articlesController;
  $json = $controller->index();
  echo $json;
});

$app->get('/articles/:id', function ($id) use ($app) {
  $controller = new articlesController;
  $json = $controller->show($id);
  echo $json;
});

$app->post('/articles/', function() use ($app) {
  $controller = new articlesController;
  $params = $app->request()->getBody()['article'];
  $json = $controller->create($params);
  echo $json;
});

$app->put('/articles/:id', function($id) use ($app) {
  $controller = new articlesController;
  $params = $app->request()->getBody()['article'];
  $json = $controller->update($id, $params);
  echo $json;
});

$app->delete('/articles/:id', function($id) use ($app) {
  $controller = new articlesController;
  if($controller->delete($id)) {
    echo 200;
  }
});