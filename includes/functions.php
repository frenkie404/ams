<?php
    
    function redirect($path){
        header("Location: ".$path);
        return die();
    }

?>