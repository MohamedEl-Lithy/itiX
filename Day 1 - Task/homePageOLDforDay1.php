<!DOCTYPE html>
<html>
<head>
    <title>Home Page</title>

</head>
<body>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $title = ($_POST['gender'] == 'Male') ? 'Mr.' : 'Miss';
            $fullName = $_POST['firstName'] . ' ' . $_POST['lastName'];
    ?>

    <h2>Thanks <?php echo $title; ?> <?php echo $fullName; ?></h2>

    <p>Please Review Your Information:</p>
    <strong>Full Name:</strong> <?php echo $fullName; ?><br>
    <strong>Address:</strong> <?php echo $_POST['address']; ?><br>
    <strong>Country:</strong> <?php echo $_POST['country']; ?><br>
    <strong>Gender:</strong> <?php echo $_POST['gender']; ?><br>
    <strong>Your Skills:</strong> <?php echo implode(', ', $_POST['skills']); ?><br>
    <strong>Username:</strong> <?php echo $_POST['username']; ?><br>
    <strong>Department:</strong> <?php echo $_POST['department']; ?><br>
  

    <?php
        }
    ?>
</body>
</html>
