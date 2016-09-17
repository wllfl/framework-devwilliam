<?php 

class App{

	// Atributos da Classe
	protected $controller = 'homeController';
	protected $method     = 'index';
	protected $params     = [];

	// Construtor da Classe
	public function __construct(){
		$this->parseUrl();
		$this->getObjeto();
	}

	// Método para separar os parâmetros da URL
	private function parseUrl(){

		$url   = (isset($_GET['url'])) ? filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL) : [];
		$param = (!empty($url)) ? explode('/', $url) : [];
		$this->controller = (isset($param[0])) ? $param[0] . 'Controller' : $this->controller;
		$this->method     = (isset($param[1])) ? $param[1] : $this->method;

		unset($param[0]);
		unset($param[1]);
		$this->params = ($param) ? array_values($param) : [] ;
	}

	// Método para instanciar o controller e chamar as action
	private function getObjeto(){

		if(file_exists(CONTROLLER_PATH . $this->controller . '.php')):
			require_once CONTROLLER_PATH . $this->controller . '.php';
			$this->controller = new $this->controller;

			if(method_exists($this->controller, $this->method)):
				call_user_func_array([$this->controller, $this->method], $this->params);
			endif;	
		else:
			echo 'Arquivo Controller não encontrado ' . CONTROLLER_PATH . $this->controller . '.php';
		endif;
	} 

}
