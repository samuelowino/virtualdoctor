<?php
session_start();
include("../assets/includes/connection.php");
include("../assets/function/function.php");
?>
<?php

    if(isset($_GET['pro_id']) | isset($_GET['add_cart'])){
        $product_id = $_GET['pro_id'];
        $cc_id = $_GET['pro_id'];
        $get_product = "select * from products where product_id='$product_id' or product_id='$cc_id'";
        $run_product = mysqli_query($con,$get_product);
        $row_product = mysqli_fetch_array($run_product);

        $p_cat_id = $row_product['p_cat_id'];
        $cat_id = $row_product['cat_id'];
        $manufacturer_id = $row_product['manufacturer_id'];
 
        $pro_title = $row_product['product_title'];
        $pro_price = $row_product['product_price'];
        $pro_desc = $row_product['product_desc'];
        $pro_img1 = $row_product['product_img1'];
        $pro_img2 = $row_product['product_img2'];
        $pro_img3 = $row_product['product_img3'];
        $pro_desc = $row_product['product_desc'];
        $pro_features = $row_product['product_features'];
        $get_p_cat = "select * from product_categories where p_manufacturer_id='$p_cat_id'";
        $run_p_cat = mysqli_query($con,$get_p_cat);
        $row_p_cat = mysqli_fetch_array($run_p_cat);
        $p_cat_title = $row_p_cat['p_cat_title'];
        
        $get_cat = "select * from categories where cat_id='$cat_id'";
        $run_cat = mysqli_query($con,$get_cat);
        $row_cat = mysqli_fetch_array($run_cat);
        $cat_title = $row_p_cat['cat_title'];
        
        $get_manufacturer_id = "select * from manufacturers where manufacturer_id='$manufacturer_id'";
        $run_manufacturer_id = mysqli_query($con,$get_manufacturer_id);
        $row_manufacturer_id = mysqli_fetch_array($run_manufacturer_id);
        $cat_manufacturer_title = $row_manufacturer_id['manufacturer_title'];
    }

?>
<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <title>Medicus |
        <?php echo $pro_title;?>
    </title>
    <link rel="stylesheet" type="text/css" href="fonts/css/fontawesome-all.min.css">
    <link rel="stylesheet" type="text/css" href="styles/framework.css">
    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i|Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
</head>

