<?php

    require_once './includes/session.config.php';
    require_once './includes/login.view.php';
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>


<h3> 
    <?php
        userOutput();
    
    ?>
</h3>



<?php 
    if(isset($_SESSION["user_id"])){ ?>

    <div class="min-vh-100">
        <form action="includes/logout.php" method="post">
            <button class="btn btn-primary w-100 p-3 h-15">Logout</button>            
        </form>

    </div>
    <?php } ?>


    <div class="d-flex justify-content-center align-items-center min-vh-100 d-flex flex-column">

    <?php 
    if(!isset($_SESSION["user_id"])){ ?>
        <p class="h1"> Welcome !</p>
       
        <form action="login.php" method="post">

            <button class="btn btn-primary w-10 p-3 h-15 mb-3">Login</button>

           
            
        </form>

        <form action="signupt.php" method="post">
            <button class="btn btn-primary w-10 p-3 h-15 mb-3">Sign up</button>
        </form>


        

    <?php } ?>

    </div>





</body>

</html>