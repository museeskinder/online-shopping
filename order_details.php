<?php 
    include('server/connection.php');
    if(isset($_POST['order_details_btn']) && isset($_POST['order_id'])) {
        $orderId = $_POST['order_id'];
        $getOrderItems = $conn->prepare("SELECT * FROM order_items WHERE order_id=?");
        $getOrderItems->bind_param('i', $orderId);
        $getOrderItems->execute();
        $orderDetails = $getOrderItems->get_result();
    }
    else {
        header('location: account.php');
        exit;
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>
    <linke rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/order_details.css">
</head>
<body>
    <?php include('assets/layouts/header.php'); ?>

    <!-- Order Details-->
    <section  id="orders" class="orders container mt-2 py-5">
        <div class="container mt-2">
            <h2 class="font-weight-bold text-center">Order Detail</h2>
            <hr class="mx-auto">
        </div>

        <table class="mt-5 pt-5">
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
            </tr>

            <?php while($row = $orderDetails->fetch_assoc()){ ?>
                <tr>
                    <td>
                        <div class="product-info">
                            <img src="assets/images/Discover/<?php echo $row['product_image'] ?>">
                            <div>
                                <p class="mt-3"><?Php echo $row['product_name']?></p>
                                <p class="mt-3">Color: <?Php echo $row['product_color']?></p>
                            </div>
                        </div>
                    </td>

                    <td>
                        <span>$<?php echo $row['product_price'] ?></span>
                    </td>

                    <td>
                        <span><?php echo $row['product_quantity']; ?></span>
                    </td>

                </tr>
            <?php }?>
        </table>
    </section>

    <?php include('assets/layouts/footer.php'); ?>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>