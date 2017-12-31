<?php require 'validation.php'; ?>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "miniproject";

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

    $gender = mysqli_real_escape_string($conn, $_POST['gender']);

    $sql = "INSERT INTO user (email, name, password, gender) VALUES ('$email', '$name', '$pass2', '$gender' )";


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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create user account</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="styles.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
	<body>
    	<header>
			<h2><a href="main.php">Note Savvy</a></h2>
			<nav>
				<li><a href="main.php">Home</a></li>
				<li><a href="login.php">Sign In</a></li>
				<li><a href="register.php">Create Account</a></li>
				<li><a href="#">Contacts</a></li>
			</nav>
		</header>
        
        <section class="hero">
			<div class="background-image" style="background-image: url(images/note3.jpg);"></div>
			<h2>Create an account</h2>
			<div class="loginform">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                    Name:<span class="error">* <?php echo $nameErr;?></span>
                    <br>
                    <input class="form-control" type="text" name="username" placeholder="John Doe" value="">
                    <br>
                    <br> Email:<span class="error">* <?php echo $emailErr;?></span>
                    <br>
                    <input class="form-control" type="text" name="email" placeholder="john@gmail.com" value="">
                    <br>
                    <br> Password:<span class="error">* <?php echo $pass1Err;?></span>
                    <br>
                    <input class="form-control" type="password" name="password1" value="">
                    <br>
                    <br>Confirm Password:<span class="error">* <?php echo $pass2Err;?></span>
                    <br>
                    <input class="form-control" type="password" name="password2" value="">

                    <br><br> Gender:<span class="error">* <?php echo $genderErr;?></span>
                    <br>
                     <select class="btn" name="gender">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select> 
                    <br>
                    <br>
                    <input class="btn" type="submit" name="submit" value="Submit">
                    <input class="btn" type="reset" value="Reset Form">
                </form>
            </div>
		</section>
        
        <footer>
			<ul>
				<li><a href="#"><i class="fa fa-twitter-square"></i></a></li>
				<li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
				<li><a href="#"><i class="fa fa-snapchat-square"></i></a></li>
				<li><a href="#"><i class="fa fa-pinterest-square"></i></a></li>
				<li><a href="#"><i class="fa fa-github-square"></i></a></li>
			</ul>
   		</footer>
        
        </body>

</html>