<?php
    require_once "config.php";
    $username = $_POST["username"]; $password = $_POST["password"]; $user_type = "member"; $name = $_POST["name"]; $gender = $_POST["gender"]; $email = $_POST["email"]; $birth_date = $_POST["birth_date"];                                                   
    $sql = "INSERT INTO user (username, password, user_type, name, gender, email, birth_date) VALUES (?, ?, ?, ?, ?, ?, ?)";
    if($stmt = mysqli_prepare($link, $sql)){
        mysqli_stmt_bind_param($stmt, "sssssss", $param_username, $param_password, $param_user_type, $param_name, $param_gender, $param_email, $param_birth_date);
        $param_username = $username; $param_password = $password; $param_user_type = $user_type; $param_name = $name; $param_gender = $gender; $param_email = $email; $param_birth_date = $birth_date;
        if(mysqli_stmt_execute($stmt)){
            echo "You are registerd<br><br>";
            echo "Go here for <a href='login.html'>Login</a>";
        }else{
            echo "Not able to execute your quary";
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($link);

?>