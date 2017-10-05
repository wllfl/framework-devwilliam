<?php

Namespace App\Core; 

require 'Config.php';

class App{

	// Atributos da Classe
	protected $controller = '';
	protected $method     = '';
	protected $params     = [];
	protected $post       = [];
	protected $get        = [];

	// Construtor da Classe
	public function __construct(){
		$this->parseUrl();
		$this->getObjeto();
	}

	// Método para separar os parâmetros da URL
	private function parseUrl(){

		try{
			$urlGET = (isset($_GET['url'])) ? utf8_encode($_GET['url']) : '';
			$url    = (!empty($urlGET)) ? filter_var(rtrim($urlGET, '/'), FILTER_SANITIZE_URL) : [];
			$param  = (!empty($url)) ? explode('/', $url) : [];
			$this->controller = (isset($param[0])) ? $param[0] . 'Controller' : CONTROLLER_DEFAULT;
			$this->method     = (isset($param[1])) ? $param[1] : METHOD_DEFAULT;

			unset($param[0]);
			unset($param[1]);

			$parametro[] = $this->cleanGET($param);

			$this->params = ($param) ? array_values($param) : [] ;
		}catch (Exception $e){
			Erro::redirectErro($e->getMessage());
		}
	}

	// Método para instanciar o controller e chamar as action
	private function getObjeto(){

		if(file_exists(CONTROLLER_PATH . $this->controller . '.php')):
			require_once CONTROLLER_PATH . $this->controller . '.php';
			$this->controller = new $this->controller;

			if (isset($_POST)):
			   $this->cleanPOST();
			   $this->controller->post = $this->post;
			endif;

			if (isset($this->params)):
				$this->controller->get = $this->params;
			endif;

			if(method_exists($this->controller, $this->method)):
				call_user_func_array([$this->controller, $this->method], $this->params);
			endif;	
		else:
			Erro::redirectErro("Arquivo Controller não encontrado '" . CONTROLLER_PATH . $this->controller . ".php'!");
		endif;
	} 

	// Método para limpar os valores enviados via POST
	private function cleanPOST(){
		foreach($_POST as $key => $valor):
			$this->post[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_STRING);
		endforeach;	
	}

	// Método para limpar os valores enviados via GET
	private function cleanGET($parametroURL=null){
		$param[] = null;

		if(!empty($parametroURL)):
			$param[] = filter_var_array($parametroURL, FILTER_SANITIZE_STRING);
		endif;

		return (isset($param[1])) ? $param[1] : '';
	}

}
