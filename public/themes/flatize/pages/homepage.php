<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <?php
    if (ENV == 'dev') {
        $templatelaunch = 'https://dev.iwes.pro/test/homelaunch/';
    } else {
        $templatelaunch = 'https://www.iwes.pro/test/homelaunch/';
    } ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Iwes.Pro </title>
    <meta name="description" content="Free bootstrap template Atlas">
    <link rel="icon" href="<?php echo $templatelaunch ?>img/favicon.png" sizes="32x32" type="image/png">
    <!-- custom.css -->
    <link rel="stylesheet" href="<?php echo $templatelaunch ?>css/custom.css">
    <!-- bootstrap.min.css -->
    <link rel="stylesheet" href="<?php echo $templatelaunch ?>css/bootstrap.min.css">
    <!-- font-awesome -->
    <link rel="stylesheet" href="<?php echo $templatelaunch ?>font-awesome-4.7.0/css/font-awesome.min.css">

    <!-- AOS -->
    <link rel="stylesheet" href="<?php echo $templatelaunch ?>css/aos.css">
</head>

<body>
<!-- banner -->
<div class="jumbotron jumbotron-fluid" id="banner"
     style="background-image: url(<?php echo $templatelaunch ?>img/banner-bk.jpg);">
    <div class="container text-center text-md-left">
        <header>
            <div class="row justify-content-between">
                <div class="col-2">
                    <img  src="https://www.iwes.it/wp-content/uploads/2019/02/Logo.png" alt="logo">
                </div>
                <div class="col-6 align-self-center text-right">
                    <?php if (ENV == 'dev') {
                        echo '<a href="https://dev.iwes.pro/blueseal/" class="text-white lead">Area Riservata</a>';
                    } else {
                        echo '<a href="https://www.iwes.pro/blueseal/" class="text-white lead">Area Riservata</a>';
                    } ?>
                </div>
            </div>
        </header>
        <h1 data-aos="fade" data-aos-easing="linear" data-aos-duration="1000" data-aos-once="true"
            class="display-3 text-white font-weight-bold my-5">
            La Nuova Frontiera <br>
            dell'E-Commerce
        </h1>
        <p data-aos="fade" data-aos-easing="linear" data-aos-duration="1000" data-aos-once="true"
           class="lead text-white my-4">
            Start Selling from One To  all Places
        </p>
        <a href="https://www.iwes.it" data-aos="fade" data-aos-easing="linear" data-aos-duration="1000" data-aos-once="true"
           class="btn my-4 font-weight-bold atlas-cta cta-green">Get Started</a>
    </div>
</div>
<!-- three-blcok -->

<!-- feature (skew background) -->
</div>
<!-- feature (green background) -->


<!-- price table -->
<div class="container my-2 py-2" id="price-table">

</div>
<!-- client -->


<!-- copyright -->
<div class="jumbotron jumbotron-fluid" id="copyright">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-md-6 text-white align-self-center text-center text-md-left my-2">
                Copyright © 2020 iwes.pro.
            </div>
            <div class="col-md-6 align-self-center text-center text-md-right my-2" id="social-media">
                <a href="#" class="d-inline-block text-center ml-2">
                    <i class="fa fa-facebook" aria-hidden="true"></i>
                </a>
                <a href="#" class="d-inline-block text-center ml-2">
                    <i class="fa fa-twitter" aria-hidden="true"></i>
                </a>
                <a href="#" class="d-inline-block text-center ml-2">
                    <i class="fa fa-medium" aria-hidden="true"></i>
                </a>
                <a href="#" class="d-inline-block text-center ml-2">
                    <i class="fa fa-linkedin" aria-hidden="true"></i>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- AOS -->
<script src="<?php echo $templatelaunch ?>js/aos.js"></script>
<script>
    AOS.init({});
</script>
</body>

</html>