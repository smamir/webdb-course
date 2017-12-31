<?php
    require 'session.php';
    $email = $login_email;
 
// Attempt select query execution

    if ($usertype=='admin' || $usertype=='moderator') {
        $sql1 = "SELECT f_review.reviewID, food.name,  restaurant.name, f_review.addedBy, f_review.rating, f_review.review, f_review.approval FROM f_review JOIN food JOIN restaurant WHERE f_review.fid = food.fid AND f_review.rid = restaurant.rid ";
        if($result = mysqli_query($conn, $sql1)){
            if(mysqli_num_rows($result) > 0)
            { ?>
                <table>
                    <tr>
                        <th>Review ID</th>
                        <th>Food Name</th>
                        <th>Restaurant Name</th>
                        <th>Review By</th>
                        <th>Rating</th>
                        <th>Review</th>
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
                        <td> <a href="f_rev_full.php?id=<?php echo $row['reviewID'] ?>" target="_blank"><?php echo $row['5'] ?> </a> </td>
                        <td> <?php echo $row['6'] ?> </td>
                        <td>
                          <a href="update_f_rev.php?id=<?php echo $row['reviewID']; ?> " target="_blank"><span class="edit" title="Edit"> Update</span></a> /
                          <a href="delete_f_rev.php?id=<?php echo $row['reviewID']; ?>" onclick="return confirm('Are you sure you wish to delete this Record?');">
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
        $sql1 = "SELECT f_review.reviewID, food.name,  restaurant.name, f_review.rating, f_review.review, f_review.approval FROM f_review JOIN food JOIN restaurant WHERE f_review.fid = food.fid AND f_review.rid = restaurant.rid  AND f_review.addedBy = '$email' ";
        if($result = mysqli_query($conn, $sql1)){
            if(mysqli_num_rows($result) > 0)
            { ?>
                <table>
                    <tr>
                        <th>Review ID</th>
                        <th>Food Name</th>
                        <th>Restaurant Name</th>
                        <th>Rating</th>
                        <th>Review</th>
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
                        <td> <a href="f_rev_full.php?id=<?php echo $row['reviewID'] ?>" target="_blank"><?php echo $row['4'] ?> </a> </td>
                        <td> <?php echo $row['5'] ?> </td>
                        <td>
                          <a href="update_f_rev.php?id=<?php echo $row['0']; ?> " target="_blank"><span class="edit" title="Edit"> Update</span></a> /
                          <a href="delete_f_rev.php?id=<?php echo $row['reviewID']; ?>" onclick="return confirm('Are you sure you wish to delete this Record?');">
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