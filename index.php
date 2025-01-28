<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shoppi | Your Choice</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <linkerel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
</head>
<body>
    <!--Search and Account Section-->
    <section id="search">
        <a href="account.html"><img src="assets/images/search/profile.png" alt="profile"></a>
        <div class="search-area">
            <input type="search" class="search">
            <a href="#"><img class="search-icon" src="assets/images/search/magnifying-glass.png" alt="search" title="search"></a>
        </div>
    </section>
    <!-- Navbar -->
    <section id="header">
        <a href="#" class="logo"><p>Shopii</p></a>

        <div>
            <ul id="navbar">
                <li><a class="active" href="index.html">Home</a></li>
                <li><a href="shop.html">Shop</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="contact.html">Contact</a></li>
                <li class="cart-icon"><a href="cart.php"><img class="cart-img" src="assets/images/parcel.png" alt="shopping-bag-icon"></a></li>
                <a href="#"><img id="close" src="assets/images/close.png" alt="close button"></a>
            </ul>
        </div>
        <div id="mobile">
                <a href="cart.html"><img src="assets/images/parcel.png" alt="shopping-bag-icon"></a>
                <img  id="bar" src="assets/images/hamburger.png" alt="hamburger icon">
        </div>
    </section>

    <!-- Hero section-->
     <section id="hero">
        <h4>Trade-in-offer</h4>
        <h2>Super value deals</h2>
        <h1>On all products</h1>
        <p>Save more with Black Friday deals & up to 50% discounts!</p>
        <button>Shop Now</button>
     </section>

     <!-- Feautures-->
      <section id="feature" class="section-p1">
        <div class="fe-box">
            <img src="assets/images/feautures/f1.png" alt="smartphone image">
            <h6>Free Shipping</h6>
        </div>
        <div class="fe-box">
            <img src="assets/images/feautures/f2.png" alt="sheeping time">
            <h6>Onine Order</h6>
        </div>
        <div class="fe-box">
            <img src="assets/images/feautures/f3.png" alt="saving pig">
            <h6>Save Money</h6>
        </div>
        <div class="fe-box">
            <img src="assets/images/feautures/f4.png" alt="lady promoting">
            <h6>Promotion</h6>
        </div>
        <div class="fe-box">
            <img src="assets/images/feautures/f5.png" alt="Black Friday Sale">
            <h6>Black Friday</h6>
        </div>
        <div class="fe-box">
            <img src="assets/images/feautures/f6.png" alt="Costomer support">
            <h6>24/7 support</h6>
        </div>
      </section>

    <!-- Discover Section-->
    <section id="discover">
        <h2>Discover What's New</h2>
        <p>New products in stock</p>
        <div class="dis-container">
            <?php include('server/get_discover_product.php'); ?> 
            <?php while($row = $discoverProducts->fetch_assoc()) { ?>
                <div class="dis">
                    <a href="single_product.php?product_id=<?php echo $row['product_id']?>"><img src="assets/images/Discover/<?php echo $row['product_image']?>" alt="loose fit crew-neck cotton color grey"></a>
                    <div class="des">
                        <span><?php echo $row['product_name']?></span>
                        <span>$<?php echo calculatePrice($row['product_price'], $row['product_special_discount']) ?>
                            <span class="del">$<?php echo  displayPrice($row['product_price'], $row['product_special_discount'])?></span>
                        </span>
                    </div>
                </div>
            <?php }?>
        </div>
    </section>

    <!-- Footer section-->
    <footer>
        <div class="container">
            <div class="foo-sign">
                <a href="#" class="logo"><p>Shopii</p></a>
                <p>sign up for 15% off</p>
                <input type="email" placeholder="Email">
                <div class="foo-socials">
                    <img src="assets/images/svg icons/icons8-facebook.svg" alt="facebook">
                    <img src="assets/images/svg icons/icons8-instagram.svg" alt="instagram">
                    <img src="assets/images/svg icons/icons8-x.svg" alt="twitter">
                    <img src="assets/images/svg icons/icons8-pinterest.svg" alt="pinterest">
                </div>
            </div>
            <div class="wrap-foo-sec">
                <div class="foo-sec">
                    <h4>Quick Links</h4>
                    <ul>
                        <a href="index.html" class="active">Home</a>
                        <a href="shop.html"><li>Shop</li></a>
                        <a href="about.html"><li>About</li></a>
                    </ul>
                </div>
                <div class="foo-sec">
                    <h4>Shop</h4>
                    <ul>
                        <a href="#"><li>T-Shirt</li></a>
                        <a href="#"><li>Hoodies</li></a>
                        <a href="#"><li>Pants</li></a>
                    </ul>
                </div>
                <div class="foo-sec">
                    <h4>support</h4>
                    <ul>
                        <li>&#63 Help Center</li>
                        <li>&#9742 +25192343433</li>
                        <li>&#128231 shopii@webproject.com</li>
                    </ul>
                </div>
            </div>
       </div>
        <p class="copy">&#169 2024 All rights reserved.</p>
    </footer>
    <script src="assets/js/script.js"></script>
</body> 
</html>