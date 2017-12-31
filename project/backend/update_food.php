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
        $fid = $_GET['id'];
        
        $test = "SELECT food.addedBy FROM food WHERE food.fid='$fid'";
        $res = mysqli_query($conn, $test);
        $erow = mysqli_fetch_array($res);
        //echo "<br>" . $erow['addedBy'];
        if($email==$erow['addedBy'] || $usertype == 'admin' || $usertype == 'moderator') {
            if(isset($_POST['update'])) {

                $name = mysqli_real_escape_string($conn, $_POST['f_name']);
    
                $price = mysqli_real_escape_string($conn, $_POST['f_price']);

                $sql = "UPDATE food SET name = '$name', price = '$price', approval = '$approval' WHERE fid = '$fid' ";

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
        
        $test = "SELECT food.addedBy FROM food WHERE food.fid='$id'";
        $res = mysqli_query($conn, $test);
        $erow = mysqli_fetch_array($res);
        if($email==$erow['addedBy'] || $usertype == 'admin' || $usertype== 'moderator') {
            $sql1 = "SELECT name, price FROM food WHERE fid = '$id'";
        
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
            <br><br>
            Item Name: <br>
            <input type="text" name="f_name" value="<?php echo $row['name'] ?>" required>
            <br> <br> Price: <br>
            <input type="text" name="f_price" value="<?php echo $row['price'] ?>" required>
            <br> <br>
            <input type="submit" name="update" value="Update Item">
            <input type="reset" value="Reset Fields">
        </form>
	</div>

	<br> <br>
	<a href="dashboard.php">Go to dashboard</a>
</body>
</html>