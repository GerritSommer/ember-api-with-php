<?php
require_once 'models/user.php';
require_once 'controllers/users_controller.php';
$app->response()->header('Content-Type', 'application/json');
$app->response()->header('Content-Type', 'application/json');
$app->response()->header('Content-Type', 'application/json');
header('Access-Control-Allow-Origin: *');


$app->get('/users/', function () use ($app) {
  $controller = new UsersController;
  $json = $controller->index();

  echo $json;
});

$app->get('/users/:id', function ($id) use ($app) {
  $controller = new UsersController;
  $json = $controller->show($id);

  echo $json;
});

// $app->get('/:param1(/:param2(/:param3))', function () use ($app) {
//     $args = func_get_args();
//     foreach($args as $arg){
//         echo $arg . ' -- ';
//     }
// });

$app->run();
