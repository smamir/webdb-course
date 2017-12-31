<?php require 'validation.php'; ?>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

session_start();
if(isset($_SESSION['email'])) {
      header("location:dashboard.php");
   }

if(isset($_POST["submit"]) && !$is_error) {
    
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    $name = mysqli_real_escape_string($conn, $_POST['username']);

    $pass1 = mysqli_real_escape_string($conn, $_POST['password1']);

    $pass2 = mysqli_real_escape_string($conn, $_POST['password2']);

    $usertype = "user";

    $sql = "INSERT INTO user (name, email, password, usertype) VALUES ('$name', '$email', '$pass2', '$usertype')";


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
                <h2>Create an account</h2>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                    Name:<span class="error">* <?php echo $nameErr;?></span>
                    <br>
                    <input type="text" name="username" value="">
                    <br>
                    <br> Email:<span class="error">* <?php echo $emailErr;?></span>
                    <br>
                    <input type="text" name="email" placeholder="john@gmail.com" value="">
                    <br>
                    <br> Password:<span class="error">* <?php echo $pass1Err;?></span>
                    <br>
                    <input type="password" name="password1" value="">
                    <br>
                    <br>Confirm Password:<span class="error">* <?php echo $pass2Err;?></span>
                    <br>
                    <input type="password" name="password2" value="">
                    <br>
                    <br>
                    <input type="submit" name="submit" value="Submit">
                    <input type="reset" value="Reset Form">
                </form>
            </div>
        </body>

</html>