<?php
// answer all cross domain requests with true yet
$app->options('/(:name+)', function() use ($app) {
  // Here we have the option to control and limit post and put requests eg. the header etc... quite cool
  echo 200;
});

$app->run();
