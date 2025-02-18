<?php


$dsn = "pgsql:host=localhost;dbname=";
//put your username here
$dbusername = "";
// put the password here
$dbpassword = "";


try {
    $pdo = new PDO($dsn, $dbusername, $dbpassword);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e ) {
    echo "Connetcion failed ". $e->getMessage();
}
