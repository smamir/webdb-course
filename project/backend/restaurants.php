<?php
    require 'session.php';
    $email = $login_email;
 
// Attempt select query execution

    if ($usertype=='admin') {
        $sql1 = "SELECT * FROM restaurant ORDER BY approval";
        if($result = mysqli_query($conn, $sql1)){
            if(mysqli_num_rows($result) > 0)
            { ?>
                <table>
                    <tr>
                        <th>Restaurant ID</th>
                        <th>Name</th>
                        <th>Area</th>
                        <th>Address</th>
                        <th>Added By</th>
                        <th>Approved?</th>
                        <th>Action</th>
                    </tr>
              <?php  while($row = mysqli_fetch_array($result))
            { ?>
                    <tr>
                        <td> <?php echo $row['rid'] ?> </td>
                        <td> <?php echo $row['name'] ?> </td>
                        <td> <?php echo $row['area'] ?> </td>
                        <td> <?php echo $row['address'] ?> </td>
                        <td> <?php echo $row['addedBy'] ?> </td>
                        <td> <?php echo $row['approval'] ?> </td>
                        <td>
                          <a href="update_res.php?id=<?php echo $row['rid']; ?> " target="_blank"><span class="edit" title="Edit"> Update</span></a> /
                          <a href="delete_res.php?id=<?php echo $row['rid']; ?>" onclick="return confirm('Are you sure you wish to delete this Record?');">
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
        $sql = "SELECT * FROM restaurant WHERE restaurant.addedBy='$email'";
        if($result = mysqli_query($conn, $sql)){
            if(mysqli_num_rows($result) > 0)
            { ?>
                <table>
                    <tr>
                        <th>Restaurant ID</th>
                        <th>Name</th>
                        <th>Area</th>
                        <th>Address</th>
                        <th>Approved?</th>
                        <th>Action</th>
                    </tr>
              <?php  while($row = mysqli_fetch_array($result))
            { ?>
                    <tr>
                        <td> <?php echo $row['rid'] ?> </td>
                        <td> <?php echo $row['name'] ?> </td>
                        <td> <?php echo $row['area'] ?> </td>
                        <td> <?php echo $row['address'] ?> </td>
                        <td> <?php echo $row['approval'] ?> </td>
                        <td>
                          <a href="update_res.php?id=<?php echo $row['rid']; ?> " target="_blank"><span class="edit" title="Edit"> Update</span></a> /
                          <a href="delete_res.php?id=<?php echo $row['rid']; ?>" onclick="return confirm('Are you sure you wish to delete this Record?');">
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