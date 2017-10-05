<?php

/*
 * Constantes com parametros dos caminhos
 */
define('BASE_URL', 'http://localhost:8888/framework-devwilliam/');
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', getcwd() . DS);
define('APP_PATH', ROOT . 'app' . DS);
define('CORE_PATH', APP_PATH . 'core' . DS);
define('CONTROLLER_PATH', APP_PATH . 'controllers' . DS);
define('MODEL_PATH', APP_PATH . 'models' . DS);
define('VIEW_PATH', APP_PATH . 'views' . DS);
define('LIB_PATH', APP_PATH . 'libs' . DS);
define('HELPER_PATH', APP_PATH . 'helpers' . DS);
define('ERRO_PATH', VIEW_PATH . 'errors' . DS);
define('AMBIENTE', 'desenvolvimento');


/*
 * Valores padrão
 */
define('CONTROLLER_DEFAULT', 'homeController');
define('METHOD_DEFAULT', 'index');



/*
 * Constantes de parâmetros para configuração da conexão com banco de dados
 */
define('SGBD', 'mysql');
define('HOST', '192.168.0.2');
define('DBNAME', 'nfe');
define('CHARSET', 'utf8');
define('USER', 'root');
define('PASSWORD', '011224');
define('SERVER', 'linux');


/*
 * Constantes servidor SMTP
 */
define('SERVIDOR', 'smtp.gmail.com');
define('PORTA', 465);
define('USUARIO', 'wllsistemas02@gmail.com');
define('SENHA', '011224wllfl');
define('AUTENTICACAO', 'SSL');