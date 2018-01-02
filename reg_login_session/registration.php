<?php require 'validation.php'; ?>


<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lab7-update";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if(isset($_POST["submit"]) && !$is_error) {
    
$email = mysqli_real_escape_string($conn, $_POST['email']);
    
$name = mysqli_real_escape_string($conn, $_POST['username']);

$pass = mysqli_real_escape_string($conn, $_POST['password']);

$gender = mysqli_real_escape_string($conn, $_POST['gender']);

$sql = "INSERT INTO user (email, username, password, gender) VALUES ('$email', '$name', '$pass', '$gender' )";


if (mysqli_query($conn, $sql)) {
    echo '<script language="javascript">';
    echo 'alert("Record added to database!")';
    echo '</script>';
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}

mysqli_close($conn);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>User Registration</title>

    <link rel="stylesheet" type="text/css" href="style.css">
</head>

        <body>

            <div class="newform">
                <h2>User Registration Form</h2>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                    Name:<span class="error">* <?php echo $nameErr;?></span>
                    <br>
                    <input type="text" name="username" placeholder="John Doe" value="" autofocus>

                    <br>
                    <br> Email:<span class="error">* <?php echo $emailErr;?></span>
                    <br>
                    <input type="email" name="email" placeholder="john@gmail.com" value="">

                    <br>
                    <br> Password:<span class="error">* <?php echo $passErr;?></span>
                    <br>
                    <input type="password" name="password" value="">
                    <br>
                    <br> Gender:<span class="error">* <?php echo $genderErr;?></span>
                    <br>
                    <input type="radio" name="gender" value="male"> Male
                    <br>
                    <input type="radio" name="gender" value="female"> Female

                    <br>
                    <br>
                    <input type="submit" name="submit" value="Register">
                    <input type="reset" value="Reset Form">
                </form>
            </div>
        </body>

</html>