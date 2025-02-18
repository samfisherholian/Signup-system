<?php 

header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

if($_SERVER["REQUEST_METHOD"] === "POST"){

    try {
        require_once './../includes/db.config.php';
        require_once 'login.contr.php';
        require_once 'login.model.php';
        


        $enconde = file_get_contents('php://input');

        $decodeData = json_decode($enconde, true);


        $email = $decodeData["email"];
        $pwd = $decodeData["pwd"];

        $erros = [];

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



        require_once './../includes/sessio.php';

        if($erros){
            $_SESSION["erros_login"] = $erros;
            echo json_encode(["success" => false, "errors" => $erros]);
            die();
        }

        $newSessionId = session_create_id();
        $sessionId = $newSessionId. "_". $result["id"];
        session_id($sessionId);

        $_SESSION["user_id"] = $result["id"];
        $_SESSION["user_name"] = $result["username"];
        $_SESSION["user_email"] = $result["email"];

        $_SESSION["last_regeneration"] = time();
        
        echo json_encode(["success" => true, "message" => "Login successful!", "user" => ["username" => $_SESSION["user_name"], "email" => $_SESSION["user_email"],]]);

        $pdo = null;
        $stmt = null;

        die();

    } catch (PDOException $e) {

        echo json_encode(["success" => false, "message" => "Invalid request"]);
        die("Query failed: ". $e->getMessage());
    }

}
