<?php

declare (strict_types=1);

//the check inputs and erros 
function isInpustEmpety(string $userName, string $email, string $pwd){

    if(empty($userName) || empty($email) || empty($pwd)){
        return true;
    }else{
        return false;
    }
}


function isValidEmail(string $email){

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        return true;
    }else{
        return false;
    }
}

function isUsernameAlreadyExists(object $pdo, string $userName){

    if(getUsername($pdo, $userName)){
        return true;
    }else{
        return false;
    }

}

function isEmailAlreadyExists(object $pdo, string $email){

    if(getUserEmail($pdo, $email)){
        return true;
    }else{
        return false;
    }

}


function createUser(object $pdo, string $userName, string $email, string $pwd){

    setUser($pdo, $userName,  $email,  $pwd );
  
}

