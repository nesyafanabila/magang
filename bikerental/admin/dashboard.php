<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{
header('location:index.php');
}
else{
	?>
<!doctype html>
<html lang="en" class="no-js">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="theme-color" content="#3e454c">

    <title>Bike Rental Portal | Admin Dashboard</title>

    <!-- Font awesome -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- Sandstone Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Bootstrap Datatables -->
    <link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
    <!-- Bootstrap social button library -->
    <link rel="stylesheet" href="css/bootstrap-social.css">
    <!-- Bootstrap select -->
    <link rel="stylesheet" href="css/bootstrap-select.css">
    <!-- Bootstrap file input -->
    <link rel="stylesheet" href="css/fileinput.min.css">
    <!-- Awesome Bootstrap checkbox -->
    <link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
    <!-- Admin Stye -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php include('includes/header.php');?>

    <div class="ts-main-content">
        <?php include('includes/leftbar.php');?>
        <div class="content-wrapper">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-12">

                        <h2 class="page-title">Home</h2>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="panel panel-default">
                                            <div class="panel-body bk-primary text-light">
                                                <div class="stat-panel text-center">
                                                    <?php
$sql ="SELECT id from tblusers ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$regusers=$query->rowCount();
?>
                                                    <div class="stat-panel-number h1 ">
                                                        <?php echo htmlentities($regusers);?></div>
                                                    <div class="stat-panel-title text-uppercase">Pelanggan</div>
                                                </div>
                                            </div>
                                            <a href="reg-users.php" class="block-anchor panel-footer text-center">Full
                                                Detail <i class="fa fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="panel panel-default">
                                            <div class="panel-body bk-primary text-light">
                                                <div class="stat-panel text-center">

                                                    <?php
$sql ="SELECT id from tblkaryawan ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$karyawan=$query->rowCount();
?>
                                                    <div class="stat-panel-number h1 ">
                                                        <?php echo htmlentities($karyawan);?></div>
                                                    <div class="stat-panel-title text-uppercase">Karyawan</div>
                                                </div>
                                            </div>
                                            <a href="karyawan.php" class="block-anchor panel-footer text-center">Full
                                                Detail <i class="fa fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="panel panel-default">
                                            <div class="panel-body bk-primary text-light">
                                                <div class="stat-panel text-center">
                                                    <?php
$sql1 ="SELECT id from tblvehicles ";
$query1 = $dbh -> prepare($sql1);;
$query1->execute();
$results1=$query1->fetchAll(PDO::FETCH_OBJ);
$totalvehicle=$query1->rowCount();
?>
                                                    <div class="stat-panel-number h1 ">
                                                        <?php echo htmlentities($totalvehicle);?></div>
                                                    <div class="stat-panel-title text-uppercase">Motor</div>
                                                </div>
                                            </div>
                                            <a href="manage-vehicles.php"
                                                class="block-anchor panel-footer text-center">Full Detail &nbsp; <i
                                                    class="fa fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="panel panel-default">
                                            <div class="panel-body bk-primary text-light">
                                                <div class="stat-panel text-center">
                                                    <?php
$sql2 ="SELECT id from tblbooking ";
$query2= $dbh -> prepare($sql2);
$query2->execute();
$results2=$query2->fetchAll(PDO::FETCH_OBJ);
$bookings=$query2->rowCount();
?>

                                                    <div class="stat-panel-number h1 ">
                                                        <?php echo htmlentities($bookings);?></div>
                                                    <div class="stat-panel-title text-uppercase">Total Bookings</div>
                                                </div>
                                            </div>
                                            <a href="manage-bookings.php"
                                                class="block-anchor panel-footer text-center">Full Detail &nbsp; <i
                                                    class="fa fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="panel panel-default">
                                            <div class="panel-body bk-primary text-light">
                                                <div class="stat-panel text-center">
                                                    <?php
$sql2 ="SELECT id from kerusakan ";
$query2= $dbh -> prepare($sql2);
$query2->execute();
$results2=$query2->fetchAll(PDO::FETCH_OBJ);
$kerusakan=$query2->rowCount();
?>

                                                    <div class="stat-panel-number h1 ">
                                                        <?php echo htmlentities($kerusakan);?></div>
                                                    <div class="stat-panel-title text-uppercase">Kerusakan</div>
                                                </div>
                                            </div>
                                            <a href="kerusakan.php" class="block-anchor panel-footer text-center">Full
                                                Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="panel panel-default">
                                            <div class="panel-body bk-primary text-light">
                                                <div class="stat-panel text-center">

                                                    <?php
$sql2 ="SELECT id from tbltransaksi ";
$query2= $dbh -> prepare($sql2);
$query2->execute();
$results2=$query2->fetchAll(PDO::FETCH_OBJ);
$tbltransaksi=$query2->rowCount();
?>

                                                    <div class="stat-panel-number h1 ">
                                                        <?php echo htmlentities($tbltransaksi);?></div>
                                                    <div class="stat-panel-title text-uppercase">Transaksi</div>
                                                </div>
                                            </div>
                                            <a href="transaksi.php" class="block-anchor panel-footer text-center">Full
                                                Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="panel panel-default">
                                            <div class="panel-body bk-primary text-light">
                                                <div class="stat-panel text-center">

                                                    <?php
$sql2 ="SELECT id from pengembalian ";
$query2= $dbh -> prepare($sql2);
$query2->execute();
$results2=$query2->fetchAll(PDO::FETCH_OBJ);
$pengembalian=$query2->rowCount();
?>

                                                    <div class="stat-panel-number h1 ">
                                                        <?php echo htmlentities($pengembalian);?></div>
                                                    <div class="stat-panel-title text-uppercase">Pengembalian</div>
                                                </div>
                                            </div>
                                            <a href="pengembalian.php"
                                                class="block-anchor panel-footer text-center">Full
                                                Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="panel panel-default">
                                            <div class="panel-body bk-primary text-light">
                                                <div class="stat-panel text-center">


                                                    <?php
$sql2 ="SELECT id from tbllaporan ";
$query2= $dbh -> prepare($sql2);
$query2->execute();
$results2=$query2->fetchAll(PDO::FETCH_OBJ);
$tbllaporan=$query2->rowCount();
?>

                                                    <div class="stat-panel-number h1 ">
                                                        <?php echo htmlentities($tbllaporan);?></div>
                                                    <div class="stat-panel-title text-uppercase">Laporan</div>
                                                </div>
                                            </div>
                                            <a href="laporan.php" class="block-anchor panel-footer text-center">Full
                                                Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="panel panel-default">
                                            <div class="panel-body bk-primary text-light">
                                                <div class="stat-panel text-center">




                                                    <?php
$sql3 ="SELECT id from tblbrands ";
$query3= $dbh -> prepare($sql3);
$query3->execute();
$results3=$query3->fetchAll(PDO::FETCH_OBJ);
$brands=$query3->rowCount();
?>
                                                    <div class="stat-panel-number h1 ">
                                                        <?php echo htmlentities($brands);?></div>
                                                    <div class="stat-panel-title text-uppercase">Kategori</div>
                                                </div>
                                            </div>
                                            <a href="manage-brands.php"
                                                class="block-anchor panel-footer text-center">Full Detail &nbsp; <i
                                                    class="fa fa-arrow-right"></i></a>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="panel panel-default">
                                    <div class="panel-body bk-primary text-light">
                                        <div class="stat-panel text-center">
                                            <?php
$sql2 ="SELECT id from pengambilan ";
$query2= $dbh -> prepare($sql2);
$query2->execute();
$results2=$query2->fetchAll(PDO::FETCH_OBJ);
$pengambilan=$query2->rowCount();
?>

                                            <div class="stat-panel-number h1 ">
                                                <?php echo htmlentities($pengambilan);?></div>
                                            <div class="stat-panel-title text-uppercase">Pengambilan</div>
                                        </div>
                                    </div>
                                    <a href="pengambilan.php" class="block-anchor panel-footer text-center">Full
                                        Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">





                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

    <!-- Loading Scripts -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap-select.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap.min.js"></script>
    <script src="js/Chart.min.js"></script>
    <script src="js/fileinput.js"></script>
    <script src="js/chartData.js"></script>
    <script src="js/main.js"></script>

    <script>
    window.onload = function() {

        // Line chart from swirlData for dashReport
        var ctx = document.getElementById("dashReport").getContext("2d");
        window.myLine = new Chart(ctx).Line(swirlData, {
            responsive: true,
            scaleShowVerticalLines: false,
            scaleBeginAtZero: true,
            multiTooltipTemplate: "<%if (label){%><%=label%>: <%}%><%= value %>",
        });

        // Pie Chart from doughutData
        var doctx = document.getElementById("chart-area3").getContext("2d");
        window.myDoughnut = new Chart(doctx).Pie(doughnutData, {
            responsive: true
        });

        // Dougnut Chart from doughnutData
        var doctx = document.getElementById("chart-area4").getContext("2d");
        window.myDoughnut = new Chart(doctx).Doughnut(doughnutData, {
            responsive: true
        });

    }
    </script>
</body>

</html>
<?php } ?>