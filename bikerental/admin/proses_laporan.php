<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{
header('location:index.php');}

$aksi= $_GET[ 'aksi'];
if ($aksi=="laporan"){
    $db->laporan($_POST['id'],$_POST['nama_pelanggan'],$_POST['motor'],$_POST['tglpinjam'],$_POST['tglkembali'],$_POST['tglterima'],$_POST['lamapinjam'],$_POST['totbiaya']);
    header("location:laporan.php");
}elseif($aksi=="hapus"){
    $db->hapus($_GET['id']);
    header("location: laporan.php");
}