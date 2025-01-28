<?php 

session_start();

if(isset($_POST['add_to_cart'])) {
    // assuming a product is added to the cart
    if(isset($_SESSION['cart'])) {
        $products_id_array = array_column($_SESSION['cart'], 'product_id');
        if(!in_array($_POST['product_id'], $products_id_array)) {
            $product_array = array(
                'product_id' => $_POST['product_id'],
                'product_name' => $_POST['product_name'],
                'product_price' => $_POST['product_price'],
                'product_image' => $_POST['product_image'],
                'product_color' => $_POST['product_color'],
                'product_quantity' => $_POST['product_quantity']
            );

            $_SESSION['cart'][$_POST['product_id']] = $product_array;
        }else {
            echo '<script>alert("product was already added to the cart!");</script>';
        }
    }

    // assuming this is a new product
    else {
        $product_array = array(
            'product_id' => $_POST['product_id'],
            'product_name' => $_POST['product_name'],
            'product_price' => $_POST['product_price'],
            'product_image' => $_POST['product_image'],
            'product_color' => $_POST['product_color'],
            'product_quantity' => $_POST['product_quantity']
        );

        $_SESSION['cart'][$_POST['product_id']] = $product_array;
        // [ 1 => [], 2 => [] ]
    }
}

//removing a product from the cart
else if(isset($_POST['remove_product'])) {
    $product_id = $_POST['remove_id'];
    unset($_SESSION['cart'][$product_id]);
}
else 
    header('location: index.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <linke rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/cart.css">
</head>
<body>
    <section id="header">
        <a href="index.php" class="logo"><p>Shopii</p></a>

        <div>
            <ul id="navbar">
                <li><a href="index.php">Home</a></li>
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

    <!--Cart -->
    <section class="cart container my-5 py-5">
        <div class="container mt-5">
            <h2>Your Cart</h2>
            <hr>
        </div>

        <table class="mt-5 pt-5">
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Subtotal</th>
            </tr>

            <?php foreach($_SESSION['cart'] as $key => $value) {?>
                <tr>
                    <td>
                        <div class="product-info">
                            <img src="assets/images/Discover/<?php echo $value['product_image'] ?>" alt="bono">
                            <div>
                                <p><?php echo $value['product_name'] ?></p>
                                <small><span>$</span><?php echo $value['product_price'] ?></small>
                                <p>color: <?php echo $value['product_color'] ?></p>
                                <br>
                                <form action="cart.php" method="POST">
                                    <input type="hidden" name="remove_id" value="<?php echo $value['product_id']?>">
                                    <input type="submit" value="Remove" name="remove_product" class="remove-btn">
                                </form>
                            </div>
                        </div>
                    </td>

                    <td>
                        <input type="number" value="<?php echo $value['product_quantity'] ?>">
                        <a href="#" class="edit-btn">Edit</a>
                    </td>
                    
                    <td>
                        <span>$</span>
                        <span class="product-price"></span>
                    </td>
                </tr>
            <?php }?>

        </table>

        <div class="cart-total">
            <table>
                <tr>
                    <td>Subtotal</td>
                    <td>$58.80</td>
                </tr>
                <tr>
                    <td>Total</td>
                    <td>$58.80</td>
                </tr>
            </table>
        </div>

        <div class="checkout-container">
            <button class="btn checkout-btn">Checkout</button>
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
                    <a href="shop.html" ><li>Shop</li></a>
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