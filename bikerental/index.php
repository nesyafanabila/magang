<?php
session_start();
include('includes/config.php');
error_reporting(0);

?>

<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>Bike Rental Portal</title>
    <!--Bootstrap -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="assets/css/styles.css" type="text/css">
    <link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
    <link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">
    <link href="assets/css/slick.css" rel="stylesheet">
    <link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" id="switcher-css" type="text/css" href="assets/switcher/css/switcher.css" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/red.css" title="red" media="all"
        data-default-color="true" />
    <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/orange.css" title="orange" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/blue.css" title="blue" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/pink.css" title="pink" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/green.css" title="green" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/purple.css" title="purple" media="all" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144"
        href="assets/images/favicon-icon/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114"
        href="assets/images/favicon-icon/apple-touch-icon-114-precomposed.html">
    <link rel="apple-touch-icon-precomposed" sizes="72x72"
        href="assets/images/favicon-icon/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/images/favicon-icon/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="assets/images/favicon-icon/24x24.png">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
</head>

<body>

    <!-- Start Switcher -->
    <?php include('includes/colorswitcher.php');?>
    <!-- /Switcher -->

    <!--Header-->
    <?php include('includes/header.php');?>
    <!-- /Header -->

    <!-- Banners -->
    <section id="banner" class="banner-section">
        <div class="container">
            <div class="div_zindex">
                <div class="row">
                    <div class="col-md-5 col-md-push-7">
                        <div class="banner_content">
                            <h1>Selamat datang di Online Bike Rental! </h1>
                            <p>Temukan kenyamanan perjalanan Anda dengan koleksi motor berkualitas kami </p>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <!-- /Banners -->


    <!-- Resent Cat-->
    <section class="section-padding gray-bg">
        <div class="container">
            <div class="section-header text-center">
                <h2>Tingkatkan pengalaman petualangan Anda!</h2>
                <p>Nikmati pilihan motor premium kami dan jelajahi destinasi favorit Anda dengan kenyamanan terbaik.</p>
            </div>
            <div class="row">

                <!-- Nav tabs -->
                <div class="recent-tab">
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#resentnewcar" role="tab"
                                data-toggle="tab">TERBARU </a></li>
                    </ul>
                </div>
                <!-- Recently Listed New Cars -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="resentnewcar">

                        <?php $sql = "SELECT tblvehicles.VehiclesTitle,tblbrands.BrandName,tblvehicles.PricePerDay,tblvehicles.FuelType,tblvehicles.ModelYear,tblvehicles.id,tblvehicles.SeatingCapacity,tblvehicles.VehiclesOverview,tblvehicles.Vimage1 from tblvehicles join tblbrands on tblbrands.id=tblvehicles.VehiclesBrand";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{
?>

                        <div class="col-list-3">
                            <div class="recent-car-list">
                                <div class="car-info-box"> <a
                                        href="vehical-details.php?vhid=<?php echo htmlentities($result->id);?>"><img
                                            src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage1);?>"
                                            class="img-responsive" alt="image"></a>
                                    <ul>
                                        <li><i class="fa fa-car"
                                                aria-hidden="true"></i><?php echo htmlentities($result->FuelType);?>
                                        </li>
                                        <li><i class="fa fa-tint" aria-hidden="true"></i> Bensin
                                            <?php echo htmlentities($result->bahanbakar);?></li>
                                        <li><i class="fa fa-user"
                                                aria-hidden="true"></i><?php echo htmlentities($result->SeatingCapacity);?>
                                            Tempat duduk</li>
                                    </ul>
                                </div>
                                <div class="car-title-m">
                                    <h6><a href="vehical-details.php?vhid=<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->BrandName);?>
                                            , <?php echo htmlentities($result->VehiclesTitle);?></a></h6><br>
                                    <?php
// Konversi dari dolar ke Rupiah dengan menggunakan kurs terkini (misalnya, kurs 1 USD = 14.000 IDR)
$price_in_usd = $result->PricePerDay; // Ganti $result->PricePerDay dengan variabel yang sesuai
$price_in_idr = $price_in_usd * 14000; // Menggunakan kurs 1 USD = 14.000 IDR, ganti dengan kurs yang sesuai
// Format nilai ke format mata uang Rupiah dengan fungsi number_format()
$formatted_price = "Rp " . number_format($price_in_idr, 0, ',', '.'); // Memformat nilai ke dalam format Rupiah

// Menampilkan nilai harga dalam format Rupiah
echo "<p>" . $formatted_price . " per hari</p>";
?>

                                </div>
                                <div class="inventory_info_m">
                                    <p><?php echo substr($result->VehiclesOverview,0,70);?></p>
                                </div>
                            </div>
                        </div>
                        <?php }}?>

                    </div>
                </div>
            </div>
    </section>
    <!-- /Resent Cat -->



    <!--Testimonial -->
    <section class="section-padding testimonial-section parallex-bg">
        <div class="container div_zindex">
            <div class="section-header white-text text-center">
                <h2>Ulasan Pelanggan</h2>
            </div>
            <div class="row">
                <div id="testimonial-slider">
                    <?php
$tid=1;
$sql = "SELECT tbltestimonial.Testimonial,tblusers.FullName from tbltestimonial join tblusers on tbltestimonial.UserEmail=tblusers.EmailId where tbltestimonial.status=:tid";
$query = $dbh -> prepare($sql);
$query->bindParam(':tid',$tid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{  ?>


                    <div class="testimonial-m">
                        <div class="testimonial-img"> <img src="assets/images/cat-profile.png" alt="" /> </div>
                        <div class="testimonial-content">
                            <div class="testimonial-heading">
                                <h5><?php echo htmlentities($result->FullName);?></h5>
                                <p><?php echo htmlentities($result->Testimonial);?></p>
                            </div>
                        </div>
                    </div>
                    <?php }} ?>



                </div>
            </div>
        </div>
        <!-- Dark Overlay-->
        <div class="dark-overlay"></div>
    </section>
    <!-- /Testimonial-->


    <!--Footer -->
    <?php include('includes/footer.php');?>
    <!-- /Footer-->

    <!--Back to top-->
    <div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> </div>
    <!--/Back to top-->

    <!--Login-Form -->
    <?php include('includes/login.php');?>
    <!--/Login-Form -->

    <!--Register-Form -->
    <?php include('includes/registration.php');?>

    <!--/Register-Form -->

    <!--Forgot-password-Form -->
    <?php include('includes/forgotpassword.php');?>
    <!--/Forgot-password-Form -->

    <!-- Scripts -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/interface.js"></script>
    <!--Switcher-->
    <script src="assets/switcher/js/switcher.js"></script>
    <!--bootstrap-slider-JS-->
    <script src="assets/js/bootstrap-slider.min.js"></script>
    <!--Slider-JS-->
    <script src="assets/js/slick.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>

</body>

<!-- Mirrored from themes.webmasterdriver.net/carforyou/demo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 16 Jun 2017 07:22:11 GMT -->

</html>