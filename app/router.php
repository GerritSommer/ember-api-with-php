<?php
require_once 'models/user.php';

$app->get('/', function () use ($app) {
    require_once 'models/home.php';
});

$app->get('/blog/', function () use ($app) {
  require_once 'controllers/articles_controller.php';
  require_once 'models/article.php';
  $controller = new ArticlesController;
});

$app->get('/login/', function () use ($app) {

});

$app->post('/login/', function () use ($app) {
  require_once 'controllers/session_controller.php';
  $controller = new SessionController;
  $post       = $app->request()->post();
  $user       = $controller->validate($post);

  if($user) {
    $_Session['user'] = $user;
    $app->redirect('/');
  } else {
    $app->redirect('/login');
    // error messages
  }
});

$app->get('/admin', function () use ($app) {
});

$app->get('/admin/dashboard', function () use ($app) {
});

$app->get('/admin/home', function () use ($app) {
  require_once 'models/home.php';
  $home = Home::find('first');
});


$app->run();
