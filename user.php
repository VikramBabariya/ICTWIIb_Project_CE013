<?php

if($_COOKIE["user_type"] != "member"){
    exit("Please <a href='../login/login.html'>Login</a> as member");
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Page</title>
</head>
<body style="background-color: whitesmoke;">
    <b>User section</b></p>

    <h1>See Books</h1>
    <form action="../see_book.php" method="GET">
        <b>Search Book</b>: Title<input type="text" name="title">
        <input type="submit" name="book" value="Go"><br>
        <input type="submit" name="all_book" value="Show All Books">
    </form>

    <h1>Issue Book</h1>
    <form action="http://localhost/librery%20System/user/issue_book.php" method="GET">
        Title<input type="text" name="title">
        How many copy<input type="number" name=copy>
        <input type="submit" name="submit" value="Issue"><br>
    </form>

    <h1>Return Book</h1>
    <form action="http://localhost/librery%20System/user/return_book.php" method="GET">
        Title<input type="text" name="title">
        How many copy<input type="number" name=copy>    <!--user has to return all copies-->
        <input type="submit" name="submit" value="Return"><br>
    </form>

    <form action="../login/logout.php" method="GET">
        <input type="submit" name="submit" value="Logout">
    </form>

</body>

</html>