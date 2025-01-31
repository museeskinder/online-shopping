<?php
    session_start();
    include('server/connection.php');

    if(isset($_POST['login_btn'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $getUser = $conn->prepare("SELECT user_id, user_name, user_email, user_password FROM users WHERE user_email=? AND user_password = ? LIMIT 1");
        $getUser->bind_param('ss', $email, md5($password));

        if($getUser->execute()) {
            $getUser->bind_result($user_id, $user_name, $user_email, $user_password);
            $getUser->store_result();

            if($getUser->num_rows() == 1) {
                $getUser->fetch();

                $_SESSION['user_id'] = $user_id;
                $_SESSION['user_name'] = $user_name;
                $_SESSION['user_email'] = $user_email;
                $_SESSION['user_logged'] = true;
                
                header('location: login.php?logged_success=logged in successfully');

            }
            else
                header('location: login.php?error=could not verify the account');
        }
        else {
            header('location: login.php?error=something went wrong');
        }

    }

    if(isset($_SESSION['user_logged'])) {
        header('location: account.php');
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <linke rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/login.css">
</head>
<body>
    <?php include('assets/layouts/header.php') ?>
    <!-- Login Section-->
     <section class="my-5 py-5">
        <div class="container text-center mt-3 pt-5">
            <h2 class="font-weight-bold">Login</h2>
        </div>
        <div class="mx-auto container">
            <form action="login.php" method="POST" id="login-form">
                <p style="color: red"><?php if(isset($_GET['error'])) echo $_GET['error'] ?></p>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" id="login-email" name="email" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" id="login-password" name="password" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn" id="login-btn" value="Login" name="login_btn">
                </div>
                <div class="form-group">
                    <a id="register-url" href="register.php" class="btn">Don't Have account? Register</a>
                </div>
            </form>
        </div>
     </section>


    <?php include('assets/layouts/footer.php') ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>