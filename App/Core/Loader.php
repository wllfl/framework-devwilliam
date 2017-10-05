<?php

Namespace App\Core; 

class Loader{

    public function model($nameModel){
        $nameModel = $nameModel . 'Model';
        if (file_exists(MODEL_PATH . $nameModel . '.php')):
            require_once MODEL_PATH . $nameModel . '.php';
            return new $nameModel;
        else:
            Erro::redirectErro("O Model solicitado '" . MODEL_PATH . $nameModel . ".php' não foi encontrado!");
        endif;
    }

    public function view($nameView, $dados){
        if (file_exists(VIEW_PATH . $nameView . '.php'))
            require_once VIEW_PATH . $nameView . '.php';
        else
            Erro::redirectErro("A View solicitada '" . VIEW_PATH . $nameView . ".php' não foi encontrada!");
    }

    public function library($lib){
    	if (file_exists(LIB_PATH . "{$lib}.class.php")):
        	include LIB_PATH . "{$lib}.class.php";
            $lib = new $lib;
		else:
			Erro::redirectErro("A Biblioteca solicitada '" . LIB_PATH . $lib . ".class.php' não foi encontrada!");
		endif;
    }

    public function helper($helper){
        if (file_exists(HELPER_PATH . "{$helper}_helper.php")):
        	include HELPER_PATH . "{$helper}_helper.php";
		else:
			Erro::redirectErro("O arquivo Helper solicitado '" . HELPER_PATH . $helper . "_helper.php' não foi encontrado!");
		endif;
    }

}