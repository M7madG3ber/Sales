<?php

session_start();

if( isset( $_SESSION["user"]) ){
    unset( $_SESSION["user"]);
    unset( $_SESSION["type"]);
}
header("Location:login.php");