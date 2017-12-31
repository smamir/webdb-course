<?php 
	require 'session.php';
    $sql1 = "SELECT restaurant.rid, restaurant.name FROM restaurant WHERE restaurant.approval = 'TRUE' ";
    $result = mysqli_query($conn, $sql1);

    $options='';
	while($row = mysqli_fetch_array($result))
	{
	    $options .= "<option value='" . $row['rid'] . "'>" .$row['name']. "</option>";
	} 

    if(isset($_POST["submit"])) {
    
    $email = $login_email;
    if ($usertype == 'admin' || $usertype == 'moderator') {
    	$approval = 'TRUE';
    }
    else {
    	$approval = 'FALSE';
    }

    $name = mysqli_real_escape_string($conn, $_POST['f_name']);
    
    $price = mysqli_real_escape_string($conn, $_POST['f_price']);

    $rid = mysqli_real_escape_string($conn, $_POST['r_name']);

    $sql = "INSERT INTO food (rid, name, price, addedBy, approval) VALUES ('$rid', '$name', '$price', '$email', '$approval')";


    if (mysqli_query($conn, $sql)) {
         echo '<script language="javascript">';
         echo 'alert("Record added to database!")';
         echo '</script>';
    } 
    else {
         echo "Error: " . $sql . "<br>" . mysqli_error($conn);
       }
}
?>
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <title>Food Review | Add</title>
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
                        <h1><a href="index.html">DapurKue</a></h1>
                        <h2>Famously Delicious</h2> </div>
                    <div id="headright" class="grid_7 prefix_5 omega">
                        <h3 class="login"><span class="hiUser">Hi, <?php echo $login_name;?> |</span> <span class="myAccount"><a href="#"></a></span> <a href="dashbordNew.php">Logout</a></h3>
                        <p></p>
                        <p><span class="vChart"><a href="shoppingcart.html"></a></span> <span class="cOut"><a href="checkout.html"></a></span></p>
                    </div>
                </div>
                <div id="mainMenu" class="grid_16">
                    <ul>
                        <li><a href="../index.php">Home</a></li>
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
                <div class="pageInfo grid_16">
                    <div class="dapurBlog grid_11 alpha">
                        <h3></h3> </div>
                </div>
                <div class="checkout grid_16">
                    <div class="billInfo grid_11 alpha">
                        <h4>Add a new food item in the system</h4>
                        <!-- <a href="#" class="sameInfo"></a> -->
                        <form method="post" action="" id="comment_form">
                            <fieldset>
                                <label for="r_name">Restaurant: </label>
                                <select name="r_name">
                                    <? echo $options; ?>
                                </select>
                                <br />
                                <label for="r_area">Area:</label>
                                <input type="text" tabindex="3" size="50" value="" id="r_area" name="r_area" class="text" required/>
                                <br />
                                <label for="address">Address Details:</label>
                                <input type="text" tabindex="4" size="50" value="" id="address" name="r_address" class="text" required/>
                                <br />
                                <div class="clear"></div>
                            </fieldset>
                            <h2><a href="dashbordNew.php" id="" class="button">Back</a></h2>
                            <input type="submit" name="submit" value="Add Item">
                            <input type="reset" value="Reset Fields"> </form>
                    </div>
                    <div class="summary grid_5 omega">
                        <h4></h4>
                        <div class="sumWarp"> </div>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
        </div>
        <div id="richContent2">
            <div class="container_16">
                <div class="lastTweet grid_4"> </div>
                <div class="corporateInfo grid_4"> </div>
                <div class="storeDelivery grid_4"> </div>
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
                    <p class="left">Copyright &copy; 2017, Web Deb</p>
                    <p class="right">
                        <a href="http://tokokoo.com/"></a>
                        <a href="http://www.instantshift.com/"></a>
                    </p>
                    <div class="clear"></div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </body>

    </html>