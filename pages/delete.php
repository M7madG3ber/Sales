<?php

if( isset( $_GET["type"] ) )
{
    $value = $_GET['id'] ;
    $sql = "" ;
    switch( $_GET["type"] )
    {
        case "user":
            $sql = "delete from users where username='$value'" ;
            break;
        case "type":
            $sql = "delete from types where id=$value" ;
            break;
        case "item":
            $sql = "delete from items where id=$value" ;
            break;
    }
    if( $sql != "" )
    {
        include("../database/connection.php");
        $db->exec($sql);
        // return back
        header("Location:". $_SERVER['HTTP_REFERER'] );
    }
}
else{
    // return back
    header("Location:". $_SERVER['HTTP_REFERER'] );
}