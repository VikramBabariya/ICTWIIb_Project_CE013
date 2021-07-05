<?php
    if($_COOKIE["user_type"] != "admin"){
        exit("Please <a href='../login/login.html'>Login</a> as admin");
    }
    echo "<html>
    <body style='background-color: whitesmoke;'>";

    require_once "config.php";      //adding file
    if(isset($_GET["title"]) && isset($_GET["author"]) && isset($_GET["edition"]) && isset($_GET["copy"]) && isset($_GET["price"]) && isset($_GET["pages"])){
        if(!empty($_GET["title"]) && !empty($_GET["author"]) && !empty($_GET["edition"]) && !empty($_GET["copy"]) && !empty($_GET["price"]) && !empty($_GET["pages"])){
            
            $title = $_GET["title"];    $author = $_GET["author"];  $edition = $_GET["edition"];    $copy = $_GET["copy"];  $price = $_GET["price"];    $pages = $_GET["pages"];

            $sql = "INSERT INTO book (title, author, edition, copy, price, pages) VALUES (?, ?, ?, ?, ?, ?)";   //quary

            if ($stmt = mysqli_prepare($link, $sql)) {       //prepare statment for quary

                mysqli_stmt_bind_param($stmt, "ssiiii", $param_title, $param_author, $param_edition, $param_copy, $param_price, $param_pages);     //binding values of param with statment
                $param_title = $title;  $param_author = $author;    $param_edition = $edition;  $param_copy = $copy;    $param_price = $price;  $param_pages = $pages;

                if (mysqli_stmt_execute($stmt)) {         //executing statment
                    echo "Book is added<br>";
                    echo "<a href='add_book.php'>Admin Page</a>";
                    exit();
                } else {
                    echo "Not able to execute quary";
                }   
            }
            mysqli_stmt_close($stmt);
            mysqli_close($link);
        }else{
            exit("Provide all info");
        }
    }
?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>Add Book</title>
    </head>
    <body>
        <h3>Add Book</h3>
        <p>(**all information are mandatory)</p>
        <form action="add_book.php" method="GET">
            Title   <input type="text" name="title"><br>
            Author  <input type="text" name="author"><br>
            Edition <input type="number" name="edition"><br>
            Copy    <input type="number" name="copy"><br>
            Price   <input type="number" name="price"><br>
            Pages   <input type="number" name="pages"><br><br>
            <input type="submit" value="Add">
        </form>
        <a href="admin.php"><button type="button">Back</button></a>
    </body>
</html>
