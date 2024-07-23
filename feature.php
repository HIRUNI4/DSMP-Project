<?php 
ini_set('session.cache_limiter', 'public');
session_cache_limiter(false);
session_start();
include("config.php");
if (!isset($_SESSION['uemail'])) {
    header("location: login.php");
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
    <!-- Css Link -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text css" href="css/bootstrap-slider.css">
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="css/layerslider.css">
    <link rel="stylesheet" type="text/css" href="css/color.css">
    <link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="fonts/flaticon/flaticon.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <!-- Title -->
    <title>Bodimak.lk</title>
    <!-- Title -->
</head>
<body>
<div id="page-wrapper">
    <div class="row">
        <!-- Header start -->
        <?php include("include/header.php");?>
        <!-- Header end -->
        <!-- Submit property -->
        <div class="full-row bg-gray">
            <div class="container">
                <div class="row mb-5">
                    <div class="col-lg-12">
                        <h2 class="text-secondary double-down-line text-center">User Listed Property</h2>
                        <?php
                        if (isset($_GET['msg']))
                            echo $_GET['msg'];
                        ?>
                    </div>
                </div>
                <?php
                $uid = $_SESSION['uid'];
                $query = mysqli_query($con, "SELECT * FROM `property` WHERE uid='$uid'");
                while ($row = mysqli_fetch_array($query)) {
                ?>
                    <div class="property-item">
                        <div class="row">
                            <div class="col-lg-4">
                                <img src="admin/property/<?php echo $row['18'];?>" alt="pimage">
                            </div>
                            <div class="col-lg-8">
                                <div class="property-info d-table">
                                    <h5 class="text-secondary text-capitalize">
                                        <a href="propertydetail.php?pid=<?php echo $row['0'];?>"><?php echo $row['1'];?></a>
                                    </h5>
                                    <span class="font-14 text-capitalize">
                                        <i class="fas fa-map-marker-alt text-warning font-13"></i>&nbsp; <?php echo $row['14'];?>
                                    </span>
                                    <div class="price mt-3">
                                        <span class="text-warning">LKR&nbsp;<?php echo $row['12'];?></span>
                                    </div>
                                </div>
                                <a class="text-capitalize"><?php echo $row['3'];?></a><br>
                                <a class="text-capitalize"><?php echo $row['24'];?></a><br>
                                <a class="btn btn-info" href="submitpropertyupdate.php?id=<?php echo $row['0'];?>">Update</a>
                                <a class="btn btn-danger" href="submitpropertydelete.php?id=<?php echo $row['0'];?>">Delete</a><br>
                            </div>
                        </div>
                    </div>
                    <hr>
                <?php } ?>
            </div>
        </div>
        <!-- Submit property -->
        <!-- Footer start -->
        <?php include("include/footer.php");?>
        <!-- Footer start -->
        <!-- Scroll to top -->
        <a href="#" class="bg-secondary text-white hover-text-secondary" id="scroll"><i class="fas fa-angle-up"></i></a>
        <!-- End Scroll To top -->
    </div>
</div>
<!-- Js Link -->
<script src="js/jquery.min.js"></script>
<!-- jQuery Layer Slider -->
<script src="js/greensock.js"></script>
<script src="js/layerslider.transitions.js"></script>
<script src="js/layerslider.kreaturamedia.jquery.js"></script>
<!-- jQuery Layer Slider -->
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
