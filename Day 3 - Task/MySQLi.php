<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Page</title>
    <link rel="stylesheet" href="MySQListyles.css">

    <style>
       
        form {
            display: grid;
            gap: 2px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        input[type="password"],
        select,
        textarea {
            width: 50%;
            padding: 8px;
            box-sizing: border-box;
            margin-bottom: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        select {
            appearance: none;
        }

        input[type="radio"],
        input[type="checkbox"] {
            margin-right: 5px;
        }

        input[type="submit"],
        input[type="reset"] {
            background-color: #4caf50;
            color: #fff;
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover,
        input[type="reset"]:hover {
            background-color: #45a049;
        }
    </style>

</head>
<body>
    <?php 

    $connection_MySQLi = new mysqli("localhost", "root","iti24R", "PHP_student_database");
    // path for database, username, password, database name

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["action"])) {
            $action = $_POST["action"];
            if($connection_MySQLi -> connect_error){
                die("Connection Fail :(");
            }
            else{

                switch ($action) {
                        case "Submit":
                            // Process create action 
                            //for create new record CRUD
                            // Process create action       
                            echo "Done ^__^ \n\n";
                    
                            $firstName=$_POST['firstName'];
                            $lastName=$_POST['lastName'];
                            $address=$_POST['address'];
                            $country=$_POST['country'];
                            $gender=$_POST['gender'];
                            // $skills=$_POST['skills[]']; //the problem how to insert multiple values into skills table
                            $username=$_POST['username'];
                            $password=$_POST['password'];
                            // $department=$_POST['department']; //the problem how to insert department id the reflect to department name
                    
                            // Performs a query on the database
                            //I use curly brackets to escape the single quote and print it when the variable replace with the real value 
                            $data = $connection_MySQLi -> query("
                            INSERT INTO student
                            SET 
                            first_name = '{$firstName}', 
                            last_name = '{$lastName}',
                            address = '{$address}',
                            country = '{$country}',
                            gender = '{$gender}',
                            username = '{$username}',
                            password = '{$password}',
                            department_id = 2;");
                   
                            // Performs a query on the database
                            // $data = $connection_MySQLi -> query("
                            // INSERT INTO student
                            // SET 
                            // first_name = 'Barbie',
                            // last_name = 'Kan',
                            // address = '659 Main St',
                            // country = 'USA',
                            // gender = 'Female',
                            // username = 'barb.doe',
                            // password = 'password18989999923',
                            // department_id = 1;");
                    
                            // Performs a query on the database
                            // $data = $connection_MySQLi -> query("
                            // INSERT INTO student (first_name, last_name, address, country, gender, username, password, department_id)
                            // VALUES ('John', 'Doe', '123 Main St', 'USA', 'Male', 'john.doe', 'password123', 2);");
                    
                            // Gets the number of affected rows in a previous MySQL operation
                            printf("Affected rows (INSERT): %d\n", $connection_MySQLi->affected_rows);
                            
                            break;

                            case "Update":
                                // Process update action
                                // echo "test";

                                $firstName=$_POST['firstName'];
                                $lastName=$_POST['lastName'];
                                $address=$_POST['address'];
                                $country=$_POST['country'];
                                $gender=$_POST['gender'];
                                // $skills=$_POST['skills[]']; //the problem how to insert multiple values into skills table
                                $username=$_POST['username'];
                                $password=$_POST['password'];
                                // $department=$_POST['department']; //the problem how to insert department id the reflect to department name
                                
                                // I get the id from the form in the edit action I pass it by hidden type 
                                //in html form the attribute name="id"
                                $student_id = $_POST['id']; 
                        
                        
                                // Performs a query on the database
                                //I use curly brackets to escape the single quote and print it when the variable replace with the real value 
                                $data = $connection_MySQLi -> query("
                                UPDATE student
                                SET 
                                first_name = '{$firstName}', 
                                last_name = '{$lastName}',
                                address = '{$address}',
                                country = '{$country}',
                                gender = '{$gender}',
                                username = '{$username}',
                                password = '{$password}',
                                department_id = 2
                                WHERE student_id = $student_id");
                   
                                header("Location:MySQLi.php?action=view");
                                break;
        
                    default:
                    // Handle unknown action
                    break;
        
                    
                }

            }  
                 
        }       
    }


    // *****************************************************
    // CRUD - Buttons - GET Method

    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        if (isset($_GET["action"])) {
            $action = $_GET["action"];

            switch ($action) {
    //1st CASE View Database ••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••        
                case "view":
                    // Execute view logic
                    // echo "View logic here.";

                    echo '<h2>Database View:</h2>';
                    echo '<div class="container">';
                    echo '<table class="styled-table">';
                    echo '<tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Address</th>
                    <th>Country</th>
                    <th>Gender</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Department</th>
                    <th>Actions</th>
                    </tr>';


                    $viewData = $connection_MySQLi -> query("SELECT * FROM student");
                    // var_dump($viewData);

                    //Fetch all result rows as an associative array, a numeric array, or both
                    $result = $viewData -> fetch_all(MYSQLI_ASSOC);

                    
                    foreach($result as $student_data){
                        echo "<tr>";
                            foreach($student_data as $value){
                                echo "<td> $value </td>";
                            }
                        
                        echo "<td>
                        <a href=\"MySQLi.php?id={$student_data['student_id']}&action=viewRecord\" class=\"action-button view-button\">View</a>

                        <a href=\"MySQLi.php?id={$student_data['student_id']}&action=edit\" class=\"action-button update-button\">Edit</a>

                        <a href=\"MySQLi.php?id={$student_data['student_id']}&action=delete\" class=\"action-button delete-button\">Delete</a>
                        </td>";
                
                        echo "</tr>";
                    }
                    echo '</table>';

                    echo '<br><hr><br><a href=Registeration.php class=action-button view-button>Add new Record</a>';
                    

                    echo '</div>';
                    break;
    //2nd CASE View Record ••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••
                case "viewRecord":
                    // Execute viewRecord logic
                    // get id param from url    
                    $id = $_GET['id']; 
                    // query select statement
                    $viewRecordData = $connection_MySQLi -> query("SELECT * FROM student WHERE student_id = $id");
                    //fetch data from Database
                    $studentDataRecord = $viewRecordData -> fetch_assoc();
                    //print the student data
                    echo "<ul>";
                    foreach($studentDataRecord as $value){
                        // I need to write code here to put the columns name before the value of the student !
                        echo "<li>$value</li>";
                    }
                    echo "</ul>";


                    break;

    //3rd CASE Edit Record ••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••
                case "edit":
                    // Execute edit logic
                    $id = $_GET['id']; 
                    // query select statement
                    $updateRecordData = $connection_MySQLi -> query("SELECT * FROM student WHERE student_id = $id");
                    //fetch data from Database
                    $studentDataRecord = $updateRecordData -> fetch_assoc();
    ?> 
    <!-- I close the above PHP tag so I can write the form in HTML under it and I open it again -->
        <form style="margin: 40px;" action="MySQLi.php" method="post">
            
            <input type="hidden" value="<?= $studentDataRecord['student_id']?>" name ="id">
                    
            <label for="firstName">First Name:</label>
            <input type="text" name="firstName" value="<?= $studentDataRecord['first_name']?>" required><br>

            <label for="lastName">Last Name:</label>
            <input type="text" name="lastName" value="<?= $studentDataRecord['last_name']?>" required><br>

            <label for="address">Address:</label>
            <input type="text" name="address" value="<?= $studentDataRecord['address']?>" required><br>
            <!-- <textarea name="address" rows="4" cols="50" required></textarea><br> -->

            <label for="country">Country:</label>
            <input type="text" name="country" value="<?= $studentDataRecord['country']?>" required><br>
            <!-- <select name="country" required>
                <option value="Egypt">Egypt</option>
                <option value="Qatar">Qatar</option>
                <option value="Italy">Italy</option>
                <option value="Japan">Japan</option>
            </select><br> -->

            <label>Gender:</label>
            <input type="text" name="gender" value="<?= $studentDataRecord['gender']?>" required><br>
            <!-- <input type="radio" name="gender" value="Male" required> Male
            <input type="radio" name="gender" value="Female" required> Female<br> -->

            <!-- <label>Skills:</label>
            <input type="checkbox" name="skills[]" value="PHP"> PHP
            <input type="checkbox" name="skills[]" value="J2SE"> J2SE
            <input type="checkbox" name="skills[]" value="MySQL"> MySQL
            <input type="checkbox" name="skills[]" value="PostgreeSQL"> PostgreeSQL<br> -->

            <label for="username">Username:</label>
            <input type="text" name="username" value="<?= $studentDataRecord['username']?>" required><br>

            <label for="password">Password:</label>
            <input type="text" name="password" value="<?= $studentDataRecord['password']?>" required><br>

            <label for="department">Department:</label>
            <input type="text" name="department" value="<?= $studentDataRecord['department_id']?>" readonly><br>
            <br>
            <input type="submit" name="action" value="Update">
            <input type="reset" value="Reset">
        </form>
    <?php
                    break;
    //4th CASE Delete Record ••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••
                case "delete":
                    // Execute delete logic
                    
                    // get id param from url    
                    $id = $_GET['id']; 
                    // query delete statement
                    $connection_MySQLi -> query("DELETE FROM student WHERE student_id = $id");

                    header("Location:MySQLi.php?action=view");
                    break;




                default:
                    // Handle unknown action
                    echo "Unknown action.";
                    break;
            }
        } else {
            // No action specified in the URL
            // Handle accordingly
            echo "No action specified.";
        }
        //echo "You enter from URL :( !!!";
    }
        
    ?>


</body>
</html>