<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shoppi | Your Choice</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <linke rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <?php include('assets/layouts/header.php'); ?>

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
    <section id="discover" class="my-5 pb-5">
        <div class="container text-center mt-5 py-5">
            <h2>Discover What's New</h2>
            <p>New products in stock</p>
            <div class="row mx-auto container-fluid">
                <div class="product col-lg-3 col-md-4 col-sm-6 mb-3">
                    <?php include('server/get_discover_product.php'); ?> 
                    <?php while($row = $discoverProducts->fetch_assoc()) { ?>
                            <a href="single_product.php?product_id=<?php echo $row['product_id']?>"><img class="img-fluid mb-3"  src="assets/images/Discover/<?php echo $row['product_image']?>" alt="loose fit crew-neck cotton color grey"></a>
                            <p><?php echo $row['product_name']?></p>
                            <span>$<?php echo calculatePrice($row['product_price'], $row['product_special_discount']) ?>
                                <span class="del">$<?php echo  displayPrice($row['product_price'], $row['product_special_discount'])?></span>
                            </span>
                    <?php }?>
                </div>
        </div>
    </section>

    <?php include('assets/layouts/footer.php'); ?>
    <script src="assets/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body> 
</html>