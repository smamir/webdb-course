<?php 
	require 'session.php';
	echo "<h2>Hello!<br>" . $login_name . "</h2>";
    echo "<br> Select a restaurant...";
    $sql1 = "SELECT restaurant.rid, restaurant.name FROM restaurant WHERE restaurant.approval='TRUE'";
    $result = mysqli_query($conn, $sql1);

    $options='';
    while($row = mysqli_fetch_array($result))
    {
        $options .= "<option value='" . $row['rid'] . "'>" .$row['name']. "</option>";
    }

    // if (isset($_POST["ok"])) {
        
    //     $r_id = mysqli_real_escape_string($conn, $_POST['r_name']);

    //     $sql1 = "SELECT food.fid, food.name FROM food WHERE food.rid = '$r_id' ";
    //     $res = mysqli_query($conn, $sql1);

    //     if (mysqli_num_rows($res) > 0) {
    //         echo '<script language="javascript">';
    //         echo 'alert("You are being redirected...")';
    //         echo 'window.location = "f_review.php";';
    //         echo '</script>';
    //     }

    //     else {
    //         echo '<script language="javascript">';
    //         echo 'alert("No records matching your query were found.")';
    //         echo 'window.location = "dashboard.php";';
    //         echo '</script>';
    //     }
    // } 
?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <form action="f_review.php" method="post">
        <br> Restaurant Name: &nbsp
        <select name="r_name">
                <?php echo $options; ?>
        </select> &nbsp
        <input type="submit" name="ok" value="Find Food Item">

    </form>
</body>
</html>