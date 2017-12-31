<?php
// define variables and set to empty values
$titleErr = $desErr = $tagErr = "";
$title = $description = $tags = "";
$is_error = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["title"])) {
    $titleErr = "Title is required";
    $is_error = true;
  } else {
    
    $title = test_input($_POST["title"]);
    if (strlen($title) > '100') {
        $nameErr = "Title can't be more than 100 characters!";
        $is_error = true;
    }
  }

  if (empty($_POST["description"])) {
    $is_error = true;
    $desErr = "Description is required";
  } else {
    $description = test_input($_POST["description"]);
    
  }

  if (empty($_POST["tags"])) {
    $is_error = true;
    $tagErr = "Password is required";
  } else {
    $tags = test_input($_POST["tags"]);
    if (strlen($tags) > '100') {
        $pass2Err = "Tags can't be more than 100 characters!";
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