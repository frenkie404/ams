<?php
    session_start();

    function get_session($name){
        if(!isset($_SESSION[$name])){
            return null;
        }
        return $_SESSION[$name];
    }

    function set_session($name, $value){
        $_SESSION[$name] = $value;
    }
?>