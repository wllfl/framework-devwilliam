<?php

/*
 * Constantes com parametros dos caminhos
 */
define('BASE_URL', 'http://localhost/framework-devwilliam/');
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', getcwd() . DS);
define('APP_PATH', ROOT . 'app' . DS);
define('CORE_PATH', APP_PATH . 'core' . DS);
define('CONTROLLER_PATH', APP_PATH . 'controllers' . DS);
define('MODEL_PATH', APP_PATH . 'models' . DS);
define('VIEW_PATH', APP_PATH . 'views' . DS);
define('LIB_PATH', APP_PATH . 'libraries' . DS);
define('HELPER_PATH', APP_PATH . 'helpers' . DS);
define('ERRO_PATH', VIEW_PATH . 'errors' . DS);

/*
 * Constantes de parâmetros para configuração da conexão com banco de dados
 */
define('SGBD', 'mysqlp');
define('HOST', 'localhost');
define('DBNAME', 'devwilliam');
define('CHARSET', 'utf8');
define('USER', 'root');
define('PASSWORD', '011224');
define('SERVER', 'linux');