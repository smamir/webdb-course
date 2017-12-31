<?php
    require 'session.php';
	require 'up_valid.php';

    $email = $login_email;
    
    if(isset($_GET['id']) != "") 
    {
        $nid = $_GET['id'];
        
        $test = "SELECT notes.email FROM notes WHERE notes.noteID='$nid'";
        $res = mysqli_query($conn, $test);
        $erow = mysqli_fetch_array($res);
        if($email==$erow['email']) {
            if(isset($_POST['update']) && !$is_error) {

                $title = mysqli_real_escape_string($conn, $_POST['title']);

                $description = mysqli_real_escape_string($conn, $_POST['description']);

                $tags = mysqli_real_escape_string($conn, $_POST['tags']);

                $sql = "UPDATE notes SET noteTitle='$title', description='$description', tags='$tags' WHERE noteID='$nid'";

                if (mysqli_query($conn, $sql)) {
                    echo '<script language="javascript">';
                    echo 'alert("Successfully updated!");';
                    echo 'close();';
                    echo '</script>';
                    //header("Location:view.php");

                } 
                else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
            }
        }
        else {
            echo '<script language="javascript">';
            echo 'alert("Permission denied!");';
            echo 'close();';
            echo '</script>';
            //header("Location:view.php");
        }
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update note</title>
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
  
   <?php 
    if(isset($_GET['id']) != "") 
    {
        $id = $_GET['id'];
        
        $test = "SELECT notes.email FROM notes WHERE notes.noteID='$id'";
        $res = mysqli_query($conn, $test);
        $erow = mysqli_fetch_array($res);
        if($email==$erow['email']) {
            $sql1 = "SELECT notes.noteTitle, notes.description, notes.day, notes.month, notes.year, notes.tags FROM notes WHERE notes.noteID = '$id'";
        
            $result = mysqli_query($conn, $sql1);

            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_array($result);
            }
            else 
            {
                echo "ERROR: Could not execute $sql1. " . mysqli_error($conn);
            }
        }
        else {
            echo '<script language="javascript">';
            echo 'alert("Permission denied!");';
            echo 'close();';
            echo '</script>';
            //header("Location:view.php");
        }
    }
    ?>
    
    <section class="hero">
		<div class="background-image" style="background-image: url(images/note5.jpg);"></div>
		
		<?php
	   		echo "<h2>Hello!<br>" . $login_name . "</h2>";
    		echo "Update your note ... ";
	    ?>
	    
	    <div>
			<form class="upform" action="" method="post">
				<br><br> Note Title:<span class="error">* <?php echo $titleErr;?></span>
				<br> <input class="form-control" type="text" name="title" value="<?php echo $row['noteTitle'] ?>"> <br><br> 
				Description:<span class="error">* <?php echo $desErr;?></span> <br>
				<textarea class="form-control" rows="10" cols="100" name="description"><?php echo $row['description'] ?> </textarea> 
				<br><br>
				Note Tags:<span class="error">* <?php echo $tagErr;?></span> <br>
				<textarea class="form-control" rows="4" cols="50" name="tags"><?php echo $row['tags'] ?></textarea>
				<br><br>
				Date Created: <br> 
				<input type="text" name="day" value="<?php echo $row['day'] ?>" readonly> -
				<input type="text" name="month" value="<?php echo $row['month'] ?>" readonly> -
				<input type="text" name="year" value="<?php echo $row['year'] ?>" readonly>
				<br><br>
				<input class="btn" type="submit" name="update" value="Save Note">
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

</html>