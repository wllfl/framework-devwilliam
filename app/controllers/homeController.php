<?php 

class homeController extends Controller{

	private $modelHome;

	public function __construct(){
		parent::__construct();
		$this->modelHome = $this->loadModel('homeModel');
	}

	public function index(){
		$usuarios = $this->modelHome->getAllUsuarios();
		$this->loader->helper('funcoes');
		$senha = gerarSenha(8);
		$this->view('home', array('titulo' => 'Minha View', 'usuarios' => $usuarios));
	}

	public function editar($id=null){
		
	}

}
