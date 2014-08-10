<?php

    require_once 'includes/initialize.php';
    require_once getcwd().'/../config/app_config.php';
    ini_set('display_errors',1);
    ini_set('display_startup_errors',1);
    error_reporting(-1);
  ?>

    <?php
      require_once 'router.php';
    ?>
