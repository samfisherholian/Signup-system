<?php

// basic do the same the login
if($_SERVER["REQUEST_METHOD"] === "POST"){

    $userName = $_POST["username"];

    $pwd = $_POST["password"];

    $email = $_POST["email"];



    try {
        require_once 'db.inc.php';
        require_once 'signupt.model.php';
        require_once 'signupt.contr.php';

        //erro handling

        $erros = [];

        if(isInpustEmpety($userName, $email, $pwd)){

            $erros["empety_input"] = "fill all the fields";

        }
        if(isValidEmail($email)){

            $erros["invalid_email"] = "insert a valid email";

        }
        if(isUsernameAlreadyExists($pdo,$userName)){

            $erros["username_Taken"] = "this username is already taken";

        }
        if(isEmailAlreadyExists($pdo, $email)){
            $erros["email_Taken"] = "this email is already taken";
        }

        require_once 'session.config.php';

        if($erros){
            $_SESSION["errosSignupt"] = $erros;

            header("Location: ../signupt.php");
            die();
        }
        
        createUser($pdo, $userName, $email, $pwd);
        header("Location: ../signupt.php?signup=SUCCESS");
        $pdo = null;
        $stmt = null;

        die();
  

    } catch (PDOException $e) {
        die("Query failed: ". $e->getMessage());
    }


}else{
    header("Location: ../signupt.php");
    die();
}
