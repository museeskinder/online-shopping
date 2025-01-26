<?php
    include('server/connection.php');
    include('server/get_discover_product.php');

    if(isset($_GET['product_id'])) {
        $productId = $_GET['product_id'];
        $statement = $conn->prepare("SELECT * FROM PRODUCTS WHERE product_id = ?");
        $statement->bind_param("i", $productId);
        $statement->execute();
        $product = $statement->get_result();
    }
    else
        header('location: index.php');
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Single Product</title>
    <linke rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <section id="header">
        <a href="#" class="logo"><p>Shopii</p></a>

        <div>
            <ul id="navbar">
                <li><a href="index.html">Home</a></li>
                <li><a href="shop.html">Shop</a></li>
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

    <!-- Single Product -->
     <section class="container single-product mt-2 mb-5 pt-5">
        <div class="row mb-5">

        <?php while($row = $product->fetch_assoc()){ ?>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <img class="img-fluid w-100 pb-1" src="assets/images/Discover/<?php echo $row['product_image'] ?>" alt="" id="main-img">
                <div class="small-img-group">
                    <div class="small-img-col">
                        <img src="assets/images/Discover/<?php echo $row['product_image'] ?>" alt="" width="100%" class="small-img">
                    </div>
                    <div class="small-img-col">
                        <img src="assets/images/Discover/<?php echo $row['product_image2'] ?>" alt="" width="100%" class="small-img">
                    </div>
                    <div class="small-img-col">
                        <img src="assets/images/Discover/<?php echo $row['product_image3'] ?>" alt="" width="100%" class="small-img">
                    </div>
                    <div class="small-img-col">
                        <img src="assets/images/Discover/<?php echo $row['product_image4'] ?>" alt="" width="100%" class="small-img">
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-12 col-12">
                <h6 style="text-transform: uppercase;"><?php echo $row['product_name']?></h6>
                <h3 class="py-4">Men'n Fashion</h3>
                <h2>$<?php echo calculatePrice($row['product_price'], $row['product_special_discount'])?></h2>
                <div class="mt-2">
                    <label for="color">Color: <span><?php echo $row['product_color']?></span></label>
                    <div class="color-display" style="background-color: <?php echo $row['product_color']?>"></div>
                </div>
                <div class="mt-2 mb-5">
                    <label for="size">Size</label>
                    <select id="size" name="size">
                        <option value="S">Small (S)</option>
                        <option value="M">Medium (M)</option>
                        <option value="L">Large (L)</option>
                        <option value="XL">Extra Large (XL)</option>
                    </select>
                </div>
                <input type="number" value="1">
                <button class="buy-btn">Add To Cart</button>
                <h4 class="mt-5 mb-5">Product Details</h4>
                <span><?php echo $row['product_description'] ?>
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptates, modi.
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Modi quis qui alias temporibus corporis ipsum ad maxime quibusdam nihil excepturi.
                </span>
            <div/>

        <?php }?>
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
                    <a href="index.html">Home</a>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="assets/js/single_product.js"></script>
    <script src="assets/js/script.js"></script>
</body>