<?php 
	require 'session.php';

?>
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <title>Food Review | Dashboard</title>
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
                        <h3 class="login"><span class="hiUser">Hi <?php echo $login_name;?> |</span> <span class="myAccount"><a href="#"><?php echo $usertype;?></a></span> <a href="logout.php">Logout</a></h3>
                        <p></p>
                        <p><span class="vChart"><a href="shoppingcart.html"></a></span> <span class="cOut"><a href="checkout.html"></a></span></p>
                    </div>
                </div>
                <div id="mainMenu" class="grid_16">
                    <ul>
                        <li><a href="dashbordNew.php">Home</a></li>
                        <li> <a href="add_restaurantNew.php">Add New Restaurant</a></li>
                        <li><a href="add_foodNew.php">Add New Food</a></li>
                        <li><a href="r_reviewNew.php">Restaurant Review</a></li>
                        <li><a href="select_r.php">Food Review</a></li>
                    </ul>
                </div>
                <div id="stickySearch" class="grid_16">
                    <!-- <div class="stickyNews grid_12 alpha">
                        <p>
                            <a href="#" class="bookMan"></a>
                        </p>
                    </div>
                    <div class="search grid_4 omega">
                        <form action="#" method="get">
                            <input type="text" value="Type your keyword" id="s" name="s" onfocus="if (this.value == 'Type your keyword') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Type your keyword';}" /> </form>
                    </div> -->
                </div>
                <div class="pageInfo grid_16">
                    <div class="dapurBlog grid_11 alpha">
                        <h3>Dashboard</h3> </div>
                </div>
                <div class="checkout grid_16">
                    <div class="billInfo grid_11 alpha">
                        <h4></h4>
                        <form method="post" action="#" id="comment_form">
                            <fieldset>
                                <?php if ($usertype=='admin') {?>
                                    <dl> <dt>
                            <?php echo '<a href="restaurants.php" target="_blank">All Restaurants</a>'; ?>
                  </dt> </dl>
                                    <dl> <dt>
                            <?php echo '<a href="foods.php" target="_blank">All Food Item</a>'; ?>
                  </dt> </dl>
                                    <dl> <dt>
                            <?php echo '<a href="restaurant_r.php" target="_blank">All Restaurant Reviews</a>'; ?>
                  </dt> </dl>
                                    <dl> <dt>
                            <?php echo '<a href="food_r.php" target="_blank">All Food Reviews</a>'; ?>
                  </dt> </dl>
                                    <?php } else if(($usertype=='moderator')){ ?>
                                        <dl> <dt>
                            <?php echo '<a href="restaurants.php" target="_blank">Restaurants You Added</a>'; ?>
                  </dt> </dl>
                                        <dl> <dt>
                            <?php echo '<a href="foods.php" target="_blank">All Food Item</a>'; ?>
                  </dt> </dl>
                                        <dl> <dt>
                            <?php echo '<a href="restaurant_r.php" target="_blank">All Restaurant Reviews</a>'; ?>
                  </dt> </dl>
                                        <dl> <dt>
                            <?php echo '<a href="food_r.php" target="_blank">All Food Reviews</a>'; ?>
                  </dt> </dl>
                                        <?php } else{ ?>
                                            <dl> <dt>
                            <?php echo '<a href="restaurants.php" target="_blank">Restaurants You Added</a>'; ?>
                  </dt> </dl>
                                            <dl> <dt>
                            <?php echo '<a href="foods.php" target="_blank">Food Item You Added</a>'; ?>
                  </dt> </dl>
                                            <dl> <dt>
                            <?php echo '<a href="restaurant_r.php" target="_blank">All Restaurant Reviews</a>'; ?>
                  </dt> </dl>
                                            <dl> <dt>
                            <?php echo '<a href="food_r.php" target="_blank">Food Reviews You Added</a>'; ?>
                  </dt> </dl>
                                            <?php } ?>
                            </fieldset>
                            <input type="hidden" value="30" name="comment_post_ID" /> </form>
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
                    <p class="left">Copyright &copy; 2017, FoodBuzz</p>
                    <p class="right"> </p>
                    <div class="clear"></div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </body>

    </html>