<body>
    <div id="page-transitions" class="page-build light-skin highlight-blue">
        <link rel="stylesheet" type="text/css" href="styles/framework-store.css">
        <div id="menu-hider"></div>
        <div id="menu-list" data-selected="menu-pages" data-load="menu-list.php" data-height="415" class="menu-box menu-load menu-bottom"></div>
    
        <div id="menu-find" data-load="menu-find.php" data-height="420" class="menu-box menu-load menu-bottom"></div>
        <div class="header header-scroll-effect">
            <div class="header-line-1 header-hidden header-logo-app">
                <a href="#" class="back-button header-logo-title">Back to Store</a>
                <a href="#" class="back-button header-icon header-icon-1"><i class="fa fa-angle-left"></i></a>
                <a href="#" data-menu="menu-cart" class="header-icon header-icon-2"><i class="fa fa-shopping-bag"></i></a>
                <a href="#" data-menu="menu-find" class="header-icon header-icon-3"><i class="fa fa-search"></i></a>
                <a href="#" data-menu="menu-list" class="header-icon header-icon-4"><i class="fa fa-bars"></i></a>
        
            </div>
            <div class="header-line-2 header-scroll-effect">
                <a href="#" class="header-pretitle header-date color-highlight"></a>
                <a href="#" class="header-title">Pharmacy</a>
                <a href="#" data-menu="menu-list" class="header-icon header-icon-1"><i class="fa fa-bars"></i></a>
                <a href="#" data-menu="menu-cart" class="header-icon header-icon-3"><i class="fa fa-shopping-bag"></i></a>
                 <a href="#" data-menu="menu-find" class="header-icon header-icon-2"><i class="fa fa-search"></i></a>
             
            </div>
        </div>
        
        <div id="page-transitions" class="page-build light-skin highlight-blue">
        <link rel="stylesheet" type="text/css" href="styles/framework-store.css">
        <div id="menu-hider"></div>
        <div id="menu-list" data-selected="menu-pages" data-load="menu-list.php" data-height="415" class="menu-box menu-load menu-bottom"></div>
        <div id="menu-demo" data-load="menu-demo.php" data-height="210" class="menu-box menu-load menu-bottom"></div>
        <div class="header header-scroll-effect">
            <div class="header-line-1 header-hidden header-logo-app">
                <a href="pharmacy.php" class="back-button header-logo-title">Back to Store</a>
                <a href="#" class="back-button header-icon header-icon-1"><i class="fa fa-angle-left"></i></a>
                <a href="#" data-menu="menu-cart" class="header-icon header-icon-2"><i class="fa fa-shopping-bag"></i></a>
                <a href="#" data-menu="menu-list" class="header-icon header-icon-4"><i class="fa fa-bars"></i></a>
                <a href="#" data-menu="menu-demo" class="header-icon header-icon-3"><i class="fa fa-cog"></i></a>
            </div>
            <div class="header-line-2 header-scroll-effect">
                <a href="#" class="header-pretitle header-date color-highlight"></a>
                <a href="#" class="header-title font-22">
                    <?php echo $pro_title;?></a>
                <a href="#" data-menu="menu-list" class="header-icon header-icon-1"><i class="fa fa-bars"></i></a>
                <a href="#" data-menu="menu-cart" class="header-icon header-icon-3"><i class="fa fa-shopping-bag"></i></a>
                <a href="#" data-menu="menu-demo" class="header-icon header-icon-2"><i class="fa fa-cog"></i></a>
            </div>
        </div>
                <!--cart section-->
        <div id="menu-cart" data-height="420" class="menu-box menu-bottom">
            <div class="menu-title">
                <span class="color-highlight">Your Products</span>
                <h1>Your Cart</h1>
                <a href="#" class="menu-hide"><i class="fa fa-times"></i></a>
            </div>
            <div class="content bottom-0">
     <?php  mCart();?>
            </div>
             <button style="margin-top: 50px;" class="button button-blue button-icon button-full button-sm shadow-small top-15 button-rounded uppercase ultrabold"><a style="color: white" href="checkout.php">
                            <i class="fa fa-shopping-bag"></i>
                            checkout</a>
                        </button>
        </div>

        <!--cart section-->


  



        <div class="page-content header-clear-large">
            <div class="single-slider owl-carousel owl-has-dots gallery bottom-30">
                <a class="show-gallery" href="#"><img src="../admin/product_images/<?php echo $pro_img1; ?>" alt=""></a>
            </div>
            <div class="content">
                <div class="store-product">
                   <h1>Company</h1>
                    <h2 class="store-product-title">
                        <?php echo $cat_manufacturer_title;?>
                    </h2>
                    <span class="store-product-price"><strong>
                            <?php echo "৳ $pro_price" ;?></strong></span>
                </div>
                <div class="bottom-10 top-25">
                    <?php

                                add_cart();

                                ?>
                    <form action="details.php?add_cart=<?php echo $product_id;?>" method="post" class="form-horizontal">
                        <input type="hidden" name="product_price" value="<?php echo $pro_price;  ?>">
                        <label for="quantity">Please type your Quantity</label>
                        <input type="text" class="qty btn" value="1" name="product_qty">

                        <div class="decoration top-30 bottom-30"></div>

                        <button class="button button-blue button-icon button-full button-sm shadow-small top-15 button-rounded uppercase ultrabold" type="submit" name="add_cart">
                            <i class="fa fa-shopping-cart"></i>
                            Add To Cart
                        </button>
                        <button name="add_wishlist" class="button button-red button-icon button-full button-sm shadow-small top-15 bottom-30 button-rounded uppercase ultrabold" type="submit" name="add_wishlist">
                            <i class="fa fa-heart"></i> Add to Wishlist

                        </button>
                    </form>
                    <div class="decoration top-30"></div>
                </div>
                <div class="content-title bottom-20 top-30">
                    <span class="color-highlight">Description</span>
                    <h1>Medicine Description</h1>
                </div>
                <div class="content">
                    <div class="container">
                        <p class="bottom-0">
                            <?php echo $pro_desc; ?>

                        </p>

                    </div>
                    <div class="decoration"></div>
                </div>
                <div class="content-title bottom-20 top-30">
                    <span class="color-highlight">Uses Guide</span>
                    <h1>Medicine Uses</h1>
                </div>
                <div class="content">
                    <p>
                        <?php echo $pro_features; ?>
                    </p>
                    <div class="decoration"></div>
                </div>

                <div class="decoration decoration-margins"></div>
                <div class="content-title bottom-30 top-30">
                    <span class="color-highlight">COntrols</span>
                    <h1>Useful Links</h1>
                </div>
                <div class="content">
                    <div class="store-links bottom-15">
                        <a href="#"><i class="fa fa-user"></i>Your Account</a>
                        <a href="#"><i class="fa fa-credit-card"></i>Payment Methods</a>
                        <a href="#"><i class="fa fa-pencil-alt"></i>Terms of Service</a>
                        <a href="#"><i class="fa fa-code"></i>Create Account</a>
                        <a href="#"><i class="fa fa-lock"></i>Logout Account</a>
                        <a href="#"><i class="fa fa-shopping-cart"></i>Shopping Cart</a>
                        <a href="#"><i class="fa fa-truck"></i>Delivery Times</a>
                        <a href="#"><i class="fa fa-sync"></i>Refund Policy</a>
                        <a href="#"><i class="fa fa-question"></i>Help Center</a>
                        <a href="#"><i class="fa fa-exclamation"></i>Report Issue</a>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
                <?php include("footer.php"); ?>