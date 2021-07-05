<?php
if($_COOKIE["user_type"] != "admin"){
    exit("Please <a href='../login/login.html'>Login</a> as admin");
}

echo "<html>
<body style='background-color: whitesmoke;'>       
";
    require_once "config.php";

    $sql = "SELECT * FROM book_record";

    if($result = mysqli_query($link, $sql)){
        if(mysqli_num_rows($result) > 0){
            echo "<table border='1'>
                    <tr>
                        <th>#</th>
                        <th>Username</th>
                        <th>Title</th>
                        <th>Issue date</th>
                    </tr>
            ";
            while($row = mysqli_fetch_array($result)){
                echo"
                    <tr>
                        <td>$row[id]</td>
                        <td>$row[username]</td>
                        <td>$row[title]</td>
                        <td>$row[issue_date]</td>
                    </tr>
                ";
                }

            echo "</table>";
            echo "<br><a href='admin.php'><button type='button'>Back</button></a>";
        }else{
            echo "Table is empty";
        }
    }else{
        echo "Something went wrong";
    }
?>