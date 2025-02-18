<?php

header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");


if($_SERVER["REQUEST_METHOD"] === "POST"){

  


    try {
        require_once './../includes/db.config.php';
        require_once 'signup.contr.php';
        require_once 'sigunp.model.php';
        


        $enconde = file_get_contents('php://input');

        $decodeData = json_decode($enconde, true);


        $userName = $decodeData["username"];
        $email = $decodeData["email"];
        $pwd = $decodeData["pwd"];

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


    //


        require_once './../includes/sessio.php';

        if($erros){
            $_SESSION["errosSignupt"] = $erros;

            echo json_encode(["success" => false, "errors" => $erros]);
   
            die();
        }
        
        createUser($pdo, $userName, $email, $pwd);
        
        echo json_encode(["success" => true, "message" => "User created successfully"]);

        $pdo = null;
        $stmt = null;

        die();
  

    } catch (PDOException $e) {

        echo json_encode(["success" => false, "message" => "Invalid request"]);
        die("Query faild: ". $e->getMessage());
    }
}

