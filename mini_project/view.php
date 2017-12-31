<?php
    require 'session.php';
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>View all notes</title>
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
    
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;

        }

        tr:nth-child(even) {
            background-color:  cadetblue;
    }
	</style>
</head>
    
<body>
    <header>
		<h2><a href="main.php">Note Savvy</a></h2>
		<nav>
			<li><a href="dashboard.php">Dashboard</a></li>
			<li><a href="logout.php">Log out</a></li>
			<li><a href="#">Contacts</a></li>
		</nav>
	</header>
	
	<section class="hero">
		<div class="background-image" style="background-image: url(images/note4.jpg);"></div>
		
		<?php
	   		echo "<h2>Hello!<br>" . $login_name . "</h2>";
    		echo "These are your notes ... ";
			
			$sql = "SELECT notes.noteID, notes.noteTitle, notes.day, notes.month, notes.year, notes.tags FROM notes WHERE notes.email='$login_email'";
if($result = mysqli_query($conn, $sql)){
    if(mysqli_num_rows($result) > 0)
    { ?>
        <table>
            <tr>
                <th>Note ID</th>
                <th>Note Title</th>
                <th>Note Created</th>
                <th>Note Tags</th>
                <th>Action</th>
            </tr>
      <?php  while($row = mysqli_fetch_array($result))
    { ?>
            <tr>
                <td> <?php echo $row['noteID'] ?> </td>
                <td><a href="note_view.php?id=<?php echo $row['noteID'] ?>" target="_blank"><?php echo $row['noteTitle'] ?> </a></td>
                <td><?php echo $row['day'] ?> - <?php echo $row['month'] ?> - <?php echo $row['year']?></td>
                <td><?php echo $row['tags'] ?></td>
                <td>
                  <a href="update.php?id=<?php echo $row['noteID']; ?> " class="nav-pills" target="_blank"><span class="edit" title="Edit"> Update</span></a> /
                  <a href="delete.php?id=<?php echo $row['noteID']; ?>" class="nav-pills" onclick="return confirm('Are you sure you wish to delete this Record?');">
                      <span class="delete" title="Delete"> Delete</span>
                  </a>
              </td>
            </tr>
<?php        }
        echo "</table>";
        // Free result set. mysqli_free_result() function frees the memory associated with the result.
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} 
else {
    echo "ERROR: Could not execute $sql. " . mysqli_error($conn);
}
 
// Close connection
mysqli_close($conn);
	    ?>		
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