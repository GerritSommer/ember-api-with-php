<?php
header('Access-Control-Allow-Origin: http://localhost:4200');
header('Access-Control-Allow-Headers: content-type, X-Requested-With, X-authentication, X-client'); //Allow JSON data to be consumed
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: GET,POST,OPTIONS,DELETE,PUT");
// error handling
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);
 // Enable PHP-Shorttags
ini_set('short_open_tag', 'On');


// Transforms an under_scored_string to a camelCasedOne
// better put it in some name
// function camelize($scored) {
//   return lcfirst(
//     implode(
//       '',
//       array_map(
//         'ucfirst',
//         array_map(
//           'strtolower',
//           explode(
//             '_', $scored)))));
// }

// Transforms a camelCasedString to an under_scored_one
function underscore($cameled) {
  return implode(
    '_',
    array_map(
      'strtolower',
      preg_split('/([A-Z]{1}[^A-Z]*)/', $cameled, -1, PREG_SPLIT_DELIM_CAPTURE|PREG_SPLIT_NO_EMPTY)));
}

// Active Record
require_once 'includes/php-activerecord/ActiveRecord.php';

ActiveRecord\Config::initialize(function($cfg) {
  $cfg->set_model_directory('models');
  $cfg->set_connections(array( 'development' => 'mysql://root@localhost/base'));
});

// load slim routing frameweok
require 'includes/Slim/Slim.php';

\Slim\Slim::registerAutoloader();

$app = new \Slim\Slim(array(
  'debug' => true,
  'templates.path' => './views'
  ));
// add middleware to convert json to assoc array
$app->add(new \Slim\Middleware\ContentTypes());

// autoloader for models and controller
require_once 'models/base_model.php';
spl_autoload_register(function ($class_name) {
  $directories = array('controllers/','models/');
  $class_name = underscore($class_name);
  foreach ($directories as $directory) {
    if(file_exists($directory . $class_name . ".php")) {
      require_once $directory . $class_name . ".php";
    }
  }
});
// load all routes
foreach (glob("routes/*") as $filename) {
  require_once $filename;
}


