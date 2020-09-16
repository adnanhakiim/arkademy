<?php
include_once("includes/config.php");
$database = new Config();
$db = $database->getConnection();

include_once('includes/produk.inc.php');
$pro = new Produk($db);
$id_produk = isset($_GET['id_produk']) ? $_GET['id_produk'] : die('ERROR: missing ID.');
$pro->id_produk = $id_produk;

if($pro->delete()){
	echo "<script>location.href='index.php';</script>";
} else{
	echo "<script>alert('Gagal Hapus Data');location.href='index.php';</script>";
}
