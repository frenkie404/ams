<?php
    include "../includes/session.php";
    include "../includes/functions.php";

    if(isset($_POST["login"])){
        validate_login();
    }

    function validate_login(){
        $username = $_POST["username"];
        $password = $_POST["password"];
        $user_role =  get_session("user_role");
        
        switch($user_role){
            case "admin":
                validate_admin($username, $password);
                break;
            case "teacher":
                validate_teacher($username, $password);
                break;
            case "student":
                validate_student($username, $password);
                break;
        }
    }

    function validate_admin($username, $password){
      if($username === "admin" && $password === "admin"){
        set_session("logged_in_as", "admin");
        redirect("/dashboard");
      }
      echo "invalid credentials";
      return false;
    }
?>