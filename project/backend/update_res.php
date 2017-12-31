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
        $rid = $_GET['id'];
        
        $test = "SELECT restaurant.addedBy FROM restaurant WHERE restaurant.rid='$rid'";
        $res = mysqli_query($conn, $test);
        $erow = mysqli_fetch_array($res);
        //echo "<br>" . $erow['addedBy'];
        if($email==$erow['addedBy'] || $usertype== 'admin') {
            if(isset($_POST['update'])) {

                $name = mysqli_real_escape_string($conn, $_POST['r_name']);
    
                $area = mysqli_real_escape_string($conn, $_POST['r_area']);

                $address = mysqli_real_escape_string($conn, $_POST['r_address']);

                $sql = "UPDATE restaurant SET name = '$name', area = '$area', address = '$address', approval = '$approval' WHERE rid = '$rid' ";

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
        
        $test = "SELECT restaurant.addedBy FROM restaurant WHERE restaurant.rid='$id'";
        $res = mysqli_query($conn, $test);
        $erow = mysqli_fetch_array($res);
        if($email==$erow['addedBy'] || $usertype == 'admin') {
            $sql1 = "SELECT name, area, address FROM restaurant WHERE rid = '$id'";
        
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
			Restaurant Name: <br>
			<input type="text" name="r_name" value="<?php echo $row['name'] ?>" required>
			<br> <br> Area: <br>
			<input type="text" name="r_area" value="<?php echo $row['area'] ?>" required>
			<br> <br> Address Details: <br>
			<input type="text" name="r_address" value="<?php echo $row['address'] ?>" required>
			<br> <br>
			<input type="submit" name="update" value="Update Details">
            <input type="reset" value="Reset Fields">
		</form>
	</div>

	<br> <br>
	<a href="dashboard.php">Go to dashboard</a>
</body>
</html>