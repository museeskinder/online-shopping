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
    <?php include('assets/layouts/header.php'); ?>
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
                        <form method="POST" action="cart.php">
                                <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>">
                                <input type="hidden" name="product_image" value="<?php echo $row['product_image']; ?>">
                                <input type="hidden" name="product_name" value="<?php echo $row['product_name']; ?>">
                                <input type="hidden" name="product_price" value="<?php echo calculatePrice($row['product_price'], $row['product_special_discount'])?>">
                                <input type="hidden" name="product_color" value="<?php echo $row['product_color']; ?>">
                                <input type="number" name="product_quantity" value="1">
                                <button class="buy-btn" type="submit" name="add_to_cart">Add To Cart</button>
                        </form>
                        <h4 class="mt-3 mb-2">Product Details</h4>
                        <span><?php echo $row['product_description'] ?>
                        </span>
                        <p>
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptates, modi.
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Modi quis qui alias temporibus corporis ipsum ad maxime quibusdam nihil excepturi.
                        </p>
                    </div>
            <?php }?>
        </div>

     </section>

    <?php include('assets/layouts/footer.php'); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="assets/js/single_product.js"></script>
    <script src="assets/js/script.js"></script>
</body>