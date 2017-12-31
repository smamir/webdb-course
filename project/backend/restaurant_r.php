<?php
    require 'session.php';
    $email = $login_email;
 
// Attempt select query execution

    if ($usertype=='admin' || $usertype=='moderator') {
        $sql1 = "SELECT r_review.reviewID, restaurant.name, r_review.addedBy, r_review.rating, r_review.review, r_review.approval FROM r_review JOIN restaurant WHERE r_review.rid = restaurant.rid ";
        if($result = mysqli_query($conn, $sql1)){
            if(mysqli_num_rows($result) > 0)
            { ?>
                <table>
                    <tr>
                        <th>Review ID</th>
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
                        <td> <?php echo $row['reviewID'] ?> </td>
                        <td> <?php echo $row['name'] ?> </td>
                        <td> <?php echo $row['addedBy'] ?> </td>
                        <td> <?php echo $row['rating'] ?> </td>
                        <td> <a href="r_rev_full.php?id=<?php echo $row['reviewID'] ?>" target="_blank"><?php echo $row['review'] ?> </a> </td>
                        <td> <?php echo $row['approval'] ?> </td>
                        <td>
                          <a href="update_r_rev.php?id=<?php echo $row['reviewID']; ?> " target="_blank"><span class="edit" title="Edit"> Update</span></a> /
                          <a href="delete_res_rev.php?id=<?php echo $row['reviewID']; ?>" onclick="return confirm('Are you sure you wish to delete this Record?');">
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
        $sql1 = "SELECT r_review.reviewID, restaurant.name, r_review.rating, r_review.review, r_review.approval FROM r_review JOIN restaurant WHERE r_review.rid = restaurant.rid  AND r_review.addedBy = '$email' ";
        if($result = mysqli_query($conn, $sql1)){
            if(mysqli_num_rows($result) > 0)
            { ?>
                <table>
                    <tr>
                        <th>Review ID</th>
                        <th>Restaurant Name</th>
                        <th>Rating</th>
                        <th>Review</th>
                        <th>Approved?</th>
                        <th>Action</th>
                    </tr>
              <?php  while($row = mysqli_fetch_array($result))
            { ?>
                    <tr>
                        <td> <?php echo $row['reviewID'] ?> </td>
                        <td> <?php echo $row['name'] ?> </td>
                        <td> <?php echo $row['rating'] ?> </td>
                        <td> <?php echo $row['review'] ?> </td>
                        <td> <?php echo $row['approval'] ?> </td>
                        <td>
                          <a href="r_update.php?id=<?php echo $row['rid']; ?> " target="_blank"><span class="edit" title="Edit"> Update</span></a> /
                          <a href="delete_res_rev.php?id=<?php echo $row['reviewID']; ?>" onclick="return confirm('Are you sure you wish to delete this Record?');">
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