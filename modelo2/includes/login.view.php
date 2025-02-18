<?php


declare(strict_types= 1);

//view to hanlde to the front page of login
function userOutput(){
    if(isset($_SESSION["user_id"])){
        echo "you are logged as ". $_SESSION["user_name"];
    }else{
        echo "you are not logged";
    }
}

function checkErrosLoging(){


    if(isset($_SESSION["erros_login"])){
        $erros = $_SESSION["erros_login"];

        echo "<br>";

        foreach($erros as $erro){
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong> <p>'. $erro. '</p> </strong> Warning </div>';
        }

        unset($_SESSION["erros_login"]);

    }else if(isset($_GET["login"]) && $_GET["login"] === "sucess" && isset($_SESSION["user_id"])){

        echo '<div class="alert alert-success " role="alert">
        <strong> <p> Login SUCCESFULL</p> </strong> </div>';

    }

}
