<?php

// set headers for cross origin ajax requests
// $app->response()->header('Access-Control-Allow-Origin', "http://localhost:4200"); //Allow JSON data to be consumed
// $app->response()->header('Access-Control-Allow-Headers', 'content-type, X-Requested-With, X-authentication, X-client'); //Allow JSON data to be consumed


// answer all cross domain requests with true yet
$app->options('/(:name+)', function() use ($app) {
  // Here we have the option to control and limit post and put requests eg. the header etc... quite cool
  echo 200;
});

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

// $app->get('/:param1(/:param2(/:param3))', function () use ($app) {
//     $args = func_get_args();
//     foreach($args as $arg){
//         echo $arg . ' -- ';
//     }
// });

$app->run();
