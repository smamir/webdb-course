<?php 
	require 'session.php';
	echo "<h2>Hello!<br>" . $login_name . "</h2>";
    echo "Give a restaurant review... ";

    $sql1 = "SELECT restaurant.rid, restaurant.name FROM restaurant WHERE restaurant.approval='TRUE'";
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

    $rating = mysqli_real_escape_string($conn, $_POST['rating']);
    
    $review = mysqli_real_escape_string($conn, $_POST['review']);

    $rid = mysqli_real_escape_string($conn, $_POST['r_name']);

    $sql2 = "SELECT * FROM r_review WHERE r_review.rid='$rid' AND r_review.addedBy='$email' ";
    $res = mysqli_query($conn, $sql2);

    if (mysqli_num_rows($res) > 0) {
        echo '<script language="javascript">';
        echo 'alert("You already added review for this restaurant! Please use the update option.")';
        echo '</script>';
    }
    else {
        $sql = "INSERT INTO r_review (rid, addedBy, rating, review, approval) VALUES ('$rid', '$email', '$rating', '$review', '$approval')";


        if (mysqli_query($conn, $sql)) {
             echo '<script language="javascript">';
             echo 'alert("Record added to database!")';
             echo '</script>';
        } 
        else {
             echo "Error: " . $sql . "<br>" . mysqli_error($conn);
           }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Give a review...</title>
</head>
<body>
	<div>
		<form action="" method="post">
			<br>Restaurant: &nbsp
			<select name="r_name">
				<?php echo $options; ?>
			</select>
			<br><br>
			Rating: <br>
			<select name="rating">
                <option value="1">1</option>
                <option value="2">2</option> 
                <option value="3">3</option> 
                <option value="4">4</option> 
                <option value="5">5</option>          
            </select>
			<br> <br> Review: <br>
			<textarea rows="10" cols="25" name="review"></textarea>
			<br> <br>
			<input type="submit" name="submit" value="Save Review">
            <input type="reset" value="Reset Fields">
		</form>
	</div>

	<br> <br>
	<a href="dashboard.php">Go to dashboard</a>
</body>
</html>