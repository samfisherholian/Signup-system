<?php

declare (strict_types=1);



function isInputLoginEmpety(string $email, string $pwd){
    if(empty($email) || empty($pwd)){
        return true;
    }

    return false;
}


function isEmaiWrong(array | bool $result){

    if(!$result){
        return true;
    }else{
        return false;
    }

}

function isPassworWrong(string $pwd, string $hashpwd){

    if(!password_verify($pwd, $hashpwd)){
        return true;
    }

    return false;
}
