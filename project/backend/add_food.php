<?php 
	require 'session.php';
	echo "<h2>Hello!<br>" . $login_name . "</h2>";
    echo "Add a new food item in the system ... ";

    $sql1 = "SELECT restaurant.rid, restaurant.name FROM restaurant WHERE restaurant.approval = 'TRUE' ";
    $result = mysqli_query($conn, $sql1);

    $options='';
	while($row = mysqli_fetch_array($result))
	{
	    $options .= "<option value='" . $row['rid'] . "'>" .$row['name']. "</option>";
	} 

    if(isset($_POST["submit"])) {
    
    $email = $login_email;
    if ($usertype == 'admin' || $usertype == 'moderator') {
    	$approval = 'TRUE';
    }
    else {
    	$approval = 'FALSE';
    }

    $name = mysqli_real_escape_string($conn, $_POST['f_name']);
    
    $price = mysqli_real_escape_string($conn, $_POST['f_price']);

    $rid = mysqli_real_escape_string($conn, $_POST['r_name']);

    $sql = "INSERT INTO food (rid, name, price, addedBy, approval) VALUES ('$rid', '$name', '$price', '$email', '$approval')";


    if (mysqli_query($conn, $sql)) {
         echo '<script language="javascript">';
         echo 'alert("Record added to database!")';
         echo '</script>';
    } 
    else {
         echo "Error: " . $sql . "<br>" . mysqli_error($conn);
       }
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Add a new food...</title>
</head>
<body>
	<div>
		<form action="" method="post">
			<br>Restaurant: &nbsp
			<select name="r_name">
				<? echo $options; ?>
			</select>
			<br><br>
			Item Name: <br>
			<input type="text" name="f_name" required>
			<br> <br> Price: <br>
			<input type="text" name="f_price" required>
			<br> <br>
			<input type="submit" name="submit" value="Add Item">
            <input type="reset" value="Reset Fields">
		</form>
	</div>

	<br> <br>
	<a href="dashboard.php">Go to dashboard</a>
</body>
</html>