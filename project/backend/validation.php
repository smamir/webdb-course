<?php
// define variables and set to empty values
$nameErr = $emailErr = $pass1Err = $pass2Err= "";
$name = $email = $pass1 = $pass2 = "";
$is_error = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["username"])) {
    $nameErr = "Name is required";
    $is_error = true;
  } else {
    //$login = test_input($_POST["username"]);
    //if (!preg_match("/^[a-zA-Z ]*$/",$login)) {
      //$loginErr = "Only letters and white space allowed";
      //$is_error = true;
    $name = test_input($_POST["username"]);
    if (strlen($name) > '40') {
        $nameErr = "Name can't be more than 40 characters!";
        $is_error = true;
    }
  }

  if (empty($_POST["password1"])) {
    $is_error = true;
    $pass1Err = "Password is required";
  } else {
    $pass1 = test_input($_POST["password1"]);
    if (strlen($pass1) > '25') {
        $pass1Err = "Your Password is more than 25 Characters!";
        $is_error = true;
    }
    else if(!preg_match("/[^a-z_\-0-9]/i",$pass1)) {
      $pass1Err = "Password does not meet required criteria!";
      $is_error = true;
    }
  }

  if (empty($_POST["password2"])) {
    $is_error = true;
    $pass2Err = "Password is required";
  } else {
    $pass2 = test_input($_POST["password2"]);
    if ($pass2 != $pass1) {
        $pass2Err = "Your Password does not match!";
        $is_error = true;
    }
    }

  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
    $is_error = true;
  } 
  else if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
  $emailErr = "Invalid email format";
  $is_error = true;
  }
  else {
    $email = test_input($_POST["email"]);
  }
}
    
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>