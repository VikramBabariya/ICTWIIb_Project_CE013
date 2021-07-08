<?php
//security

echo "<html>
     <body style='background-color: whitesmoke;'>";

if(isset($_GET["title"])){
    require_once "config.php";

    $title = trim($_GET['title']);    //validation and setting values

    $sql = "DELETE FROM book WHERE title=?";

    if ($stmt = mysqli_prepare($link, $sql)) {
        mysqli_stmt_bind_param($stmt, "s", $param_title);
        $param_title = $title;

        if (mysqli_stmt_execute($stmt)) {
            echo "Book removed succesfully.<br>";
            echo "<a href='admin.php'>Admin Page</a>";
        } else {
            die("Can not able to execute your quary");
        }
    }

    mysqli_stmt_close($stmt);
    mysqli_close($link);
}
?>
