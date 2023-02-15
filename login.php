<?php
session_start();
require 'function.php';

if( isset($_COOKIE['id']) && isset($_COOKIE['key']) ) {
    $id = $_COOKIE['id'];
    $key = $_COOKIE['id'];

    $result = mysqli_query($conn, "SELECT username FROM user WHERE id = $id");
    $row = mysqli_fetch_assoc($result);

    if( $key === hash('sha256', $row['username']) ) {
        $_SESSION['login'] = true;
    }
}


if( isset($_SESSION["login"]) ) {
    header("Location: index.php");
    exit;
}

if( isset($_POST["login"]) ) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

    if( mysqli_num_rows($result) === 1 ) {

        $row = mysqli_fetch_assoc($result);
        if(password_verify($password, $row["password"]) ) {

            $_SESSION["login"] = true;

            if( isset($_POST['remember']) ) {

                setcookie('id', $row['id'], time()+60);
                setcookie('key', hash('sha256', $row['username']), time() +60); {
                    $_SESSION["login"] = true;
                }
            }

            header("Location: index.php");
            exit;
        }
    }
    

    $error = true;


}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <style>
        body {
            background-color:lightskyblue;
            background-size:cover;
            

        }
     .container {
        width:30%;
        background-color:grey;
        margin:auto;
        padding:20px;
        margin-top:170px; 
        border-radius:50px;
       


     }

     label {
        display:block;
     }
    </style>

</head>
<body>
<div class="container">

    <?php if( isset($error) ):?>
        <p style="color: red; font-style: italic;">username atau password salah</p>
    <?php endif; ?>    


   
    <form action="" method="post">
        <ul>
            <li>
                <label for="username">username :</label>
                <input type="text" name="username" id="username">
            </li>
            <li>
                <label for="password">password :</label>
                <input type="password" name="password" id="password">
            </li>
            <li>
                <label for="remember">Remember me :</label>
                <input type="checkbox" name="remember" id="remember">
            </li>
            <li>
                <button type="submit" name="login">Login</button>
            </li>
        </ul>
    </form>

    </div>
    



</body>
</html>