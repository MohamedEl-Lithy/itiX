<!DOCTYPE html>
<html>
<head>
    <title>Registration Page</title>
    <link rel="stylesheet" type="text/css" href="Registerationstyles.css">
</head>
<body>
    <form action="MySQLi.php" method="post">
        <label for="firstName">First Name:</label>
        <input type="text" name="firstName" required><br>

        <label for="lastName">Last Name:</label>
        <input type="text" name="lastName" required><br>

        <label for="address">Address:</label>
        <textarea name="address" rows="4" cols="50" required></textarea><br>

        <label for="country">Country:</label>
        <select name="country" required>
            <option value="Egypt">Egypt</option>
            <option value="Qatar">Qatar</option>
            <option value="Italy">Italy</option>
            <option value="Japan">Japan</option>
        </select><br>

        <label>Gender:</label>
        <input type="radio" name="gender" value="Male" required> Male
        <input type="radio" name="gender" value="Female" required> Female<br>

        <label>Skills:</label>
        <input type="checkbox" name="skills[]" value="PHP"> PHP
        <input type="checkbox" name="skills[]" value="J2SE"> J2SE
        <input type="checkbox" name="skills[]" value="MySQL"> MySQL
        <input type="checkbox" name="skills[]" value="PostgreeSQL"> PostgreeSQL<br>

        <label for="username">Username:</label>
        <input type="text" name="username" required><br>

        <label for="password">Password:</label>
        <input type="password" name="password" required><br>

        <label for="department">Department:</label>
        <input type="text" name="department" value="OpenSource" readonly><br>

        <label for="verificationCode">Verification Code:</label>
        <span id="verificationCodeLabel">
            <?php
                $verificationCode = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789"), 0, 6);
                echo $verificationCode;
            ?>
        </span><br>

        <label for="enteredVerificationCode">Enter Verification Code:</label>
        <input type="text" name="enteredVerificationCode" required><br>


        <input type="submit" name="action" value="Submit">
        <input type="reset" value="Reset">
      
        <a href="MySQLi.php?action=view">View</a>


        <input type="hidden" name="oldInfoFileName" value="old_info.txt">


    </form>
    
</body>
</html>
