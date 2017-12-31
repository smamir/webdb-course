<?php
    require 'session.php';
    $email = $login_email;
 
// Attempt select query execution

    if ($usertype=='admin' || $usertype == 'moderator') {
        $sql1 = "SELECT food.fid, restaurant.name, food.name, food.price, food.addedBy, food.approval FROM food JOIN restaurant WHERE food.rid = restaurant.rid ORDER BY approval";
        if($result = mysqli_query($conn, $sql1)){
            if(mysqli_num_rows($result) > 0)
            { ?>
                <table>
                    <tr>
                        <th>Food Item ID</th>
                        <th>Restaurant Name</th>
                        <th>Food Name</th>
                        <th>Food Price</th>
                        <th>Added By</th>
                        <th>Approved?</th>
                        <th>Action</th>
                    </tr>
              <?php  while($row = mysqli_fetch_array($result))
            { ?>
                    <tr>
                        <td> <?php echo $row['0'] ?> </td>
                        <td> <?php echo $row['1'] ?> </td>
                        <td> <?php echo $row['2'] ?> </td>
                        <td> <?php echo $row['3'] ?> </td>
                        <td> <?php echo $row['4'] ?> </td>
                        <td> <?php echo $row['5'] ?> </td>
                        <td>
                          <a href="update_food.php?id=<?php echo $row['fid']; ?> " target="_blank"><span class="edit" title="Edit"> Update</span></a> /
                          <a href="delete_food.php?id=<?php echo $row['fid']; ?>" onclick="return confirm('Are you sure you wish to delete this Record?');">
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

        
    }
    else {
        $sql = "SELECT food.fid, restaurant.name, food.name, food.price, food.approval FROM food JOIN restaurant WHERE food.addedBy='$email'";
        if($result = mysqli_query($conn, $sql)){
            if(mysqli_num_rows($result) > 0)
            { ?>
                <table>
                    <tr>
                        <th>Food Item ID</th>
                        <th>Restaurant Name</th>
                        <th>Food Name</th>
                        <th>Food Price</th>
                        <th>Approved?</th>
                        <th>Action</th>
                    </tr>
              <?php  while($row = mysqli_fetch_array($result))
            { ?>
                    <tr>
                        <td> <?php echo $row['0'] ?> </td>
                        <td> <?php echo $row['1'] ?> </td>
                        <td> <?php echo $row['2'] ?> </td>
                        <td> <?php echo $row['3'] ?> </td>
                        <td> <?php echo $row['5'] ?> </td>
                        <td>
                          <a href="update.php?id=<?php echo $row['rid']; ?> " target="_blank"><span class="edit" title="Edit"> Update</span></a> /
                          <a href="delete_food.php?id=<?php echo $row['fid']; ?>" onclick="return confirm('Are you sure you wish to delete this Record?');">
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

    }
 
// Close connection
mysqli_close($conn);
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    
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
            background-color: #dddddd;
    }
</style>
</head>
<body>
    
</body>
</html>