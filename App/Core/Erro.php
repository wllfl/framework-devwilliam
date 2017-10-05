<?php

Namespace App\Core; 

class Erro{
	
	public static function redirectErro($erro) {
		require_once ERRO_PATH . 'erro.php';
		exit();
   }

}