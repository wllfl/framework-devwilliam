<?php 

Use App\Core\Model;

class usuarioModel extends Model{

	public function __construct(){
		parent::__construct();
		$this->table = 'tab_usuario';
	}

	public function getAllUsuarios(){

		$usuarios = [
			['nome' => 'teste', 'email' => 'teste@email.com'],
			['nome' => 'teste2', 'email' => 'teste2@email.com'],
		];

		return $usuarios;
	}
}