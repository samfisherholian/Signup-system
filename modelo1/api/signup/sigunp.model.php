<?php

declare (strict_types=1);

require_once './../includes/db.config.php';

function getUsername(object $pdo, string $userName){

    $query = "SELECT username FROM users WHERE username = ?;";

    $stmt = $pdo->prepare($query);
    
    $stmt->execute([$userName]);

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result;


}

function getUserEmail(object $pdo, string $email){

    $query = "SELECT email FROM users WHERE email = ?;";

    $stmt = $pdo->prepare($query);
    
    $stmt->execute([$email]);

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result;


}

function setUser(object $pdo, string $userName, string $email, string $pwd ){

        $query = "INSERT INTO users (username, pwd, email) VALUES(?, ?, ?);";

        $stmt = $pdo->prepare($query);

        $options = [ 
            'cost' => 12
        ];

        $hashpwd = password_hash($pwd, PASSWORD_BCRYPT, $options);

        $stmt->execute([$userName, $hashpwd, $email]);


}

