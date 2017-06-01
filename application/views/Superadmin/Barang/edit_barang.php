<!DOCTYPE html>
<html lang="en">
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h3><span class="glyphicon glyphicon-briefcase"></span>  Edit Data Barang</h3>
  <a class="btn" href="<?php echo base_url(). 'index.php/Superadmin/superadmin/index'; ?>"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>
  <?php foreach($barang as $u){ ?>
	<form action="<?php echo base_url(). 'index.php/Superadmin/superadmin/update_barang'; ?>" method="post">
		<table class="table">
			<tr>
				<td></td>
				<td><input type="hidden" name="idBarang" value="<?php echo $u->idBarang ?>"></td>
			</tr>
            <tr>
				<td>Foto</td>
				<td><img src="includes/img/Barang/<?php echo $u->fotoBarang;?>"height="60px" width="60px" /><input type="file" class="form-control" name="fotoBarang"></td>
			</tr>
            <tr>
				<td>Deskripsi</td>
				<td><input type="text" class="form-control" name="deskripsi" value="<?php echo $u->deskripsi ?>"></td>
			</tr>
			<tr>
				<td>Nama Barang</td>
				<td><input type="text" class="form-control" name="namaBarang" value="<?php echo $u->namaBarang ?>"></td>
			</tr>
			<tr>
				<td>Kategori Barang</td>
				<td>
                <select name="kategoriBarang" required>
      <option value=""></option>
      <option value="Makanan" <?php if($u->kategoriBarang == 'Makanan'){ echo 'selected'; } ?>>Makanan</option> 
      <option value="Minuman" <?php if($u->kategoriBarang == 'Minuman'){ echo 'selected'; }?>>Minuman</option>
     </select>
                <br/></td>
			</tr>
            <tr>
				<td>Harga</td>
				<td><input type="text" class="form-control" name="hargaBarang" value="<?php echo $u->hargaBarang ?>"></td>
			</tr>
			<tr>
				<td>Stok</td>
				<td><input type="text" class="form-control" name="stokBarang" value="<?php echo $u->stokBarang ?>"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" class="btn btn-info" value="Simpan">
               	<a class="btn btn-info" href="<?php echo base_url(). 'index.php/Superadmin/superadmin/'; ?>">Batal</a>

                </td>
			</tr>
		</table>
	</form>
	<?php 
}
?>
</body>
</html>
