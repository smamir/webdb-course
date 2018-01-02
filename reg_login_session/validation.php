<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $passErr = "";
$name = $email = $gender = $pass = "";
$is_error = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["username"])) {
    $nameErr = "Name is required";
    $is_error = true;
  } else {
    $name = test_input($_POST["username"]);
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
      $is_error = true;
    }
  }

  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
    $is_error = true;
  } else {
    $email = test_input($_POST["email"]);
  }

  if (empty($_POST["gender"])) {
    $is_error = true;
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
    
 if (empty($_POST["password"])) {
    $is_error = true;
    $passErr = "Password is required";
  } else {
    $pass = test_input($_POST["password"]);
    if (strlen($pass) < '8') {
        $passErr = "Your Password Must Contain At Least 8 Characters!";
        $is_error = true;
    }
  }
}
    
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>