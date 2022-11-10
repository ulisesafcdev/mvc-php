<?php

require_once 'config/config.php';

spl_autoload_register(function($lib){
  require_once 'lib/' . $lib . '.php';
});