<!DOCTYPE html>
<html>
    <body style="background-color: lightgray;">
<form action="new_user.php" method="POST" enctype='multipart/form-data'>
    <table border='1'>

        <tr>
            <td colspan="2">*Required Field</td>
        </tr>
        <tr>
            <td>*Full Name: </td>
            <td><input type="text" name="name" /> </td>
        </tr>
        <tr>
            <td>*User Name: </td>
            <td><input type="text" name="username" /> </td>
        </tr>
        <tr>
            <td>*New Password: </td>
            <td><input type="password" name="password" /> </td>
        </tr>
        <tr>
            <td>*Reenter New Password: </td>
            <td><input type="password" name="confirm_password" /> </td>
        </tr>
        <tr>
            <td colspan="2">
                * Male<input type="radio" name="gender" value="male" />
                Female<input type="radio" name="gender" value="female" />
            </td>
        </tr>
        <tr>
            <td>*Email: </td>
            <td><input type="text" name="email"> </td>
        </tr>
        <tr>
            <td>*BirthDate:</td>
            <td><input type="date" name="birth_date"></td>
        </tr>
        <tr>

            <td>
                <center><input type="submit" /></center>
            </td>
            <td>
                <center><input type="reset" /></center>
            </td>
        </tr>



    </table>
</form>

    </body>
</html>