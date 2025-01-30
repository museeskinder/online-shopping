<?php 

session_start();
if(!$_SESSION['user_logged']) {
    header('location: login.php');
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Info
    </title>
    <linke rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/account.css">
    
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

    <!-- Account Info Section-->
    <section class="my-2 py-5">
        <div class="row container mx-auto">
            <div class="text-center mt-3 pt-5 col-lg-6 col-md-12 col-sm-12">
                <h3 class="font-weight-bold">Account Info</h3>
                <hr class="mx-auto">
                <div class="account-info">
                    <p>User Name: <span><?php if(isset($_SESSION['user_name'])) echo $_SESSION['user_name'] ?></span></p>
                    <p>Email: <span><?php if(isset($_SESSION['user_email'])) echo $_SESSION['user_email'] ?></span></p>
                    <p><a href="orders" id="order-btn">Your Orders</a></p>
                    <p><a href="" id="logout-btn">Logout</a></p>
                </div>
            </div>

            <div class="col-lg-6 col-md-12 col-sm-12">
                <form id="account-form">
                    <h3>Change Password</h3>
                    <hr class="mx-auto">
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password"  class="form-control" id="account-password" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password"  class="form-control" id="confirm-account-password" placeholder="Confirm Password" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Change Password" class="btn" id="change-pass-btn">
                    </div>
                </form>

            </div>
        </div>
    </section>


    <!-- Orders -->
    <section  id="orders" class="orders container mt-2 py-5">
        <div class="container mt-2">
            <h2 class="font-weight-bold text-center">Your Orders</h2>
            <hr class="mx-auto">
        </div>

        <table class="mt-5 pt-5">
            <tr>
                <th>Product</th>
                <th>Date</th>
            </tr>
            <tr>
                <td>
                    <div class="product-info">
                        <img src="assets/images/Discover/bono.webp" alt="">
                        <div>
                            <p class="mt-3">White Shoes</p>
                        </div>
                    </div>
                </td>

                <td>
                    <span>2025-1-26</span>
                </td>
            </tr>
        </table>
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
    <script src="assets/js/script.js"></script>
</body>