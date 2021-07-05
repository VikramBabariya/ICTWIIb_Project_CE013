<!DOCTYPE html>
<html>
    <body style="background-color: whitesmoke;">
    <?php
        setcookie('username', ' ', time() - 9);
        setcookie('password', ' ', time() - 9);
        setcookie('user_type', ' ', time() - 9);
        header("location: ./login/login.html");
    ?>
    </body>
</html>