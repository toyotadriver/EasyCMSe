<?php

require_once 'core/model.php';
require_once 'core/controller.php';
require_once 'core/view.php';
require_once 'core/route.php';
require 'dblogin.php';

require 'plugins/debug_to_console.php';

session_start();
Route::start();
?>