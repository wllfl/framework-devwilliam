<?php 

class homeController extends Controller{

	private $modelHome;

	public function __construct(){
		parent::__construct();
		$this->modelHome = $this->loadModel('home');
	}

	public function index(){
		$usuarios = $this->modelHome->getAllUsuarios();
		$this->view('home', array('titulo' => 'Minha View', 'usuarios' => $usuarios));
	}

}
