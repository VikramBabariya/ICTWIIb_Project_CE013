<?php 

if($_COOKIE["user_type"] != "member"){
    exit("Please <a href='../login/login.html'>Login</a> as member");
}

    require_once "config.php";
    //(1. fetch info about book (2. record (3. update
    $username = $_COOKIE["username"];
    $title = $_REQUEST['title'];
    $copy = $_REQUEST['copy'];
    date_default_timezone_set("Indian/Kerguelen");
    $time = date("Y-m-d H:i:s");

    $sql1 = "SELECT * FROM book WHERE title = ?"; 

    if ($stmt1 = mysqli_prepare($link, $sql1)) {
        mysqli_stmt_bind_param($stmt1, "s", $param_title);
        $param_title = $title;

        if (mysqli_stmt_execute($stmt1)) {
            $result1 = mysqli_stmt_get_result($stmt1);

            if (mysqli_num_rows($result1) == 1) {
                $row1 = mysqli_fetch_array($result1);
            } else {
                exit("Provide correct title.<br><a href='user.php'>User</a>");
            }
        } else {
            die("Can not able to execute statment.");
        }
    }

    $sql2 = "INSERT INTO book_record (username, title, issue_date, copy) VALUES (?, ?, ?, ?)";
    if($stmt2 = mysqli_prepare($link, $sql2)){
        mysqli_stmt_bind_param($stmt2, "sssi", $param_username, $param_title, $param_issue_date, $param_copy);
        $param_username = $username;
        $param_title = $title;
        $param_issue_date = $time;
        $param_copy = $copy;

        if(mysqli_stmt_execute($stmt2)){
            echo "Book issued to you succesfully.<br>";
            echo "<a href='user.php'>User</a>";

        }else{
            echo "Not able to execute your quary.";
        }
    }

    $copy_avilable = $row1["copy"] - $copy; // mixed -> int
    $sql3 = "UPDATE book SET copy=? WHERE title=?";
    if($stmt3 = mysqli_prepare($link, $sql3)){
        mysqli_stmt_bind_param($stmt3, "is", $param_copy_avilable, $param_title);
        $param_title = $title;
        $param_copy_avilable = $copy_avilable;

        if(mysqli_stmt_execute($stmt3)){
            echo "<a href='user.php'>User</a>";
        }else{
            echo "Not able to execute your quary.";
        }
    }
    

    mysqli_stmt_close($stmt2);
    mysqli_close($link);

?>