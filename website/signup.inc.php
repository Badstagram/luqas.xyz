<?php
if (isset($_POST['signup-submit'])) {
    
    require 'dbh.inc.php';

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['pwd'];
    $passwordRepeat = $_POST['pwd-repeat'];



    if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat)) {
        header("Location: https://luqas.xyz/signup.php?error=emptyfield&username=".$username"&email".$email));
        exit();
    }
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location: https://luqas.xyz/signup.php?error=invalidmailusername");

    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: https://luqas.xyz/signup.php?error=invalidmail&uid=".$username);    
        exit();    
    } 
    else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location: https://luqas.xyz/signup.php?error=invalidusername&email=".$email);        
        exit();
    } 
    else if ($password == $passwordRepeat) {
        header("Location: https://luqas.xyz/signup.php?error=passwordCheck&username=".$username"&email=".$email);

    }
    else {
        
        $sql = "SELECT Username FROM users WHERE Username=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: https://luqas.xyz/signup.php?error=sqlerror");
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_numb_rows();
            if ($resultCheck > 0){
                header("Location: https://luqas.xyz/signup.php?error=usernametaken&email=".$email);
            exit();
            }
            else {
                
                $sql = "INSERT INTO users (username, email, pwd) VALUES (?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);

                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: https://luqas.xyz/signup.php?error=sqlerror");
                    exit();
                }
                else {

                    $hashedpwd = password_hash($password, PASSWORD_DEFAULT);

                    mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedpwd);
                    mysqli_stmt_execute($stmt);

                    header("Location: https://luqas.xyz/signup.php?signup=success");
                    exit();                       
                }

            }
     
       
        }

    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    

}
else {
    header("Location: https://luqas.xyz/signup.php?signup=success");
                    exit();  

}