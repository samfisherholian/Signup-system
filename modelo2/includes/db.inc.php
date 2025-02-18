<?php


$dsn = "pgsql:host=localhost;dbname=";
//put your usename here
$dbusername = "";
// put the password
$dbpassword = "";


try {
    $pdo = new PDO($dsn, $dbusername, $dbpassword);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e ) {
    echo "Connetcion failed ". $e->getMessage();
}
