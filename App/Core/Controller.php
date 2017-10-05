<?php 

Namespace App\Core; 

class Controller{

	public $session;
	public $loader;
	public $post = [];
	public $get  = [];

	public function __construct(){
		try{
			$this->session = new session();
			$this->loader  = new loader();
		}catch(Exception $e){
			erro::redirectErro($e->getMessage());
		}
	}

	protected function responseJSON($dados=[]){
		try{
			header('Content-Type: application/json');
			echo json_encode($dados);
		}catch(Exception $e){
			erro::redirectErro($e->getMessage());
		}
	}

 	/*
 	 * MÉTODO EXCLUSIVO PARA O SISTEMA DE EMISSÃO DE NFE
 	 */
	protected function verificaSession(){
		if (!$this->session->get('LOGADO')):
			header("location:".BASE_URL."admin/login");
		endif;
	}

}

