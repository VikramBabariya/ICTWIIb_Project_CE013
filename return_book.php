<?php
echo "<html>
<body style='background-color: whitesmoke;'>";

require_once "config.php";
//security
    if(isset($_GET["student_id"]) && isset($_GET["book_id"])){
        //(1. fetch info about book (2. record (3. update
         $student_id = $_GET['student_id'];
         $book_id = $_GET['book_id'];
        date_default_timezone_set("Indian/Kerguelen");
        $time = date("Y-m-d H:i:s");
        
        $sql1 = "INSERT INTO return_record (student_id, book_id, return_date) VALUES (?, ?, ?)";
        if($stmt1 = mysqli_prepare($link, $sql1)){
            mysqli_stmt_bind_param($stmt1, "iis", $param_student_id, $param_book_id, $param_return_date);
            $param_student_id = $student_id;
            $param_book_id = $book_id;
            $param_return_date = $time;

            if(mysqli_stmt_execute($stmt1)){

            }else{
                echo "Not able to execute your quary.";
            }
            mysqli_stmt_close($stmt1);
        }else{
            exit("query not prepared");
        }
        
        $sql3 = "DELETE FROM issue_record WHERE student_id=? AND book_id=?";
        $stmt3 = mysqli_prepare($link, $sql3);
        mysqli_stmt_bind_param($stmt3, "ii", $param_student_id, $param_book_id);
        $param_student_id = $student_id;
        $param_book_id = $book_id;
        if(mysqli_stmt_execute($stmt3)){
            echo "Book returned successfully<br><br>";
            echo "<a href='user.php'><button type='button'>Back</button></a>";
            exit();
        }else{
            exit("please try again later");
        }

        mysqli_close($link);
        exit();   
    }
?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>Return book</title>
    </head>
    <body>
    <h3>Return book</h3>
        <form action="return_book.php" method="GET">
            Your id<input type="number" name="student_id"><br><br>
            Book id<input type="number" name=book_id><br><br><br>    <!--user has to return all copies-->
            <input type="submit" name="submit" value="Return">
            
        </form>
    </body>
</html>