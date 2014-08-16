<?php
// answer all cross domain requests with true yet
$app->options('/(:name+)', function() use ($app) {
  // Here we have the option to control and limit post and put requests eg. the header etc... quite cool
  echo 200;
});
$app->get('/', function() use ($app) {
  try{
      $user = User::find(1);
   } catch (\ActiveRecord $e){
    if ($e instanceof RecordNotFound) {
      $user = $e->getMessage();
      // 404
    } else if ($e instanceof ValidationsArgumentError) {
      $e->getMessage();
      // 422
     } else {
      $user = $e->getMessage();
      // 500
     }
   }
  if(isset($error)) {
    var_dump($user);
  } else {
    // 200
    echo $user;
  }

});
$app->run();

