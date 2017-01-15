<?php

class Loader{

    public function library($lib){
    	if (file_exists(LIB_PATH . "{$lib}.class.php")):
        	include LIB_PATH . "{$lib}.class.php";
		else:
			erro::redirectErro("A Biblioteca solicitada '" . LIB_PATH . $lib . ".class.php' não foi encontrada!");
		endif;
    }

    public function helper($helper){
        if (file_exists(HELPER_PATH . "{$helper}_helper.php")):
        	include HELPER_PATH . "{$helper}_helper.php";
		else:
			erro::redirectErro("O arquivo Helper solicitado '" . HELPER_PATH . $helper . "_helper.php' não foi encontrado!");
		endif;
    }

}