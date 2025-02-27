<?php 

session_start();
include('connection.php');

if(isset($_POST['place_order'])) {

    //place order
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    $order_cost = $_SESSION['total'];
    $order_status = "on_hold";
    $user_id = $_SESSION['user_id'];
    $order_date = date('Y-m-d H:i:s');

    $order_statement = $conn->prepare("INSERT INTO 
    orders (
    order_cost, 
    order_status, 
    user_id, 
    user_phone,
    user_city, 
    user_email,
    user_address,
    order_date)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?); ");

    $order_statement->bind_param('isiissss', $order_cost, $order_status, $user_id, $phone, $city, $email, $address, $order_date);
    $order_statement->execute();
    $order_id = $order_statement->insert_id;

    //get products from the cart
    foreach($_SESSION['cart'] as $key => $value) {
        $product = $_SESSION['cart'][$key]; 
        $product_id = $product['product_id'];
        $product_name = $product['product_name'];
        $product_image= $product['product_image'];
        $product_price= $product['product_price'];
        $product_quantity= $product['product_quantity'];

        $order_items_statement = $conn->prepare("INSERT INTO order_items (
        order_id,
        product_id,
        product_name,
        product_image,
        product_price,
        product_quantity,
        user_id,
        order_date) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

        $order_items_statement->bind_param('iissssis', $order_id, $product_id, $product_name, $product_image, 
                            $product_price, $product_quantity, $user_id, $order_id);

        $order_items_statement->execute();

        //clean the cart item since order is placed and items kept in db
        unset($_SESSION['cart']);
    } 
}

?>