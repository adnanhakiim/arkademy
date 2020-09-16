<?php
include_once('includes/header.inc.php');
include_once('includes/produk.inc.php');

$pro = new Produk($db);
$stmt = $pro->readAll();
$count = $pro->countAll();

if (isset($_POST['hapus-contengan'])) {
    $imp = "('".implode("','", array_values($_POST['checkbox']))."')";
    $result = $pro->hapusell($imp);
    if ($result) { ?>
        <script type="text/javascript">
          window.onload=function(){
              showSuccessToast();
              setTimeout(function(){
                  window.location.reload(1);
                  history.go(0)
                  location.href = location.href
              }, 5000);
          };
        </script> <?php
    } else { ?>
        <script type="text/javascript">
          window.onload=function(){
              showErrorToast();
              setTimeout(function(){
                  window.location.reload(1);
                  history.go(0)
                  location.href = location.href
              }, 5000);
          };
        </script> <?php
    }
}
?>

<div class="row">
  <div class="col-xs-13 col-sm-13 col-md-12">
    <ol class="breadcrumb">
      <li class="active">Data Produk</li>
    </ol>
    <form method="post">
      <div class="row">
        <div class="col-md-6 text-left">
          <strong style="font-size:18pt;"><span class="fa fa-book"></span>Data Produk</strong>
        </div>
        <div class="col-md-6 text-right">
          <div class="btn-group">
            <button type="submit" name="hapus-contengan" class="btn btn-danger"><span class="fa fa-close"></span> Hapus Contengan</button>
            <button type="button" onclick="location.href='data-produk-baru.php'" class="btn btn-primary"><span class="fa fa-clone"></span> Tambah Data</button>
          </div>
        </div>
      </div>
      <br/>

    <table width="100%" class="table table-striped table-bordered" id="tabeldata">
      <thead>
        <tr>
          <th width="10px"><input type="checkbox" name="select-all" id="select-all" /></th>
          <th>ID</th>
          <th>Nama Produk</th>
          <th>Keterangan</th>
          <th>Harga</th>
          <th>Jumlah</th>
          <th width="100px">Aksi</th>
        </tr>
      </thead>
        <tfoot>
          <tr>
            <th><input type="checkbox" name="select-all2" id="select-all2" /></th>
            <th>ID</th>
            <th>Produk</th>
            <th>Keterangan</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Aksi</th>
          </tr>
        </tfoot>
        <tbody>
          <?php $no=1; while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
            <tr>
              <td><input type="checkbox" value="<?=$row['id_produk']?>" name="checkbox[]" /></td>
              <td><?=$row['id_produk'] ?></td>
              <td><?=$row['nama_produk'] ?></td>
              <td><?=$row['keterangan'] ?></td>
              <td><?=$row['harga'] ?></td>
              <td><?=$row['jumlah'] ?></td>
              <td class="text-center">
                <a href="data-produk-ubah.php?id_produk=<?=$row['id_produk']?>" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                <a href="data-produk-hapus.php?id_produk=<?=$row['id_produk']?>" onclick="return confirm('Yakin ingin menghapus data')" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
              </td>
            </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </form>
  </div>
</div>
