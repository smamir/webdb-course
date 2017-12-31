<?php
    require 'session.php';
    $id=$_GET['id'];
 
// Attempt select query execution
$sql = "SELECT f_review.rating, f_review.review FROM f_review WHERE f_review.reviewID = '$id' ";

if($result = mysqli_query($conn, $sql)) {
    
    if(mysqli_num_rows($result) > 0) {
        
        $row = mysqli_fetch_array($result);
        
        echo "Rating: " . $row['rating'] . "<br>";
        echo "Review Details: <br>" . $row['review'] . "<br>";

        
        // Free result set. mysqli_free_result() function frees the memory associated with the result.
        mysqli_free_result($result);
    }
        
    else{
        echo "No records matching your query were found.";
    }
} 
else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Restaurant Review Details</title>
</head>
<body>
    
</body>
</html>
