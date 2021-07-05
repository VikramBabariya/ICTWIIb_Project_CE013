<!DOCTYPE html>
<html>
<head>
    <title>Book</title>
</head>

<body>

    <form action="see_book.php" method="GET">
            Title<input type="text" name="title">
            <input type="submit" name="book" value="Search"><br>
    </form>
</body>
</html>

<?php
require_once "./login/config.php";
echo "<html>
     <body style='background-color: whitesmoke;'>";

if(!isset($_GET['book']) && empty($_GET['title'])){
    $sql = "SELECT * FROM book";
    if($result = mysqli_query($link, $sql)){
        echo "<table border='1' style='border-collapse: none;'>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Author</th>
                <th>Edition</th>
                <th>Copies</th>
                <th>Price</th>
                <th>Pages</th>
                <th>Remove Book</th>
            </tr>
        ";
        while($row = mysqli_fetch_array($result)){
            echo "
                <tr>
                    <td>$row[book_id]</td>
                    <td>$row[title]</td>
                    <td>$row[author]</td>
                    <td>$row[edition]</td>
                    <td>$row[copy]</td>
                    <td>$row[price]</td>
                    <td>$row[pages]</td>
                    <td>
                        <form action='./admin/remove_book.php' method='GET'>
                            <input type='hidden' name='title' value=$row[title]>
                            <input type='submit' name='submit' value='Remove'>
                        </form>
                    </td>
                </tr><br>
            ";
        }
        echo "</table>";
        echo "<br><a href='./admin/admin.php'><button type='button'>Back</button></a>";
    }else{
        exit("Not able to execute your quary");
    }
    //exit();
}else{
    
        $title = trim($_GET['title']);

        $sql = "SELECT * FROM book WHERE title = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            mysqli_stmt_bind_param($stmt, "s", $param_title);
            $param_title = $title;

            if (mysqli_stmt_execute($stmt)) {
                $result = mysqli_stmt_get_result($stmt);

                if (mysqli_num_rows($result) == 1) {
                    $row = mysqli_fetch_array($result);
                    echo "<table border='1'>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Edition</th>
                        <th>Copies</th>
                        <th>Price</th>
                        <th>Pages</th>
                        <th>Remove Book</th>
                    </tr>
                    ";
                    echo "
                        <tr>
                            <td>$row[book_id]</td>
                            <td>$row[title]</td>
                            <td>$row[author]</td>
                            <td>$row[edition]</td>
                            <td>$row[copy]</td>
                            <td>$row[price]</td>
                            <td>$row[pages]</td>
                            <td><a href='./admin/remove_book.php'>Remove</a></td>
                        </tr><br>
                    ";
                    echo "</table>";
                    echo "<br><a href='see_book.php'>Back</a>";
                } else {
                    echo "Book isn't exist<br>";
                    exit("<a href='admin.php'>Provide correct ID</a>");

                }
            } else {
                die("Can not able to execute statment.");
            }
        }
        mysqli_stmt_close($stmt);
        mysqli_close($link);
}
?>




