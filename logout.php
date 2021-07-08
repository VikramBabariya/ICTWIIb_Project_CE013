<?php
    //session_start();
    echo "<body style='background-color: whitesmoke;'>";
   
        session_unset();
        session_destroy();
        header("location: ./login/login.html");
    ?>
