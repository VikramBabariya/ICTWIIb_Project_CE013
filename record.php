<?php
//securuty

echo "<html>
<body style='background-color: whitesmoke;'>       
";
    require_once "config.php";

    $sql = "SELECT * FROM issue_record";

    if($result = mysqli_query($link, $sql)){
        if(mysqli_num_rows($result) > 0){
            echo "<h3>Issue record</h3>";
            echo "<table border='1'>
                    <tr>
                        <th>#</th>
                        <th>Student_id</th>
                        <th>Book_id</th>
                        <th>Issue date</th>
                    </tr>
            ";
            while($row = mysqli_fetch_array($result)){
                echo"
                    <tr>
                        <td>$row[id]</td>
                        <td>$row[student_id]</td>
                        <td>$row[book_id]</td>
                        <td>$row[issue_date]</td>
                    </tr>
                ";
                }

            echo "</table>";
            //echo "<br><a href='admin.php'><button type='button'>Back</button></a>";
        }else{
            echo "Table is empty";
        }
    }else{
        echo "Something went wrong";
    }

    $sql = "SELECT * FROM return_record";

    if($result = mysqli_query($link, $sql)){
        if(mysqli_num_rows($result) > 0){
            echo "<h3>Return record</h3>";
            echo "<table border='1'>
                    <tr>
                        <th>#</th>
                        <th>Student_id</th>
                        <th>Book_id</th>
                        <th>Return date</th>
                    </tr>
            ";
            while($row = mysqli_fetch_array($result)){
                echo"
                    <tr>
                        <td>$row[id]</td>
                        <td>$row[student_id]</td>
                        <td>$row[book_id]</td>
                        <td>$row[return_date]</td>
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
    mysqli_close($link);
?>