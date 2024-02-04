<!DOCTYPE html>
<html>
<head>
    <title>Home Page</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1.5px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
    </style>
</head>
<body>
<?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $title = ($_POST['gender'] == 'Male') ? 'Mr.' : 'Miss';
            $fullName = $_POST['firstName'] . ' ' . $_POST['lastName'];

                // Save new registration information to a file
                $newInfo = "<tr>
                                <td>$fullName</td>
                                <td>{$_POST['address']}</td>
                                <td>{$_POST['country']}</td>
                                <td>{$_POST['gender']}</td>
                                <td>" . implode(', ', $_POST['skills']) . "</td>
                                <td>{$_POST['username']}</td>
                                <td>{$_POST['department']}</td>
                            </tr>";

                file_put_contents('registration_info.html', $newInfo, FILE_APPEND | LOCK_EX);

                // Display a success message
                echo '<p style="color: green;">Registration successful!</p>';
            }

        // Display the table with old and new information
        echo '<h2>Registration Information:</h2>';
        echo '<table>';
        echo '<tr>
                <th>Full Name</th>
                <th>Address</th>
                <th>Country</th>
                <th>Gender</th>
                <th>Skills</th>
                <th>Username</th>
                <th>Department</th>
            </tr>';

        if (file_exists('registration_info.html')) {
            $registrationInfo = file_get_contents('registration_info.html');
            echo $registrationInfo;
        }

        echo '</table>';
    ?>
</body>
</html>
