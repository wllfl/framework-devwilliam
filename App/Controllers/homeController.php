<?php 

Use App\Core\Controller;

class homeController extends Controller{

	private $modelHome;

	public function __construct(){
		parent::__construct();
		$this->loader->helper('funcoes');
		//$this->modelHome = $this->loadModel('home');
	}

	public function index(){
		//$usuarios = $this->modelHome->getAllUsuarios();
		$this->loader->view('home', ['titulo' => 'teste', 'senha' => gerarSenha()]);
	}

}
