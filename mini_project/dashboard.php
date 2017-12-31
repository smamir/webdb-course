<?php
    require 'session.php';
	require 'note_valid.php';

    if(isset($_POST["submit"]) && !$is_error) {
    
    $email = $login_email;

    $title = mysqli_real_escape_string($conn, $_POST['title']);
    
    $description = mysqli_real_escape_string($conn, $_POST['description']);

    $day = mysqli_real_escape_string($conn, $_POST['day']);

    $month = mysqli_real_escape_string($conn, $_POST['month']);
    
    $year = mysqli_real_escape_string($conn, $_POST['year']);
    
    $tags = mysqli_real_escape_string($conn, $_POST['tags']);

    $sql = "INSERT INTO notes (email, noteTitle, description, day, month, year, tags) VALUES ('$email', '$title', '$description', '$day', '$month', '$year', '$tags' )";


    if (mysqli_query($conn, $sql)) {
        echo '<script language="javascript">';
        echo 'alert("Record added to database!")';
        echo '</script>';
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
}

    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add note</title>
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
			<li><a href="view.php">View All Notes</a></li>
			<li><a href="logout.php">Log out</a></li>
			<li><a href="#">Contacts</a></li>
		</nav>
	</header>
   
   <section class="hero">
		<div class="background-image" style="background-image: url(images/balloon.jpg);"></div>
		
		<?php
	   		echo "<h2>Hello!<br>" . $login_name . "</h2>";
    		echo "Start Adding your notes ... ";
	    ?>
	    
	    <div class="loginform">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <br><br> Note Title:<span class="error">* <?php echo $titleErr;?></span>
            <br> <input class="form-control" type="text" name="title"> <br><br> 
            Description:<span class="error">* <?php echo $desErr;?></span> <br>
            <textarea class="form-control" rows="10" cols="100" name="description"></textarea>
            <br><br>
            Date Created:<span class="error">* <?php echo $dateErr;?></span>
            <br> Day:
            <select class="btn" name="day">
                <option value="01">01</option><option value="02">02</option>
                <option value="03">03</option><option value="04">04</option>
                <option value="05">05</option><option value="06">06</option>
                <option value="07">07</option><option value="08">08</option>
                <option value="09">09</option><option value="10">10</option>
                <option value="11">11</option><option value="12">12</option>
                <option value="13">13</option><option value="14">14</option>
                <option value="15">15</option><option value="16">16</option>
                <option value="17">17</option><option value="18">18</option>
                <option value="19">19</option><option value="20">20</option>
                <option value="21">21</option><option value="22">22</option>
                <option value="23">23</option><option value="24">24</option>
                <option value="25">25</option><option value="26">26</option>
                <option value="27">27</option><option value="28">28</option>
                <option value="29">29</option><option value="30">30</option>
                <option value="31">31</option>
            </select> 
            Month:
            <select class="btn" name="month">
                <option value="01">January</option><option value="02">February</option>
                <option value="03">March</option><option value="04">April</option>
                <option value="05">May</option><option value="06">June</option>
                <option value="07">July</option><option value="08">August</option>
                <option value="09">September</option><option value="10">October</option>
                <option value="11">November</option><option value="12">December</option>
            </select> 
            Year:
            <input class="btn" type="text" name="year">
            <br><br>
            Note Tags:<span class="error">* <?php echo $tagErr;?></span> <br>
            <textarea class="form-control" rows="4" cols="50" name="tags"></textarea>
            <br><br>
            <input class="btn" type="submit" name="submit" value="Save Note">
            <input class="btn" type="reset" value="Reset Fields">
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