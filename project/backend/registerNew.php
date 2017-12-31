<?php require 'validation.php'; ?>
    <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

session_start();
if(isset($_SESSION['email'])) {
      header("location:dashbordNew.php");
   }

if(isset($_POST["submit"]) && !$is_error) {
    
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    $name = mysqli_real_escape_string($conn, $_POST['username']);

    $pass1 = mysqli_real_escape_string($conn, $_POST['password1']);

    $pass2 = mysqli_real_escape_string($conn, $_POST['password2']);

    $usertype = "user";

    $sql = "INSERT INTO user (name, email, password, usertype) VALUES ('$name', '$email', '$pass2', '$usertype')";


    if (mysqli_query($conn, $sql)) {
        echo '<script language="javascript">';
        echo 'alert("Record added to database!")';
        echo '</script>';
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
}


if(isset($_POST["submit_login"])) {
      // username and password sent from form 
      
      $email = mysqli_real_escape_string($conn, $_POST['email']);
      $pass = mysqli_real_escape_string($conn, $_POST['password']); 
      $usertype = mysqli_real_escape_string($conn, $_POST['usertype']);
      
      $sql = "SELECT * FROM user WHERE email = '$email' and password = '$pass' and usertype = '$usertype' ";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_array($result);
      //$active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
      

      if($count == 1) {
          
            //echo "Hello! " . $row['name']; 
            //if($email === $admin_email) {
            $_SESSION['email'] = $row['email'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['usertype'] = $row['usertype'];
            header("location: dashbordNew.php");
              
          //} 
          //else {
            //  $_SESSION['login_email'] = $email;
              //header("location: welcome.php");
          //}
          
      }
     else {
         //$error = "Your Login Name or Password is invalid";
            echo '<script language="javascript">';
            echo 'alert("Your Login Name or Password or User Type is invalid!")';
            echo '</script>';
            //header("location: main.php");
      } 
       
   }



mysqli_close($conn);

?>
        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
        <html xmlns="http://www.w3.org/1999/xhtml">

        <head>
            <title>Food Review | Registration</title>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <link rel="stylesheet" type="text/css" media="all" href="../styles/960.css" />
            <link rel="stylesheet" type="text/css" media="all" href="../styles/reset.css" />
            <link rel="stylesheet" type="text/css" media="all" href="../styles/text.css" />
            <link rel="stylesheet" type="text/css" media="all" href="../style.css" />
            <link rel="stylesheet" type="text/css" media="all" href="../themes/brown/style.css" /> </head>

        <body>
            <div id="warp">
                <div id="main" class="container_16">
                    <div id="header" class="grid_16">
                        <div id="logo" class="grid_4 alpha">
                            <h1><a href="../index.php">Food Review</a></h1>
                            <h2></h2> </div>
                        <div id="headright" class="grid_7 prefix_5 omega">
                            <h3 class="login"><span class="hiUser"> </span> <span class="myAccount"><a href="#"> </a></span> <a href="#"></a></h3>
                            <p></p>
                            <p><span class="vChart"><a href="shoppingcart.html"></a></span> <span class="cOut"><a href="checkout.html"></a></span></p>
                        </div>
                    </div>
                    <div id="mainMenu" class="grid_16">
                        <ul>
                            <li><a href="../index.php">Home</a></li>
                            <li><a href="#">About</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </div>
                    <div id="stickySearch" class="grid_16">
                        <div class="stickyNews grid_12 alpha">
                            <p>
                                <a href="#" class="bookMan"></a>
                            </p>
                        </div>
                        <div class="search grid_4 omega">
                            <form action="#" method="get">
                                <input type="text" value="Type your keyword" id="s" name="s" onfocus="if (this.value == 'Type your keyword') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Type your keyword';}" /> </form>
                        </div>
                    </div>
                    <div class="checkout grid_16">
                        <div class="newAccount grid_8 alpha">
                            <h4>Create New Account</h4>
                            <form method="post" action="">
                                <fieldset>
                                    <label for="Name">Name: <span class="error">* <?php echo $nameErr;?></span></label>
                                    <input type="text" tabindex="1" size="22" value="" id="firstName" name="username" class="text" />
                                    <br />
                                    <br />
                                    <label for="email">Email: <span class="error">* <?php echo $emailErr;?></span></label>
                                    <input type="text" tabindex="3" size="50" value="" id="email" name="email" class="text" />
                                    <br />
                                    <label for="password1">Password:<span class="error">* <?php echo $pass1Err;?></span></label>
                                    <input type="password" tabindex="4" size="22" value="" id="password" name="password1" class="text" />
                                    <br />
                                    <label for="password2">Retype Password:<span class="error">* <?php echo $pass2Err;?></span></label>
                                    <input type="password" tabindex="5" size="22" value="" id="repassword" name="password2" class="text" />
                                    <br />
                                    <div class="clear"></div>
                                </fieldset>
                                <p>
                                    <input type="submit" value="Create New Account" tabindex="6" name="submit" class="newAccountButton" /> </p>
                                <input type="hidden" value="30" /> </form>
                        </div>
                        <div class="loginPage grid_8 omega">
                            <h4>Login</h4>
                            <form method="post" action="">
                                <fieldset>
                                    <label for="email2">Email:</label>
                                    <input type="text" tabindex="1" size="50" value="" id="email2" name="email" class="text" />
                                    <br />
                                    <label for="password">Password:</label>
                                    <input type="password" tabindex="2" size="22" value="" id="password" name="password" class="text" />
                                    <br />
                                    <label for="usertype"> User Type:</label>
                                    <select name="usertype">
                                        <option value="user">User</option>
                                        <option value="moderator">Moderator</option>
                                        <option value="admin">Admin</option>
                                    </select>
                                    <div class="clear"></div>
                                </fieldset>
                                <p>
                                    <input type="submit" value="Login" tabindex="3" name="submit_login" class="userLogin" /> </p>
                                <input type="hidden" value="30" /> </form>
                        </div>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
            <div id="richContent2">
                <div class="container_16">
                    <div class="lastTweet grid_4">
                        <h4></h4> </div>
                    <div class="corporateInfo grid_4">
                        <h4></h4> </div>
                    <div class="storeDelivery grid_4">
                        <h4></h4> </div>
                    <div class="socialNet grid_4">
                        <h4>Keep in touch</h4>
                        <ul>
                            <li><a href="#" class="facebook">Facebook</a></li>
                            <li><a href="#" class="twitter">Twitter</a></li>
                            <li><a href="#" class="feed">Feed</a></li>
                        </ul>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
            <div id="footer">
                <div class="container_16">
                    <div class="copyright grid_16">
                        <p class="left">Copyright &copy; 2017, FoodBuzz</p>
                        <p class="right"> </p>
                        <div class="clear"></div>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
        </body>

        </html>