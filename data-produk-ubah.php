<?php
include_once('includes/header.inc.php');

$id_produk = isset($_GET['id_produk']) ? $_GET['id_produk'] : die('ERROR: missing ID.');

include_once('includes/produk.inc.php');

$jurObj = new Produk($db);
$jurObj->id_produk = $id_produk;
$jurObj->readOne();

if($_POST){
	$jurObj->nama_produk = $_POST['nama_produk'];
	$jurObj->keterangan = $_POST['keterangan'];
	$jurObj->harga = $_POST['harga'];
	$jurObj->jumlah = $_POST['jumlah'];
	if($jurObj->update()){
		echo "<script>location.href='index.php'</script>";
	} else{ ?>
		<script type="text/javascript">
			window.onload=function(){
				showStickyErrorToast();
			};
		</script> <?php
	}
}
?>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12">
		<ol class="breadcrumb">
			<li><a href="index.php">Data Produk</a></li>
			<li class="active">Ubah Data</li>
		</ol>
		<p style="margin-bottom:10px;">
			<strong style="font-size:18pt;"><span class="fa fa-pencil"></span> Ubah Data</strong>
		</p>
		<div class="panel panel-default">
			<div class="panel-body">
			<form method="post" id="form">
				<div class="form-group">
					<label for="id_produk">ID</label>
					<input type="text" class="form-control" id="id_produk" name="id_produk" value="<?php echo $jurObj->id_produk; ?>" readonly>
				</div>
				<div class="form-group">
					<label for="nama_produk">Nama Produk</label>
					<input type="text" class="form-control" id="nama_produk" name="nama_produk" value="<?php echo $jurObj->nama_produk; ?>" required="on">
				</div>
				<div class="form-group">
					<label for="keterangan">Keterangan</label>
					<input type="text" class="form-control" id="keterangan" name="keterangan" value="<?php echo $jurObj->keterangan; ?>" minlength="5" required="on">
				</div>
				<div class="form-group">
					<label for="harga">Harga</label>
					<input type="text" class="form-control" id="harga" name="harga" value="<?php echo $jurObj->harga; ?>" required="on">
				</div>
				<div class="form-group">
					<label for="jumlah">Jumlah</label>
					<input type="text" class="form-control" id="jumlah" name="jumlah" value="<?php echo $jurObj->jumlah; ?>" required="on">
				</div>
				<div class="btn-group">
					<button type="submit" class="btn btn-dark">Ubah</button>
					<button type="button" onclick="location.href='index.php'" class="btn btn-default">Kembali</button>
				</div>
			</form>
			</div>
		</div>
	</div>
</div>
