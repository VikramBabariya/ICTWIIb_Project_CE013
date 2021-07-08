<?php
    session_start();
    require_once "./admin/config.php";

    if(isset($_POST["username"]) && isset($_POST["password"])){
        $username = $_POST["username"];
        $password = $_POST["password"];

        $sql = "SELECT * FROM user WHERE password = ? AND username = ?"; 
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "ss", $param_password, $param_username);
            $param_username = $username;
            $param_password = $password;
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
                if(mysqli_num_rows($result) == 1){ 
                    $_SESSION["username"] = $username;
                    $_SESSION["password"] = $password;
                    $row = mysqli_fetch_array($result);
                    $user_type =  $row['user_type'];
                    $_SESSION["user_type"] = $user_type;
                    if($user_type == "admin"){
                        header("location: ./admin/admin.php");
                    }
                    else if($user_type == "member"){
                        header("location: ./user/user.php");
                    }

                }else{
                    echo "Provide correct password and username.";
                }
            }else{
                echo "Not able to execute your quary";
            }
        }
        mysqli_stmt_close($stmt);
        mysqli_close($link);
    }
?>
