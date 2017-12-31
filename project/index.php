<?php //require 'session.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <title>Food Review</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" media="all" href="styles/960.css" />
    <link rel="stylesheet" type="text/css" media="all" href="styles/reset.css" />
    <link rel="stylesheet" type="text/css" media="all" href="styles/text.css" />
    <link rel="stylesheet" type="text/css" media="all" href="style.css" />
    <link rel="stylesheet" type="text/css" media="all" href="themes/brown/style.css" />
    <script type="text/javascript" src="scripts/jquery-1.4.2.js"></script>
    <script type="text/javascript" src="scripts/jquery.tools.min.js"></script>
    <script type="text/javascript" src="scripts/dapur.js"></script>
</head>

<body>
    <div id="warp">
        <div id="main" class="container_16">
            <div id="header" class="grid_16">
                <div id="logo" class="grid_4 alpha">
                    <h1><a href="index.php">Food Review</a></h1>
                    <h2>Famously Delicious</h2> </div>
                <div id="headright" class="grid_7 prefix_5 omega">
                    <h3 class="login"><a href="backend/registerNew.php">Sign up</a> / <a href="backend/registerNew.php">Login</a></h3>
                    <p></p>
                    <p></p>
                </div>
            </div>
            <div id="mainMenu" class="grid_16">
                <ul>
                    <li><a href="index.php" class="aActive">Home</a></li>
                    <li><a href="#">View Restaurants</a></li>
                    <li><a href="#">View Food Items</a></li>
                    <li><a href="#">Search</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
            <!-- <div id="stickySearch" class="grid_16">
                <div class="stickyNews grid_12 alpha">
                    <p></p>
                </div>
                <div class="search grid_4 omega">
                    <form action="#" method="get">
                        <input type="text" value="Type your keyword" id="s" name="s" onfocus="if (this.value == 'Type your keyword') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Type your keyword';}" /> </form>
                </div>
            </div> -->
            <div class="products grid_16">
                <div class="productsWarp">
                    <ul>
                        <li>
                            <a href="product-overview.html"><img src="images/cake1.jpg" alt="" width="938" height="398" /></a>
                        </li>
                        <li>
                            <a href="product-overview.html"><img src="images/cake2.jpg" alt="" width="938" height="398" /></a>
                        </li>
                        <li>
                            <a href="product-overview.html"><img src="images/cake3.jpg" alt="" width="938" height="398" /></a>
                        </li>
                        <li>
                            <a href="product-overview.html"><img src="images/cake3.jpg" alt="" width="938" height="398" /></a>
                        </li>
                        <li>
                            <a href="product-overview.html"><img src="images/cake3.jpg" alt="" width="938" height="398" /></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="productThumb grid_10 prefix_3 suffix_3">
                <ul>
                    <li class="grid_2 alpha">
                        <!-- <a href="#"><img src="images/thumb1.jpg" alt="" width="100" height="60" /></a> -->
                    </li>
                    <li class="grid_2">
<!--                         <a href="#"><img src="images/thumb2.jpg" alt="" width="100" height="60" /></a>
 -->                    </li>
                    <li class="grid_2">
<!--                         <a href="#"><img src="images/thumb1.jpg" alt="" width="100" height="60" /></a>
 -->                    </li>
                    <li class="grid_2">
<!--                         <a href="#"><img src="images/thumb2.jpg" alt="" width="100" height="60" /></a>
 -->                    </li>
                    <li class="grid_2 omega">
<!--                         <a href="#"><img src="images/thumb1.jpg" alt="" width="100" height="60" /></a>
 -->                    </li>
                </ul>
            </div>
        </div>
        <div class="clear"></div>
    </div>
    <div id="fresh">
        <div class="container_16">
            <div id="freshCake" class="grid_16">
                <div class="grid_1 alpha"> <a class="prevButton">&laquo;</a></div>
                <div class="headLine grid_14">
                    <!-- <h3>Fresh from the oven</h3> --> </div>
                <div class="grid_1 omega"> <a class="nextButton">&raquo;</a></div>
            </div>
            <div class="newCakes">
            <form action="backend/maps_search.php" method="post" target="_blank">
                <input type="text" name="search" id="search" value="" placeholder="area"> &nbsp
                <input type="submit" name="submit" value="Search in Google Maps">
            </form>
            <br>
            <form action="backend/db_search.php" method="post" target="_blank">
                <input type="text" name="search" id="search" value="" placeholder="area"> &nbsp
                <input type="submit" name="submit" value="Search in Database">
            </form>




                <div class="scroller">
                    <div class="newCake">
                       <!--  <a href="product-details.html" class="grid_4"><img src="images/freshCake1.jpg" alt="" width="220" height="120" /></a> -->
                    </div>
                    <div class="newCake">
                       <!--  <a href="product-details.html" class="grid_4"><img src="images/freshCake2.jpg" alt="" width="220" height="120" /></a> -->
                    </div>
                    <div class="newCake">
                        <!-- <a href="product-details.html" class="grid_4"><img src="images/freshCake3.jpg" alt="" width="220" height="120" /></a> -->
                    </div>
                    <div class="newCake">
<!--                         <a href="product-details.html" class="grid_4"><img src="images/freshCake4.jpg" alt="" width="220" height="120" /></a>
 -->                    </div>
                    <div class="newCake">
<!--                         <a href="product-details.html" class="grid_4"><img src="images/freshCake2.jpg" alt="" width="220" height="120" /></a>
 -->                    </div>
                    <div class="newCake">
<!--                         <a href="product-details.html" class="grid_4"><img src="images/freshCake3.jpg" alt="" width="220" height="120" /></a>
 -->                    </div>
                    <div class="newCake">
<!--                         <a href="product-details.html" class="grid_4"><img src="images/freshCake4.jpg" alt="" width="220" height="120" /></a>
 -->                    </div>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
    <!-- <div id="richContent">
        <div class="container_16">
            <div class="popularCakes grid_4">
                <h4>Popular Cakes</h4>
                <ul>
                    <li><a href="#">Ultimate Choco Brownie</a></li>
                    <li><a href="#">Mokakokoa Brownie</a></li>
                    <li><a href="#">CoffeeBrown</a></li>
                    <li><a href="#">Delicacheese</a></li>
                    <li><a href="#">Berries Cheesecake</a></li>
                </ul>
            </div>
            <div class="recommended grid_4">
                <h4>Recommended</h4>
                <ul>
                    <li><a href="#">Ultimate Choco Brownie</a></li>
                    <li><a href="#">Mokakokoa Brownie</a></li>
                    <li><a href="#">CoffeeBrown</a></li>
                    <li><a href="#">Delicacheese</a></li>
                    <li><a href="#">Berries Cheesecake</a></li>
                </ul>
            </div>
            <div class="specialOffer grid_4">
                <h4>Special Offer</h4>
                <ul>
                    <li><a href="#">Ultimate Choco Brownie</a></li>
                    <li><a href="#">Mokakokoa Brownie</a></li>
                    <li><a href="#">CoffeeBrown</a></li>
                    <li><a href="#">Delicacheese</a></li>
                    <li><a href="#">Berries Cheesecake</a></li>
                </ul>
            </div>
            <div class="orderPhone grid_4">
                <h4><em>Order by Phone</em> <span>987-654-321</span></h4> </div>
            <div class="clear"></div>
        </div>
    </div> -->
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