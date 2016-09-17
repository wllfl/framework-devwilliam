<?php

class erro{
	
	public static function redirectErro($erro) {
		require_once ERRO_PATH . 'erro.php';
		exit();
   }

}