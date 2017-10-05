<?php 
ini_set('display_errors', 1);
ini_set('log_errors', 1);
error_reporting(E_ALL);

require_once 'vendor/autoload.php';

Use App\Core\App;

$App = new App();