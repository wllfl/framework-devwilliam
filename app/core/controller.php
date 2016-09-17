<?php 

class Controller{

	public $session;
	public $loader;

	public function __construct(){
		try{
			$this->session = new session();
			$this->loader  = new loader();
		}catch(Exception $e){
			erro::redirectErro($e->getMessage());
		}
	}

	protected function view($nomeView, $dados){
		if (file_exists(VIEW_PATH . $nomeView . '.php'))
			require_once VIEW_PATH . $nomeView . '.php';
		else
			erro::redirectErro("A View solicitada '" . VIEW_PATH . $nomeView . ".php' não foi encontrada!");
	}

	protected function loadModel($nameModel){
		$nameModel = $nameModel . 'Model';
		if (file_exists(MODEL_PATH . $nameModel . '.php')):
			require_once MODEL_PATH . $nameModel . '.php';
			return new $nameModel;
		else:
			erro::redirectErro("O Model solicitado '" . MODEL_PATH . $nameModel . ".php' não foi encontrado!");
		endif;
	}

	protected function responseJSON($dados=[]){
		try{
			header('Content-Type: application/json');
			echo json_encode($dados);
		}catch(Exception $e){
			erro::redirectErro($e->getMessage());
		}
	}

}

