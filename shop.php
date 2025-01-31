<?php
    include('server/connection.php');
    include('server/get_discover_product.php');

    $statement = $conn->prepare("SELECT * FROM products");
    $statement->execute();
    $products= $statement->get_result();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <linkerel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
</head>
<body>
    <section id="header">
        <a href="#" class="logo"><p>Shopii</p></a>

        <div>
            <ul id="navbar">
                <li><a href="index.html">Home</a></li>
                <li><a class="active" href="shop.html">Shop</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="contact.html">Contact</a></li>
                <li class="cart-icon"><a href="cart.html"><img class="cart-img" src="assets/images/parcel.png" alt="shopping-bag-icon"></a></li>
                <a href="#"><img id="close" src="assets/images/close.png" alt="close button"></a>
            </ul>
        </div>
        <div id="mobile">
                <a href="cart.html"><img src="assets/images/parcel.png" alt="shopping-bag-icon"></a>
                <img  id="bar" src="assets/images/hamburger.png" alt="hamburger icon">
        </div>
    </section>

    <!-- Shop Items Section-->
    <section id="discover">
    <h2>Our Products</h2>
    <div class="dis-container">
        <?php while($row = $products->fetch_assoc()){ ?>
            <div class="dis" onclick="window.location.href='single_product.php?product_id=<?php echo $row['product_id'] ?>'">
                <img src="assets/images/Discover/<?php echo $row['product_image']; ?>" alt="loose fit crew-neck cotton color grey">
                <div class="des">
                    <span><?Php echo $row['product_name']; ?></span>
                    <span>$<?php echo calculatePrice($row['product_price'], $row['product_special_discount']) ?>
                        <span class="del">$<?php echo  displayPrice($row['product_price'], $row['product_special_discount'])?></span>
                    </span>
                </div>
            </div>
        <?php }?>
    </div>
    <div class="pagination">
        <ul>
            <li class="page-item"><a href="#" class="page-link">Previous</a></li>
            <li class="page-item"><a href="#" class="page-link">1</a></li>
            <li class="page-item"><a href="#" class="page-link">2</a></li>
            <li class="page-item"><a href="#" class="page-link">3</a></li>
            <li class="page-item"><a href="#" class="page-link">Next</a></li>
        </ul>
    </div>
    </section>

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
                    <a href="#">Home</a>
                    <a href="#" class="active"><li>Shop</li></a>
                    <a href="#"><li>About</li></a>
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