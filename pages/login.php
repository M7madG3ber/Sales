<?php

session_start();

if( isset( $_SESSION["user"]) ){
    header("Location:home.php");
}

if( isset( $_POST["submit"] ) ){
    $arr = [] ;
    $arr[] = $_POST["username"] ;
    $arr[] = $_POST["password"] ;

    include("../database/connection.php");

    $q = $db->prepare("select * from users where username=? and password=?");
    $q->execute( $arr );
    $user = $q->fetch();

    if( $user == false )
    {
        echo '<h3>Failed To Login</h3>';
    }
    else
    {
        $_SESSION["user"] = $user["username"];
        $_SESSION["type"] = $user["user_type"];
        header( "Location:home.php") ;
    }
    // echo "<pre>";
    // var_dump( $_SESSION );
    // echo "</pre>";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="icon" href="../images/favicon.ico" type="image/x-icon">
    <style>
    @import url('https://fonts.googleapis.com/css?family=Cairo');

    * {
        box-sizing: border-box;
        font-family: 'cairo', sans-serif;
    }

    body {
        background: #f6f5f7;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        font-family: 'cairo', sans-serif;
        height: 90vh;
        margin: -20px 0 50px;
    }

    h1 {
        font-weight: bold;
        margin: 0;
    }

    h2 {
        text-align: center;
    }

    h3 {
        font-family: cairo;
        text-align: center;
        color: FF4B2B;
    }

    p {
        font-size: 14px;
        font-weight: 100;
        line-height: 20px;
        letter-spacing: 0.5px;
        margin: 20px 0 30px;
    }

    span {
        font-size: 12px;
    }

    a {
        color: #333;
        font-size: 14px;
        text-decoration: none;
        margin: 15px 0;
    }

    button {
        border-radius: 20px;
        border: 1px solid #FF4B2B;
        background: linear-gradient(to left, #FF4B2B, #FF416C);
        color: #FFFFFF;
        font-size: 12px;
        font-weight: bold;
        padding: 12px 45px;
        letter-spacing: 1px;
        outline: none;
        text-transform: uppercase;
        transition: transform 80ms ease-in;
        margin-top: 20px;
    }

    button:active {
        transform: scale(0.95);
    }

    form {
        background-color: #FFFFFF;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        padding: 0 50px;
        height: 100%;
        text-align: center;
    }

    input {
        background-color: #eee;
        padding: 12px 15px;
        margin: 20px 0;
        outline: none;
        width: 100%;
        font-size: 20px;
        border: none;
        border-bottom: 2px solid #FF416C;
	background:transparent !important;
    }

    .container {
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25),
            0 10px 10px rgba(0, 0, 0, 0.22),
            0 -10px 10px rgba(0, 0, 0, 0.22);
        position: relative;
        overflow: hidden;
        width: 768px;
        max-width: 100%;
        min-height: 400px;
    }

    .form-container {
        position: absolute;
        top: 0;
        height: 100%;
        transition: all 0.6s ease-in-out;
    }

    .sign-in-container {
        left: 0;
        width: 50%;
        z-index: 2;
    }

    .container.right-panel-active .sign-in-container {
        transform: translateX(100%);
    }

    .overlay-container {
        position: absolute;
        top: 0;
        left: 50%;
        width: 50%;
        height: 100%;
        overflow: hidden;
        transition: transform 0.6s ease-in-out;
        z-index: 100;
    }

    .container.right-panel-active .overlay-container {
        transform: translateX(-100%);
    }

    .overlay {
        background: #FF416C;
        background: -webkit-linear-gradient(to right, #FF4B2B, #FF416C);
        background: linear-gradient(to right, #FF4B2B, #FF416C);
        background-repeat: no-repeat;
        background-size: cover;
        background-position: 0 0;
        color: #FFFFFF;
        position: relative;
        left: -100%;
        height: 100%;
        width: 200%;
        transform: translateX(0);
        transition: transform 0.6s ease-in-out;
    }

    .container.right-panel-active .overlay {
        transform: translateX(50%);
    }

    .overlay-panel {
        position: absolute;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        padding: 0 40px;
        text-align: center;
        top: 0;
        height: 100%;
        width: 50%;
        transform: translateX(0);
        transition: transform 0.6s ease-in-out;
    }

    .overlay-left {
        transform: translateX(-20%);
    }

    .container.right-panel-active .overlay-left {
        transform: translateX(0);
    }

    .overlay-right {
        right: 0;
        transform: translateX(0);
    }

    .container.right-panel-active .overlay-right {
        transform: translateX(20%);
    }
    </style>
</head>

<body>
    <div class="container" id="container">
        <div class="form-container sign-in-container">
            <form action="login.php" method="post">
                <input type="text" name="username" placeholder="Enter Username" />
                <input type="password" name="password" placeholder="Enter Password" />
                <button type="submit" name="submit">Login</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-right">
                    <h1>Gaber.Ware</h1>
                    <p>Sales Website</p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>