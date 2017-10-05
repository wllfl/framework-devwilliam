<?php 

Use App\Core\Controller;

class homeController extends Controller{

	private $modelUsuario;

	public function __construct(){
		parent::__construct();
		$this->loader->helper('funcoes');
		$this->modelUsuario = $this->loader->Model('usuario');
	}

	public function index(){
		$usuarios = $this->modelUsuario->getAllUsuarios();
		$this->loader->view(
			'Home/home', 
			[
				'titulo'   => 'Título da View', 
				'usuarios' => $usuarios,
				'senha'    => gerarSenha()
			]
		);
	}

}
