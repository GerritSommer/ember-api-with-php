<?php
// Init Session
session_start();

 // Enable PHP-Shorttags
ini_set('short_open_tag', 'On');


//MYSQL Databse Setup
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWD', '');
define('DB_NAME', 'base');


// Active Record
require_once 'includes/php-activerecord/ActiveRecord.php';

ActiveRecord\Config::initialize(function($cfg) {
    $cfg->set_model_directory('models');
    $cfg->set_connections(array( 'development' => 'mysql://'.DB_USER.'@'.DB_HOST.'/'.DB_NAME));
});

require 'includes/Slim/Slim.php';
\Slim\Slim::registerAutoloader();
$app = new \Slim\Slim(array(
  'debug' => true,
  'templates.path' => './views'
  ));