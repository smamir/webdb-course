<?php 
	require 'session.php';
	echo "<h2>Hello!<br>" . $login_name . "</h2>";
    echo "<h3>You are logged in as " . $usertype . ". <br></h3>";
    echo "Update restaurant information ... ";
    $email = $login_email;
    //echo $email;

    if ($usertype == 'admin' || $usertype == 'moderator') {
        $approval = 'TRUE';
    }
    else {
        $approval = 'FALSE';
    }

    if(isset($_GET['id']) != "") 
    {
        $rv_id = $_GET['id'];
        
        $test = "SELECT r_review.addedBy FROM r_review WHERE r_review.reviewID='$rv_id'";
        $res = mysqli_query($conn, $test);
        $erow = mysqli_fetch_array($res);
        //echo "<br>" . $erow['addedBy'];
        if($email==$erow['addedBy'] || $usertype == 'admin' || $usertype == 'moderator') {
            if(isset($_POST['update'])) {

                $rating = mysqli_real_escape_string($conn, $_POST['rating']);
    
                $review = mysqli_real_escape_string($conn, $_POST['review']);

                $sql = "UPDATE r_review SET rating = '$rating', review = '$review', approval = '$approval' WHERE reviewID = '$rv_id' ";

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
<html>
<head>
	<title>Add a new reataurant...</title>
</head>
<body>
    <?php 
    if(isset($_GET['id']) != "") 
    {
        $id = $_GET['id'];
        
        $test = "SELECT r_review.addedBy FROM r_review WHERE r_review.reviewID='$id'";
        $res = mysqli_query($conn, $test);
        $erow = mysqli_fetch_array($res);
        if($email==$erow['addedBy'] || $usertype == 'admin' || $usertype== 'moderator') {
            $sql1 = "SELECT restaurant.name, r_review.rating, r_review.review FROM restaurant JOIN r_review WHERE reviewID = '$id' AND restaurant.rid = r_review.rid ";
        
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
	<div>
		<form action="" method="post">
            <br>Restaurant: &nbsp 
            <?php echo $row['name'] ?>
            <br><br>
            Old Rating: <?php echo $row['rating'] ?>
            <br><br>
            New Rating: <br>
            <select name="rating">
                <option value="1">1</option>
                <option value="2">2</option> 
                <option value="3">3</option> 
                <option value="4">4</option> 
                <option value="5">5</option>          
            </select>
            <br> <br> Review: <br>
            <textarea rows="10" cols="25" name="review"><?php echo $row['review'] ?></textarea>
            <br> <br>
            <input type="submit" name="update" value="Update Review">
            <input type="reset" value="Reset Fields">
        </form>
	</div>

	<br> <br>
	<a href="dashboard.php">Go to dashboard</a>
</body>
</html>