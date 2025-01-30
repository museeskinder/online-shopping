<?php
    include('server/connection.php');
    session_start();

    if(isset($_SESSION['user_logged']))  {
        header('location: account.php');
        exit();
    }

    if(isset($_POST['register'])) {
        $name = $_POST['name'];
        $email= $_POST['email'];
        $password= $_POST['password'];
        $confirmPassword= $_POST['confirm_password']; 

        //password validation 
        if($password !== $confirmPassword) 
            header('location: register.php?error=password dont match'); 
        if(strlen($password) < 8) 
            header('location: register.php?error=password must have atleast 8 characters');
        
        //if no error 
        else {
            //checking there is a user with email in db
            $checkUser= $conn->prepare("SELECT count(*) FROM users where user_email=?");
            $checkUser->bind_param('s', $email);
            $checkUser->execute();
            $checkUser->bind_result($num_rows);
            $checkUser->store_result();
            $checkUser->fetch();
            if($num_rows !== 0)
                header('location: register.php?error=user with email already exists');

            //register user to db
            $registerUser= $conn->prepare("INSERT INTO users( user_name, user_email, user_password) 
                VALUES(?, ?, ? )");
            $registerUser->bind_param('sss', $name, $email, md5($password));
            if($registerUser->execute()) {
                $_SESSION['user_id'] = $user_id;
                $_SESSION['user_name'] = $name;
                $_SESSION['user_email'] = $email;
                header('location: register.php?register_success=account created successfully');
                $_SESSION['user_logged'] = true;
            }
            else
                header('location: register.php?error=could not create an account at the moment');
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <linke rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/login.css">
    <link rel="stylesheet" href="assets/css/register.css">
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

    <!-- Register Section-->
     <section class="my-5 py-5">
        <div class="container text-center mt-3 pt-5">
            <h2 class="font-weight-bold">Register Account</h2>
        </div>
        <div class="mx-auto container">
            <form action="register.php" id="register-form" method="POST">
                <p style="color: red"><?php if(isset($_GET['error'])) echo $_GET['error'];?></p>
                <div class="form-group">
                    <label>User Name</label>
                    <input type="text" class="form-control" id="login-name" name="name" placeholder="User Name" required>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" id="register-email" name="email" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" id="register-password" name="password" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" class="form-control" id="register-confirm-password" name="confirm_password" placeholder="Confirm Password" required>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn" id="register-btn" value="Register" name="register">
                </div>
                <div class="form-group">
                    <a id="register-url" class="btn" name="login">Do you have an account? Login</a>
                </div>
            </form>
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
                    <a href="#">Home</a>
                    <a href="#" class="active"><li>Shop</li></a>
                    <a href="#"><li>About</li></a>
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
</body>