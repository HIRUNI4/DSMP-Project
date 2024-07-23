<?php
session_start();
include("config.php");

$errors = array();
$success_msg = "";

if (isset($_POST['update-password'])) {
    $currentPassword = mysqli_real_escape_string($con, $_POST['current-password']);
    $newPassword = mysqli_real_escape_string($con, $_POST['new-password']);

    // You may want to validate the passwords here (e.g., length, complexity, etc.)

    $email = $_SESSION['uemail'];
    $currentPasswordHash = sha1($currentPassword);

    // Check if the current password is correct for the user
    $checkPasswordQuery = "SELECT upass FROM user WHERE uemail = '$email'";
    $result = mysqli_query($con, $checkPasswordQuery);

    if ($row = mysqli_fetch_assoc($result)) {
        if ($currentPasswordHash == $row['upass']) {
            if ($newPassword) {
                // Update the password
                $newPasswordHash = sha1($newPassword);
                $updatePasswordQuery = "UPDATE user SET upass = '$newPasswordHash' WHERE uemail = '$email'";
                $run_query = mysqli_query($con, $updatePasswordQuery);
                if($run_query){
                    $info = "Your password changed. Now you can login with your new password.";
                    $_SESSION['info'] = $info;

                    // Destroy the current session to log the user out
                    session_destroy();

                    // Redirect the user to the login page for reauthentication
                    header('Location: login.php');
                    exit; // Make sure to exit after redirection
                }
                else{
                    $errors['db-error'] = "Failed to change your password!";
                }
            }
        } else {
            $errors[] = "Current password is incorrect.";
        }
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
    
    
<div id="page-wrapper">
    <div class="row"> 
    <div class="login-wrapper">
        <div class="container">
            <div class="loginbox">
                <div class="login-right">
                    <div class="login-right-wrap">
                        <h1>Update Password</h1>
                        <p class="account-subtitle">Change your password</p>
                            <?php 
                            if (!empty($errors)) {
                            foreach ($errors as $error) {
                                echo '<p class="alert alert-danger">' . $error . '</p>';
                            }
                        }
                        if (!empty($success_msg)) {
                            echo '<p class="alert alert-success">' . $success_msg . '</p>';
                        }
                        ?>
                        </p>
                        <!-- Form -->
                        <form id="validate_form" method="post">
                            <div class="form-group">
                                <input type="password" id="current-password" name="current-password" 
                                class="form-control" placeholder="Current Password*" Required 
                                data-parsley-type="email" data-parsley-trigger="keyup"/>
                            </div>
                            <div class="form-group">
                                <input type="password" id="new-password" name="new-password"
                                class="form-control" placeholder="New Password*" Required 
                                data-parsley-type="email" data-parsley-trigger="keyup"/>
                            </div>
                            <button class="btn btn-success" type="submit" id="login" name="update-password"
                                    value="Change Password">Change Password
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

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
