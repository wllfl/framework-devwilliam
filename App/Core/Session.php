<?php

Namespace App\Core; 

class Session {

    public function __construct() {

        $status = session_status();

        if($status == PHP_SESSION_DISABLED) {
            Erro::redirectErro('Session está desabilitada!');
        }

        if($status == PHP_SESSION_NONE) {
            session_start();
        }

    }

    public function get($key) {
        if(array_key_exists($key, $_SESSION)) {
            return $_SESSION[$key];
        }
        return null;
    }

    public function set($key, $value) {
        $_SESSION[$key] = $value;
    }

    public function delete($key) {
        if(array_key_exists($key, $_SESSION)) {
            unset($_SESSION[$key]);
            return true;
        }
        return false;
    }

    public function exists($key) {
        return array_key_exists($key, $_SESSION);
    }

}