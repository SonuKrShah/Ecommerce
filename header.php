<?php
require("connection.inc.php");
require("functions.inc.php");

$sql = "SELECT * from categories order by category";
$res = mysqli_query($con, $sql);
$catArray = [];
while ($row = mysqli_fetch_assoc($res)) {
    if ($row['status'] == 1)
        $catArray[] = $row;
}
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Ecommerce</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="./images/favicon.ico">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">

    <!-- All css files are included here. -->
    <!-- Bootstrap fremwork main css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Owl Carousel min css -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <!-- This core.css file contents all plugings css file. -->
    <link rel="stylesheet" href="css/core.css">
    <!-- Theme shortcodes/elements style -->
    <link rel="stylesheet" href="css/shortcode/shortcodes.css">
    <!-- Theme main style -->
    <link rel="stylesheet" href="style.css">
    <!-- Responsive css -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- User style -->
    <link rel="stylesheet" href="css/custom.css">

    <!-- Modernizr JS -->
    <script src="js/vendor/modernizr-3.5.0.min.js"></script>
</head>

<body>
    <!-- Body main wrapper start -->
    <div class="wrapper">
        <!-- Start Header Style -->
        <header id="htc__header" class="htc__header__area header--one">
            <!-- Start Mainmenu Area -->
            <div id="sticky-header-with-topbar" class="mainmenu__wrap sticky__header">
                <div class="container">
                    <div class="row">
                        <div class="menumenu__container clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5">
                                <div class="logo">
                                    <a href="index.php"><img src="images/logo/4.png" alt="logo images"></a>
                                </div>
                            </div>
                            <div class="col-md-7 col-lg-8 col-sm-5 col-xs-3">
                                <nav class="main__menu__nav hidden-xs hidden-sm">
                                    <ul class="main__menu">
                                        <li class="drop"><a href="index.php">Home</a></li>
                                        <!-- Here we will create a navitem for each item in the categories section -->
                                        <?php foreach ($catArray as $list) { ?>
                                            <li class="drop"><a href="categories.php?id=<?php echo $list['id'] ?>"><?php echo $list['category'] ?></a></li>
                                        <?php } ?>
                                        <li><a href="contact.html">contact</a></li>
                                    </ul>
                                </nav>

                                <div class="mobile-menu clearfix visible-xs visible-sm">
                                    <nav id="mobile_dropdown">
                                        <ul>
                                            <li><a href="index.html">Home</a></li>
                                            <?php foreach ($catArray as $list) { ?>
                                                <li class="drop"><a href="categories.php?id=<?php echo $list['id'] ?>"><?php echo $list['category'] ?></a></li>
                                            <?php } ?>
                                            <li><a href="contact.html">contact</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-md-3 col-lg-2 col-sm-4 col-xs-4">
                                <div class="header__right" title="Search">
                                    <div class="header__search search search__open">
                                        <a href="#"><i class="icon-magnifier icons"></i></a>
                                    </div>

                                    <?php if(isset($_SESSION['USER'])) { ?>
                                    <div class="header__account" title="My Profile">
                                        <a href="#"><i class="icon-user icons"></i></a>
                                    </div>
                                    <?php } else {?>
                                        <div class="header__account" title="My Profile">
                                        <a href="#">Login/Register</a>
                                    </div>
                                    <?php } ?>
                                    <div class="htc__shopping__cart" title="View Cart">
                                        <a class="cart__menu" href="#"><i class="icon-handbag icons"></i></a>
                                        <a href="#"><span class="htc__qua">0</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mobile-menu-area"></div>
                </div>
            </div>
            <!-- End Mainmenu Area -->
        </header>