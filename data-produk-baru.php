<?php
include_once('includes/header.inc.php');
include_once('includes/produk.inc.php');

$jurObj = new Produk($db);

if ($_POST) {

	$jurObj->id_produk = $_POST['id_produk'];
	$jurObj->nama_produk = $_POST['nama_produk'];
	$jurObj->keterangan = $_POST['keterangan'];
	$jurObj->harga = $_POST['harga'];
	$jurObj->jumlah = $_POST['jumlah'];

	if ($jurObj->insert()) { ?>
		<script type="text/javascript">
			window.onload=function(){
				showStickySuccessToast();
			};
		</script> <?php
	} else { ?>
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
			<li class="active">Tambah Data</li>
		</ol>
		<p style="margin-bottom:10px;">
			<strong style="font-size:18pt;"><span class="fa fa-clone"></span> Tambah Program Studi</strong>
		</p>
		<div class="panel panel-default">
			<div class="panel-body">
				<form method="post" id="form">
					<div class="form-group">
						<label for="id_produk">ID</label>
					  <input type="text" class="form-control" id="id_produk" name="id_produk" required readonly="on" value="<?=$jurObj->getNewID()?>">
					</div>
					<div class="form-group">
						<label for="nama_produk">Nama Produk</label>
						<input type="text" class="form-control" id="nama_produk" name="nama_produk" required="on">
					</div>
					<div class="form-group">
						<label for="keterangan">Keterangan</label>
						<input type="text" class="form-control" id="keterangan" name="keterangan" minlength="5" required="on">
					</div>
					<div class="form-group">
						<label for="harga">Harga</label>
						<input type="text" class="form-control" id="harga" name="harga" required="on">
					</div>
					<div class="form-group">
						<label for="jumlah">Jumlah</label>
						<input type="text" class="form-control" id="jumlah" name="jumlah" required="on">
					</div>
					<div class="btn-group">
						<button type="submit" class="btn btn-dark">Simpan</button>
						<button type="button" onclick="location.href='index.php'" class="btn btn-default">Kembali</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
