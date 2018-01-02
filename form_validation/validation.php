<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $passErr = "";
$name = $email = $gender = $pass = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["username"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["username"]);
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed"; 
    }
  }

  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
    
 if (empty($_POST["pass"])) {
    $passErr = "Password is required";
  } else {
    $pass = test_input($_POST["pass"]);
    if (strlen($pass) < '8') {
        $passErr = "Your Password Must Contain At Least 8 Characters!";
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
