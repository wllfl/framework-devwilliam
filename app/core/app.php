<?php 

class App{

	// Atributos da Classe
	protected $controller = '';
	protected $method     = '';
	protected $params     = [];
	protected $post       = [];

	// Construtor da Classe
	public function __construct(){
		$this->parseUrl();
		$this->getObjeto();
	}

	// Método para separar os parâmetros da URL
	private function parseUrl(){

		try{
			$url   = (isset($_GET['url'])) ? filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL) : [];
			$param = (!empty($url)) ? explode('/', $url) : [];
			$this->controller = (isset($param[0])) ? $param[0] . 'Controller' : CONTROLLER_DEFAULT;
			$this->method     = (isset($param[1])) ? $param[1] : METHOD_DEFAULT;

			unset($param[0]);
			unset($param[1]);

			$paramUrl = explode('?', $_SERVER['REQUEST_URI']);

			if(!empty($paramUrl[1])):
				parse_str($paramUrl[1], $queryString);

				foreach($queryString as $key => $valor):
					$param[] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_STRING);
				endforeach;
			endif;

			$this->params = ($param) ? array_values($param) : [] ;
		}catch (Exception $e){
			erro::redirectErro($e->getMessage());
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

			if(method_exists($this->controller, $this->method)):
				call_user_func_array([$this->controller, $this->method], $this->params);
			endif;	
		else:
			erro::redirectErro("Arquivo Controller não encontrado '" . CONTROLLER_PATH . $this->controller . ".php'!");
		endif;
	} 

	// Método para limpar os valores enviados via POST
	private function cleanPOST(){
		foreach($_POST as $key => $valor):
			$this->post[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_STRING);
		endforeach;	
	}

}
