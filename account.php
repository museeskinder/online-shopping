<?php 

include('server/connection.php');
session_start();

if(!$_SESSION['user_logged']) {
    header('location: login.php');
    exit;
}

if(isset($_GET['logout'])) {
    if(isset($_SESSION['user_logged'])) {
        unset($_SESSION['user_logged']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        unset($_SESSION['user_id']);
        header('location: login.php');
        exit;
    }
}


if(isset($_POST['change_password'])) {
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];


    if($password !== $confirmPassword)
        header('location: account.php?error=password dosnt match');
    if(strlen($password) < 8)
        header('location: account.php?error=password must be atleast 8 characters long');
    else {
        $passChange = $conn->prepare("UPDATE users SET user_password=? WHERE user_email=?");
        $passChange->bind_param('ss', md5($password), $_SESSION['user_email']);

        if($passChange->execute())
            header('location: account.php?message=password updated successfully');
        else
            header('location: account.php?error=could not update the password');
    }
}


if(isset($_SESSION['user_logged'])) {
    $get_orders = $conn->prepare("SELECT * FROM orders WHERE user_id=? ");
    $get_orders->bind_param('i', $_SESSION['user_id']);
    $get_orders->execute();

    $orders = $get_orders->get_result();
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
    <?php include('assets/layouts/header.php'); ?>
    <!-- Account Info Section-->
    <section class="my-2 py-5">
        <div class="row container mx-auto">
            <div class="text-center mt-3 pt-5 col-lg-6 col-md-12 col-sm-12">
                <p style="color: green" class="text-center"><?php if(isset($_GET['register_success'])) echo $_GET['register_success'] ?></p>
                <p style="color: green" class="text-center"><?php if(isset($_GET['login_success'])) echo $_GET['login_success'] ?></p>
                <h3 class="font-weight-bold">Account Info</h3>
                <hr class="mx-auto">
                <div class="account-info">
                    <p>User Name: <span><?php if(isset($_SESSION['user_name'])) echo $_SESSION['user_name'] ?></span></p>
                    <p>Email: <span><?php if(isset($_SESSION['user_email'])) echo $_SESSION['user_email'] ?></span></p>
                    <p><a href="orders" id="order-btn">Your Orders</a></p>
                    <p><a href="account.php?logout=1" id="logout-btn">Logout</a></p>
                </div>
            </div>

            <div class="col-lg-6 col-md-12 col-sm-12">
                <form id="account-form" method="POST" action="account.php">
                    <h3>Change Password</h3>
                    <hr class="mx-auto">
                    <p style="color: red" class="text-center"><?php if(isset($_GET['error'])) echo $_GET['error'] ?></p>
                    <p style="color: green" class="text-center"><?php if(isset($_GET['message'])) echo $_GET['message'] ?></p>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password"  class="form-control" id="account-password" placeholder="Password" name="password" required>
                    </div>
                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password"  class="form-control" id="confirm-account-password" placeholder="Confirm Password" name="confirm_password" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Change Password" class="btn" id="change-pass-btn" name="change_password">
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
                <th>Order id</th>
                <th>Order Cost</th>
                <th>Order Status</th>
                <th>Order Date</th>
                <th>Order Details</th>
            </tr>

            <?php while($row = $orders->fetch_assoc()) { ?>
            <tr>
                <td>
                    <div class="product-info">
                        <div>
                            <p class="mt-3"><?php echo $row['order_id']; ?></p>
                        </div>
                    </div>
                </td>

                <td>
                    <span>$ <?php echo $row['order_cost']; ?></span>
                </td>

                <td>
                    <span><?php if($row['order_status'] === 'on_hold') echo 'Ongoing order' ?></span>
                </td>

                <td>
                    <span><?php echo $row['order_date']; ?></span>
                </td>

                <td>
                    <form action="order_details.php" method="POST">
                        <input type="hidden" value="<?php echo $row['order_id']; ?>" name="order_id">
                        <input type="submit" class="btn order-details-btn" value="Details" name="order_details_btn">
                    </form>
                </td>
            </tr>
            <?php }?>
        </table>
    </section>

    <?php include('assets/layouts/footer.php'); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="assets/js/script.js"></script>
</body>