<?php
    require_once "config.php";
    $username = $_POST["username"]; $password = $_POST["password"]; $name = $_POST["name"]; $gender = $_POST["gender"]; $email = $_POST["email"]; $birth_date = $_POST["birth_date"];                                                   
    $sql = "INSERT INTO user (username, password, name, gender, email, birth_date) VALUES (?, ?, ?, ?, ?, ?)";
    if($stmt = mysqli_prepare($link, $sql)){
        mysqli_stmt_bind_param($stmt, "ssssss", $param_username, $param_password, $param_name, $param_gender, $param_email, $param_birth_date);
        $param_username = $username; $param_password = $password; $param_name = $name; $param_gender = $gender; $param_email = $email; $param_birth_date = $birth_date;
        if(mysqli_stmt_execute($stmt)){
            echo "You are registerd";
        }else{
            echo "Not able to execute your quary";
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($link);

?>