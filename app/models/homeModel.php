<?php 

class homeModel extends Model{

	public function __construct(){
		parent::__construct();
		$this->table = 'tab_usuario';
	}

	public function getAllUsuarios($status=null){

		if ($status):
			$usuarios = $this->selectCustom('SELECT id, nome FROM tab_usuario WHERE status =:status', ['status' => $status]);
		else:
			$usuarios = $this->selectCustom('SELECT id, nome FROM tab_usuario');
		endif;

		return $usuarios;
	}
}