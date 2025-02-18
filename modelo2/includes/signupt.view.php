<?php

declare (strict_types=1);


function checkSinupErros(){

    if(isset($_SESSION["errosSignupt"])){
        $erros = $_SESSION["errosSignupt"];

        echo "<br>";

        foreach($erros as $erro){
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong> <p>'. $erro. '</p> </strong> Warning </div>';
        }

        unset($_SESSION["errosSignupt"]);
    }else if($_GET["signup"] === "SUCCESS" && isset($_GET["signup"] )){
        echo '<div class="alert alert-success " role="alert">
            <strong> <p> SIGNUP SUCCESFULL</p> </strong> </div>';
    }
}

