<?php 
	require 'session.php';
	echo "<h2>Hello!<br>" . $login_name . "</h2>";
    echo "Add a new restaurant in the system ... ";

    if(isset($_POST["submit"])) {
    
    $email = $login_email;
    if ($usertype == 'admin' || $usertype == 'moderator') {
    	$approval = 'TRUE';
    }
    else {
    	$approval = 'FALSE';
    }

    $name = mysqli_real_escape_string($conn, $_POST['r_name']);
    
    $area = mysqli_real_escape_string($conn, $_POST['r_area']);

    $address = mysqli_real_escape_string($conn, $_POST['r_address']);

    $sql = "INSERT INTO restaurant (name, area, address, addedBy, approval) VALUES ('$name', '$area', '$address', '$email', '$approval' )";


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
<html>
<head>
	<title>Add a new reataurant...</title>
</head>
<body>
	<div>
		<form action="" method="post">
			Restaurant Name: <br>
			<input type="text" name="r_name" required>
			<br> <br> Area: <br>
			<input type="text" name="r_area" required>
			<br> <br> Address Details: <br>
			<input type="text" name="r_address" required>
			<br> <br>
			<input type="submit" name="submit" value="Add Restaurant">
            <input type="reset" value="Reset Fields">
		</form>
	</div>

	<br> <br>
	<a href="dashboard.php">Go to dashboard</a>
</body>
</html>