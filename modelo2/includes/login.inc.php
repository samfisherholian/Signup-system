<?php 

//acept only post method
if($_SERVER["REQUEST_METHOD"] === "POST"){

    $email = $_POST["email"];

    $pwd = $_POST["password"];

    try {

        require_once 'db.inc.php';
        require_once 'login.contr.php';
        require_once 'login.model.php';
        require_once 'login.view.php';

        $erros = [];

        //handling erros

        if(isInputLoginEmpety($email, $pwd)){

            $erros["empety_input"] = "fill all the fields";

        }

        $result = getUserEmail($pdo, $email);

        if(isEmaiWrong($result)){
            $erros["email_wrong"] = "Incorrect data";
        }

        if(!isEmaiWrong($result) && isPassworWrong($pwd, $result["pwd"])){
            $erros["email_wrong"] = "Incorrect data";
        }


    //


        require_once 'session.config.php';

        //if has any erros, the erros will be save in the session variable and then finsh the program

        if($erros){
            $_SESSION["erros_login"] = $erros;

            header("Location: ../login.php");
            die();
        }
        
        //append the user id to session
        $newSessionId = session_create_id();
        $sessionId = $newSessionId. "_". $result["id"];
        session_id($sessionId);

        //i have create a few variables to use in the future

        $_SESSION["user_id"] = $result["id"];
        $_SESSION["user_name"] = $result["username"];
        $_SESSION["user_email"] = $result["email"];

        $_SESSION["last_regeneration"] = time();
        
        header("Location: ../login.php?login=sucess");

        $pdo = null;
        $stmt = null;

        die();
        

        //code...
    } catch (PDOException $e) {
        die("Query failed: ". $e->getMessage());
    }
    

}else{
    header("Location: ../login.php");
    die();
}
