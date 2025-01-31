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
    }else {
        // assuming this is a new product
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

//editing item quanity in the cart
else if(isset($_POST['edit_product'])) {
    $product_id = $_POST['edit_id'];
    $product_quantity = $_POST['product_quantity'];
    
    $product_array = $_SESSION['cart'][$product_id];
    $product_array['product_quantity'] = $product_quantity;

    $_SESSION['cart'][$product_id] = $product_array;
}

function calculateTotal() {
    $total = 0;

    foreach($_SESSION['cart'] as $key => $value) {
        $product = $_SESSION['cart'][$key];
        $total += $product['product_price'] * $product['product_quantity'];
    }

    return $total;
}

$_SESSION['total'] = calculateTotaL();
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
    <?php include('assets/layouts/header.php'); ?>
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
                                <p><span>$</span><?php echo $value['product_price'] ?></p>
                                <p>Color: <?php echo $value['product_color'] ?></p>
                                <br>
                                <form action="cart.php" method="POST">
                                    <input type="hidden" name="remove_id" value="<?php echo $value['product_id']?>">
                                    <input type="submit" value="Remove" name="remove_product" class="remove-btn">
                                </form>
                            </div>
                        </div>
                    </td>

                    <form action="cart.php" method="POST">
                        <td>
                            <input type="hidden" name="edit_id" value="<?php echo $value['product_id']?>">
                            <input type="number" value="<?php echo $value['product_quantity'] ?>" name="product_quantity">
                            <input type="submit" class="edit-btn" value="Edit" name="edit_product">
                        </td>
                    </form>
                    
                    <td>
                        <span>$</span>
                        <span class="product-price"><?php echo $value['product_quantity'] * $value['product_price'] ?></span>
                    </td>
                </tr>
            <?php }?>

        </table>

        <div class="cart-total">
            <table>
                <tr>
                    <td>Total</td>
                    <td>$<?php echo $_SESSION['total'] ?></td>
                </tr>
            </table>
        </div>

        <div class="checkout-container">
            <form action="checkout.php" method="POST">
                <input class="btn checkout-btn" name="checkout" type="submit" value="Checkout">
            </form>
        </div>
    </section>

    <?php include('assets/layouts/footer.php'); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="assets/js/script.js"></script>
</body>