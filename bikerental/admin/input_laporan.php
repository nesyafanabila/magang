<!doctype html>
<html lang="en" class="no-js">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="theme-color" content="#3e454c">

    <title>Bike Rental Portal | Admin Post Vehicle</title>

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
                        <h3>Tambah Data Laporan</h3>
                        <form action="proses_laporan.php" method="post">
                            <table>
                                <tr>
                                    <td>id</td>
                                    <td><input type="int" name="id"></td>
                                </tr>
                                <tr>
                                    <td>Nama Pelangan</td>
                                    <td><input type="text" name="nama_pelangan"></td>
                                </tr>
                                <tr>
                                    <td>Motor</td>
                                    <td>
                                        <textarea name="motor" cols="30" rows="5"></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Tangal Pinjam</td>
                                    <td><input type="date" name="tanggalpinjam"></td>
                                </tr>
                                <tr>
                                    <td>Tanggal Kembali</td>
                                    <td><input type="date" name="tanggalkembali"></td>
                                </tr>
                                <tr>
                                    <td>Tanggal Terima</td>
                                    <td><input type="date" name="tanggalterima"></td>
                                </tr>
                                <tr>
                                    <td>Lama Pinjam</td>
                                    <td><input type="text" name="lamapinjam"></td>
                                </tr>
                                <tr>
                                    <td>Total Biaya</td>
                                    <td><input type="number" name="totalbiaya"></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <input type="submit" value="Simpan" onclick="showAlert()"
                                            class="btn btn-primary ">
                                    </td>

                                    <script>
                                    function showAlert() {
                                        alert("Data berhasil disimpan!");
                                    }
                                    </script>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>