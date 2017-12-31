<?php 
	require 'session.php';
    $sql1 = "SELECT restaurant.rid, restaurant.name FROM restaurant WHERE restaurant.approval='TRUE'";
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

    $rating = mysqli_real_escape_string($conn, $_POST['rating']);
    
    $review = mysqli_real_escape_string($conn, $_POST['review']);

    $rid = mysqli_real_escape_string($conn, $_POST['r_name']);

    $sql2 = "SELECT * FROM r_review WHERE r_review.rid='$rid' AND r_review.addedBy='$email' ";
    $res = mysqli_query($conn, $sql2);

    if (mysqli_num_rows($res) > 0) {
        echo '<script language="javascript">';
        echo 'alert("You already added review for this restaurant! Please use the update option.")';
        echo '</script>';
    }
    else {
        $sql = "INSERT INTO r_review (rid, addedBy, rating, review, approval) VALUES ('$rid', '$email', '$rating', '$review', '$approval')";


        if (mysqli_query($conn, $sql)) {
             echo '<script language="javascript">';
             echo 'alert("Record added to database!")';
             echo '</script>';
        } 
        else {
             echo "Error: " . $sql . "<br>" . mysqli_error($conn);
           }
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
                        <h3><span class="vChart"></span> <span class="cOut"><a href="checkout.html"></a></span></h3> </div>
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
                        <h4>Give a restaurant revie</h4>
                        <!-- <a href="#" class="sameInfo"></a> -->
                        <form method="post" action="" id="comment_form">
                            <fieldset>
                                <label for="r_name">Restaurant: </label>
                                <select name="r_name">
                                    <?php echo $options; ?>
                                </select>
                                <br />
                                <label for="rating">Rating:</label>
                                <select name="rating">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                                <br />
                                <label for="address">Review :</label>
                                <textarea rows="10" cols="25" name="review"></textarea>
                                <br/>
                                <div class="clear"></div>
                            </fieldset>
                            <h2>
                            <input type="submit" name="submit" value="Save Review">
            <input type="reset" value="Reset Fields">
                   <a href="dashbordNew.php" id="" class="button">Go Back</a></h2> </form>
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