<?php 
	require 'session.php';
	echo "<h2>Hello!<br>" . $login_name . "</h2>";
	echo "Give a food review... <br><br>";

	// echo "RID: " . $_POST['r_name'] . "<br>";
	$r_id = $_POST['r_name'];
	

	$sql1 = "SELECT food.fid, food.name FROM food WHERE food.rid = '$r_id' AND food.approval = 'TRUE' ";
	

	if($result = mysqli_query($conn, $sql1)) {
		$options='';
		while($row = mysqli_fetch_array($result))
		{
			$options .= "<option value='" . $row['fid'] . "'>" .$row['name']. "</option>";
		}
		if(isset($_POST["submit"])) {

		//echo "R: " . $r_id1 . "<br>";
			$email = $login_email;
			if ($usertype == 'admin' || $usertype == 'moderator') {
				$approval = 'TRUE';
			}
			else {
				$approval = 'FALSE';
			}
			$rid = mysqli_real_escape_string($conn, $_POST['rid']);

			$rating = mysqli_real_escape_string($conn, $_POST['rating']);
			
			$review = mysqli_real_escape_string($conn, $_POST['review']);

			$fid = mysqli_real_escape_string($conn, $_POST['f_name']);

			$sql2 = "SELECT * FROM f_review WHERE f_review.fid='$fid' AND f_review.addedBy='$email' AND f_review.rid='$rid' ";
			$res = mysqli_query($conn, $sql2);

			if (mysqli_num_rows($res) > 0) {
				echo '<script language="javascript">';
				echo 'alert("You already added review for this restaurant! Please use the update option.")';
				echo '</script>';
			}
			else {
				$sql = "INSERT INTO f_review (fid, rid, addedBy, rating, review, approval) VALUES ('$fid', '$rid', '$email', '$rating', '$review', '$approval')";

				if (mysqli_query($conn, $sql)) {
					 echo '<script language="javascript">';
					 //echo 'alert("Record added to database!")';
					 echo 'if (confirm("Record added! Add more?")) {
					 	window.location = "select_r.php"
					 }
					 else {
					 	window.location = "dashboard.php"
					 }';
					 echo '</script>';
				} 
				else {
					 echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				   }
			}
		}
	}
	else{
        echo '<script language="javascript">';
		//echo 'alert("Record added to database!")';
		echo 'if (confirm("No record found for your query! Try another?")) {
		 	window.location = "select_r.php"
		 }
		else {
		 	window.location = "dashboard.php"
		}';
		echo '</script>';
    }




	if(isset($_POST["submit"])) {

		//echo "R: " . $r_id1 . "<br>";
		$email = $login_email;
		if ($usertype == 'admin' || $usertype == 'moderator') {
			$approval = 'TRUE';
		}
		else {
			$approval = 'FALSE';
		}
		$rid = mysqli_real_escape_string($conn, $_POST['rid']);

		$rating = mysqli_real_escape_string($conn, $_POST['rating']);
		
		$review = mysqli_real_escape_string($conn, $_POST['review']);

		$fid = mysqli_real_escape_string($conn, $_POST['f_name']);

		$sql2 = "SELECT * FROM f_review WHERE f_review.fid='$fid' AND f_review.addedBy='$email' AND f_review.rid='$rid' ";
		$res = mysqli_query($conn, $sql2);

		if (mysqli_num_rows($res) > 0) {
			echo '<script language="javascript">';
			echo 'alert("You already added review for this restaurant! Please use the update option.")';
			echo '</script>';
		}
		else {
			$sql = "INSERT INTO f_review (fid, rid, addedBy, rating, review, approval) VALUES ('$fid', '$rid', '$email', '$rating', '$review', '$approval')";

			if (mysqli_query($conn, $sql)) {
				 echo '<script language="javascript">';
				 //echo 'alert("Record added to database!")';
				 echo 'if (confirm("Record added! Add more?")) {
				 	window.location = "select_r.php"
				 }
				 else {
				 	window.location = "dashboard.php"
				 }';
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
			<br>Food Item: &nbsp
			<select name="f_name" required>
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
			<input type="hidden" name="rid" value="<?php echo $r_id ?>">
			<input type="submit" name="submit" value="Save Review">
			<input type="reset" value="Reset Fields">
		</form>
	</div>

	<br> <br>
	<a href="dashboard.php">Go to dashboard</a>
</body>
</html>