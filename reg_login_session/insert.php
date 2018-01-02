<?php require 'db_connection.php'; ?>


<?php

if(isset($_POST["submit"])) {
    
$email = mysqli_real_escape_string($conn, $_POST['email']);
    
$name = mysqli_real_escape_string($conn, $_POST['username']);

$pass = mysqli_real_escape_string($conn, $_POST['password']);

$gender = mysqli_real_escape_string($conn, $_POST['gender']);

$sql = "INSERT INTO user (email, username, password, gender) VALUES ('$email', '$name', '$pass', '$gender' )";


if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}

?>