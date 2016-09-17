<?php 

class Controller{

	public $session;
	public $loader;

	public function __construct(){
		$this->session = new session();
		$this->loader  = new loader();
	}

	protected function view($nomeView, $dados){
		return require_once "app/views/{$nomeView}.php";
	}

	protected function loadModel($nameModel){
		require_once 'app/models/' . $nameModel . '.php';
		return new $nameModel();
	}

	protected function responseJSON($dados=[]){
		header('Content-Type: application/json');
		echo json_encode($dados);
	}

}

