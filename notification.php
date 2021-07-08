<?php
    require_once "config.php";
    if(isset($_POST["email"]) && !empty($_POST["email"])){
        $sql = "SELECT * FROM user WHERE email=?";
        $stmt = mysqli_prepare($link ,$sql);
        mysqli_stmt_bind_param($stmt, "s", $param_email);
        $param_email = $_POST["email"];
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
            if(mysqli_num_rows($result) == 1){ 
                $row = mysqli_fetch_array($result);
                setcookie("password", $row["password"], time() + 60*5);
                $to= $_POST["email"];
                $subject = "Password recovery";
                $message = "Click link for recovery  http://localhost/Librery%20System/login/pass_recovery.php";
                $headers =  "From:vikram000712345@gmail.com";
                if (mail($to, $subject, $message, $headers)) {
                    exit("We sent mail to you, check your inbox to recover your password.");
                    
                } else {
                    echo "ERROR in sending mail";
                }
            }else{
                exit("provide correct email address.");
            }
        }else{
            exit("not able to execute");
        }
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <title>password recovery</title>
    </head>
    <body>
        <form action="notification.php" method="POST">
            <label for="email">Your Email address</label><br>
            <input type="email" name="email" id="email">
            <input type="submit" name="submit" value="Get Password">
        </form>
    </body>
</html>
