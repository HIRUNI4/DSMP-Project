<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include_once('config.php');
require 'PHPMailer\src\PHPMailer.php';
require 'PHPMailer\src\SMTP.php';
require 'PHPMailer\src\Exception.php';

if (isset($_POST['pwdrst'])) {
    $email = $_POST['email'];
    $check_email = mysqli_query($con, "SELECT uemail from user where uemail='$email'");
    $res = mysqli_num_rows($check_email);

    if ($res > 0) {
        $message = '<div>
            <p><b>Hello!</b></p>
            <p>You are receiving this email because we received a password reset request for your account.</p>
            <br>
            <p><a class="btn btn-primary" href="http://localhost/user-login/passwordreset.php?secret=' . base64_encode($email) . '">Reset Password</a></p>
            <br>
            <p>If you did not request a password reset, no further action is required.</p>
        </div>';

        $mail = new PHPMailer;
        $mail->IsSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = "tls";
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        $mail->Username = "mr.landloard@gmail.com";
        $mail->Password = "Landloard123";
        $mail->FromName = "Tech Area";
        $mail->addAddress($email);
        $mail->Subject = "Reset Password";
        $mail->isHTML(true);
        $mail->Body = $message;

        if ($mail->send()) {
            $msg = "We have emailed your password reset link!";
        } else {
            $error = "Email sending failed!";
        }
    } else {
        $error = "We can't find a user with that email address";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Meta Tags -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="images/favicon.ico">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,500,600,700&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Comfortaa:400,700" rel="stylesheet">

    <!-- CSS Links -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-slider.css">
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="css/layerslider.css">
    <link rel="stylesheet" type="text/css" href="css/color.css">
    <link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="fonts/flaticon/flaticon.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/forgot.css">

    <!-- Title -->
    <title>Bodimak.lk</title>
</head>

<body>

<!-- Login -->
<div class="page-wrappers login-body full-row bg-gray">
    <div class="login-wrapper">
        <div class="container">
            <div class="loginbox">
                <div class="login-right">
                    <div class="login-right-wrap">
                        <h1>Forgot Password</h1>
                        <p class="account-subtitle">Reset your password</p>
                        <p class="alert alert-danger text-center"><?php if (!empty($error)) {echo $error;} ?>
						<?php if (!empty($msg)) {echo $msg;} ?></p>
                        <!-- Form -->
                        <form id="validate_form" method="post">
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" placeholder="Your Email*" Required
                                       data-parsley-type="email" data-parsley-trigger="keyup"/>
                            </div>
                            <button class="btn btn-warning" type="submit" id="login" name="pwdrst"
                                    value="Send Password Reset Link">Send Password Reset Link
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Login -->

<!-- JavaScript Links -->
<script src="js/jquery.min.js"></script>
<script src="js/greensock.js"></script>
<script src="js/layerslider.transitions.js"></script>
<script src="js/layerslider.kreaturamedia.jquery.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/tmpl.js"></script>
<script src="js/jquery.dependClass-0.1.js"></script>
<script src="js/draggable-0.1.js"></script>
<script src="js/jquery.slider.js"></script>
<script src="js/wow.js"></script>
<script src="js/custom.js"></script>

</body>
</html>
