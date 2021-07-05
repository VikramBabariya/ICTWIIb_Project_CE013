<?php

    if(isset($_COOKIE["password"])){
        echo "Your password is " . $_COOKIE["password"];
        setcookie("password", " ", time() - 9);
        echo "<br>Remember the password and try <a href='login.php'>Login</a> again.";
    }else{
        echo "Go here for <a href='notification.php'>Password recovery</a>";
    }

?>