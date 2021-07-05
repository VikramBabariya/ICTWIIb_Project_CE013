<?php
if($_COOKIE["user_type"] != "member"){
    exit("Please <a href='../login/login.html'>Login</a> as member");
}
    require_once "config.php";

    $username = $_COOKIE["username"];
    $copy = $_GET["copy"];    
    $title = $_GET["title"];  

    $sql1 = "SELECT * FROM book WHERE title=?";
    $stmt1 = mysqli_prepare($link, $sql1);
    mysqli_stmt_bind_param($stmt1, "s", $param_title1);
    $param_title1 = $title;
    mysqli_stmt_execute($stmt1);
    $result1 = mysqli_stmt_get_result($stmt1);
    $row1 = mysqli_fetch_array($result1);
    $copy_in_book = $row1["copy"];
    $total_copy = $copy + $copy_in_book;

    $sql2 = "UPDATE book SET copy=? WHERE title=?";
    $stmt2 = mysqli_prepare($link, $sql2);
    mysqli_stmt_bind_param($stmt2, "is", $param_copy, $param_title2);
    $param_copy = $total_copy;
    $param_title2 = $title;
    mysqli_stmt_execute($stmt2);

    $sql3 = "DELETE FROM book_record WHERE username=? AND title=?";
    $stmt3 = mysqli_prepare($link, $sql3);
    mysqli_stmt_bind_param($stmt3, "ss", $param_username, $param_title3);
    $param_username = $username;
    $param_title3 = $title;
    if(mysqli_stmt_execute($stmt3)){
        echo "Book returned successfully";
    }else{
        exit("please try again later");
    }

    mysqli_stmt_close($stmt1);
    mysqli_stmt_close($stmt2);
    mysqli_stmt_close($stmt3);
    mysqli_close($link);
?>