<!doctype html>
<html lang="en" class="no-js">

<?php
session_start();
error_reporting(0);
include('includes/config.php');

if(strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {
    if (isset($_POST['submit'])) {
        // Kode pembaruan data kendaraan dimulai
        $vehicletitle = $_POST['vehicletitle'];
        $brand = $_POST['nama'];
        $vehicleoverview = $_POST['vehicalorcview'];
        $priceperday = $_POST['priceperday'];
        $fueltype = $_POST['fueltype'];
        $seatingcapacity = $_POST['seatingcapacity'];
        // ... Ambil nilai-nilai lainnya dari formulir

        $id = intval($_GET['id']);

        $sql = "UPDATE tblvehicles SET VehiclesTitle=:vehicletitle, VehiclesBrand=:brand, VehiclesOverview=:vehicleoverview, PricePerDay=:priceperday, FuelType=:fueltype, SeatingCapacity=:seatingcapacity /* ... Dan lanjutkan dengan variabel lainnya */ WHERE id=:id";
        $query = $dbh->prepare($sql);
        $query->bindParam(':vehicletitle', $vehicletitle, PDO::PARAM_STR);
        $query->bindParam(':brand', $brand, PDO::PARAM_STR);
        $query->bindParam(':vehicleoverview', $vehicleoverview, PDO::PARAM_STR);
        $query->bindParam(':priceperday', $priceperday, PDO::PARAM_STR);
        $query->bindParam(':fueltype', $fueltype, PDO::PARAM_STR);
        $query->bindParam(':seatingcapacity', $seatingcapacity, PDO::PARAM_STR);
        // ... Bind parameter untuk nilai-nilai lainnya

        $query->bindParam(':id', $id, PDO::PARAM_STR);
        $query->execute();

        $msg = "Data updated successfully";
        // Akhir kode pembaruan data kendaraan
    }
}
// Sisanya adalah bagian dari program utama Anda, termasuk HTML dan kode lainnya
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="theme-color" content="#3e454c">

    <title>Bike Rental Portal | Admin Edit Vehicle Info</title>

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
    <style>
    .errorWrap {
        padding: 10px;
        margin: 0 0 20px 0;
        background: #fff;
        border-left: 4px solid #dd3d36;
        -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
        box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
    }

    .succWrap {
        padding: 10px;
        margin: 0 0 20px 0;
        background: #fff;
        border-left: 4px solid #5cb85c;
        -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
        box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
    }
    </style>
</head>

<body>
    <?php include('includes/header.php');?>
    <div class="ts-main-content">
        <?php include('includes/leftbar.php');?>
        <div class="content-wrapper">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-12">

                        <h2 class="page-title">Edit Motor</h2>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">Basic Info</div>
                                    <div class="panel-body">
                                        <?php if($msg){?><div class="succWrap">
                                            <strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?>
                                        </div><?php } ?>
                                        <?php
$id=intval($_GET['id']);
$sql ="SELECT tblvehicles.*,tblbrands.Nama,tblbrands.id as bid from tblvehicles join tblbrands on tblbrands.id=tblvehicles.VehiclesBrand where tblvehicles.id=:id";
$query = $dbh -> prepare($sql);
$query-> bindParam(':id', $id, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{	?>

                                        <form method="post" class="form-horizontal" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Versi<span
                                                        style="color:red">*</span></label>
                                                <div class="col-sm-4">
                                                    <input type="text" name="vehicletitle" class="form-control"
                                                        value="<?php echo htmlentities($result->VehiclesTitle)?>"
                                                        required>
                                                </div>
                                                <label class="col-sm-2 control-label">Pilih Brand<span
                                                        style="color:red">*</span></label>
                                                <div class="col-sm-4">
                                                    <select class="selectpicker" name="brandname" required>
                                                        <option value="<?php echo htmlentities($result->bid);?>">
                                                            <?php echo htmlentities($bdname=$result->Nama); ?>
                                                        </option>
                                                        <?php $ret="select id,Nama from tblbrands";
$query= $dbh -> prepare($ret);
//$query->bindParam(':id',$id, PDO::PARAM_STR);
$query-> execute();
$resultss = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
{
foreach($resultss as $results)
{
if($results->Nama==$bdname)
{
continue;
} else{
?>
                                                        <option value="<?php echo htmlentities($results->id);?>">
                                                            <?php echo htmlentities($results->Nama);?></option>
                                                        <?php }}} ?>

                                                    </select>
                                                </div>
                                            </div>



                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Harga per hari<span
                                                        style="color:red">*</span></label>
                                                <div class="col-sm-4">
                                                    <input type="text" name="priceperday" class="form-control"
                                                        value="<?php echo htmlentities($result->PricePerDay);?>"
                                                        required>
                                                </div>
                                                <label class="col-sm-2 control-label">Pilih Type<span
                                                        style="color:red">*</span></label>
                                                <div class="col-sm-4">
                                                    <select class="selectpicker" name="fueltype" required>
                                                        <option value="<?php echo htmlentities($results->FuelType);?>">
                                                            <?php echo htmlentities($result->FuelType);?> </option>


                                                        <option value="Diesel">Diesel</option>
                                                        <option value="CNG">CNG</option>
                                                    </select>
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Bahan Bakar<span
                                                        style="color:red">*</span></label>
                                                <div class="col-sm-4">
                                                    <input type="text" name="fueltype" class="form-control"
                                                        value="Bensin" required>
                                                </div>

                                                <?php }} ?> <div class="form-group">
                                                    <div class="col-sm-8 col-sm-offset-2">

                                                        <button class="btn btn-primary" name="submit" type="submit"
                                                            style="margin-top:4%">Simpan
                                                        </button>
                                                    </div>
                                                </div>

                                        </form>
                                    </div>
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
</body>

</html>
<?php ?>