<?php
    include('server/connection.php');
    include('server/get_discover_product.php');


    if(isset($_POST['Filter'])) {
        $category = $_POST['category'];
        $price = $_POST['price'];
        $statement = $conn->prepare("SELECT * FROM products WHERE product_category=? AND product_price<=?");
        $statement->bind_param('si', $category, $price);
        $statement->execute();
        $products= $statement->get_result();
     
    }
    else {
        $statement = $conn->prepare("SELECT * FROM products");
        $statement->execute();
        $products= $statement->get_result();
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <linkerel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <?php include('assets/layouts/header.php');?>

    <div class="shop-container">
            <!-- Filter Section -->
            <section id="filter" class="my-5 py-5 ms-2">
                <div class="container mt-5 py-5">
                    <p>Filter Products</p>
                    <hr>
                </div>

                <form action="shop.php" method="POST">
                    <div class="row mx-auto container">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                        <p>Category</p> 
                                <div class="form-check">
                                    <input type="radio" name="category" value="T-shirt" id="category-one" class="form-check-input" checked>
                                    <label for="flexRadioDefault1">
                                    T-shirt 
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input type="radio" name="category" id="category-two" value="Hoodies" class="form-check-input" >
                                    <label for="flexRadioDefault2">
                                        Hoodies
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" name="category" id="category-three" value="Pants" class="form-check-input">
                                    <label for="flexRadioDefault3">
                                        Pants
                                    </label>
                                </div>

                        </div>
                    </div>

                    <div class="row mx-auto container mt-5">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <p>Price</p>
                            <input type="range" class="form-range w-50" min="1" max="150" name="price" value="50" id="custom-range-2">
                            <div class="w-50">
                                <span style="float: left">1</span> 
                                <span style="float: right">150</span> 
                            </div>
                        </div>
                    </div>

                    <div class="form-group my-3 mx-3">
                        <input type="submit" name="Filter" value="Filter" class="btn btn-primary">
                    </div>
                </form>
            </section>

            <!-- Shop Items Section-->
            <section id="discover" class="col-lg-8">
                <h2>Our Products</h2>
                <div class="dis-container">
                    <?php while($row = $products->fetch_assoc()){ ?>
                        <div class="dis" onclick="window.location.href='single_product.php?product_id=<?php echo $row['product_id'] ?>'">
                            <img class="" src="assets/images/Discover/<?php echo $row['product_image']; ?>" alt="loose fit crew-neck cotton color grey">
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
    </div>

<?php include('assets/layouts/footer.php');?>
<script src="assets/js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>