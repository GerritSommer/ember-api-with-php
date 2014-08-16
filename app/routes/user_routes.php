<?php
$app->get('/users/', function() use ($app) {
  $controller = new UsersController;
  $json = $controller->index();
  echo $json;
});

$app->get('/users/:id', function ($id) use ($app) {
  $controller = new UsersController;
  $result = $controller->show($id);
  if (is_array($result)) {
    $app->response()->status($result);
    $app->response()->header('X-Status-Reason', $result['message']);
  } else {
    echo $result;
  }
});

$app->post('/users/', function() use ($app) {
  $controller = new UsersController;
  $params = $app->request()->getBody()['user'];
  $result = $controller->create($params);

  if (is_array($result)) {
    $app->response()->status($result);
    $app->response()->header('X-Status-Reason', $result['message']);
  } else {
    echo $result;
  }
});

$app->put('/users/:id', function($id) use ($app) {
  $controller = new UsersController;
  $params = $app->request()->getBody()['user'];
  $result = $controller->update($id, $params);

  if (is_array($result)) {
    $app->response()->status($result);
    $app->response()->header('X-Status-Reason', $result['message']);
  } else {
    echo $result;
  }
});

$app->delete('/users/:id', function($id) use ($app) {
  $controller = new UsersController;
  $result = $controller->delete($id);
  if (is_array($result)) {
    $app->response()->status($result);
    $app->response()->header('X-Status-Reason', $result['message']);
  } else {
    $app->response()->status(200);
  }
});