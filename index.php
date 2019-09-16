<?php
    include("includes/db.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LGED ECOMMERCE</title>
    <link rel="stylesheet" href="styles/style.css?version=2" media= "all"/>
</head>
<body>
               <!-- main container -->
    <div class="main_wrapper">  

    <!-- header starts from here -->
        <div class="header_wrapper">
            <img src="images/logo.png" alt="" style="float:left;"> 
            <img src="images/adgif.gif" alt="" style="float:right;">
        </div>
        <!-- header ends here -->

        <!-- navigation bar starts -->
        <div id="navbar">
            <ul id="menu">
                <li><a href="#">Home</a></li>
                <li><a href="#">All Products</a></li>
                <li><a href="#">My Account</a></li>
                <li><a href="#">Sign Up</a></li>
                <li><a href="#">Shopping Cart</a></li>
                <li><a href="#">Contact Us</a></li>
            </ul>


            <!-- Search box -->
            <div id="form">
                <form action="result.php" method="get" enctype="multipart/form-data">
                    
                    <input type="text" name="user_query" placeholder="Search a Product">
                    <input type="submit" name="search" value="Search">

                </form>
            </div>
             <!-- Search box -->

        </div>
        <!-- navigation bar ends -->

        <!-- contents starts -->
        <div class="content_wrapper">

            <!-- Left side bar -->
            <div id="left_sidebar">

                <div id="sidebar_tittle">Categories</div>

                <ul id="category">
                <?php
                        $get_cats ="Select * from categories";
                        $run_cats = mysqli_query($con,$get_cats);

                        while($row_cats = mysqli_fetch_array($run_cats)){
                            $cat_id =$row_cats['cat_id'];
                            $cat_tittle = $row_cats['cat_tittle'];

                            echo "<li><a href='index.php?cat=$cat_id'>$cat_tittle</a></li>";
                        }
                    ?>
                    
                </ul>

                <div id="sidebar_tittle">Brands</div>
                <ul id="category">

                <?php
                        $get_brands ="Select * from brands";
                        $run_brands = mysqli_query($con,$get_brands);

                        while($row_brands = mysqli_fetch_array($run_brands)){
                            $brand_id =$row_brands['brand_id'];
                            $brand_tittle = $row_brands['brand_tittle'];

                            echo "<li><a href='index.php?brand=$brand_id'>$brand_tittle</a></li>";
                        }
                    ?> 
                    
                    
                </ul>

            </div>

                <!-- Left side bar -->

                  <!-- RIGHT side bar -->

            <div id="right_content">right side</div>
        </div>
        <!-- contents ends -->


        <div class="footer">
            <h1 style="color:#000; padding-top:30px; text-align:center">&copy; 2019 -BY NAYEEM HASAN</h1>
        </div>
        
    
    </div>
</body>
</html> 