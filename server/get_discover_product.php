<?php

    include('connection.php');

    $statement = $conn->prepare("SELECT * FROM PRODUCTS LIMIT 4");
    $statement->execute();
    $discoverProducts = $statement->get_result();

    /* function that applies discount to the price */
    function calculatePrice($price, $discount) {
        if($discount != 0) 
            $finalPrice = $price - ($price * ($discount / 100));
        else
            $finalPrice = $price;
        return $finalPrice;

    }

    function displayPrice($price, $discount) {
        if($discount != 0)
            return $price;
        else
            return ;
    }
?>