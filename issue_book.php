<?php 

//security
    echo "<html>
    <body style='background-color: whitesmoke;'>";

    if(isset($_GET["student_id"]) && isset($_GET["book_id"])){
        require_once "config.php";
        //(1. fetch info about book (2. record (3. update
         $student_id = $_GET['student_id'];
         $book_id = $_GET['book_id'];
        date_default_timezone_set("Indian/Kerguelen");
        $time = date("Y-m-d H:i:s");

        // $sql1 = "SELECT * FROM book WHERE title = ?"; 

        // if ($stmt1 = mysqli_prepare($link, $sql1)) {
        //     mysqli_stmt_bind_param($stmt1, "s", $param_title);
        //     $param_title = $title;

        //     if (mysqli_stmt_execute($stmt1)) {
        //         $result1 = mysqli_stmt_get_result($stmt1);

        //         if (mysqli_num_rows($result1) == 1) {
        //             $row1 = mysqli_fetch_array($result1);
        //         } else {
        //             exit("Provide correct title.<br><a href='user.php'>User</a>");
        //         }
        //     } else {
        //         die("Can not able to execute statment.");
        //     }
        // }

        $sql2 = "INSERT INTO issue_record (student_id, book_id, issue_date) VALUES (?, ?, ?)";
        if($stmt2 = mysqli_prepare($link, $sql2)){
            mysqli_stmt_bind_param($stmt2, "iis", $param_student_id, $param_book_id, $param_issue_date);
            $param_student_id = $student_id;
            $param_book_id = $book_id;
            $param_issue_date = $time;

            if(mysqli_stmt_execute($stmt2)){
                echo "Book issued to you succesfully.<br><br>";
                echo "<a href='user.php'><button type='button'>Back</button></a>";

            }else{
                echo "Not able to execute your quary.";
            }
            mysqli_stmt_close($stmt2);
        }else{
            exit("query not prepared");
        }
        mysqli_close($link);
        exit();
    }
?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>Issue book</title>
    </head>
    <body>
        <h3>Issue Book</h3>
        <form action="issue_book.php" method="GET">
            Your id<input type="number" name="student_id"><br><br>
            Book id<input type="number" name=book_id><br><br><br>
            <input type="submit" name="submit" value="Issue"><br><br>
            <a href="user.php"><button type="button">Back</button></a>
        </form>
    </body>
</html>
