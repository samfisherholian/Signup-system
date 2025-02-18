<?php
//in logout unset the session and destroy
session_start();
session_unset();
session_destroy();


header("Location: ../login.php");
die();

