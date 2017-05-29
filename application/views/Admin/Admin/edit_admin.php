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
  <a class="btn" href="<?php echo base_url(). 'index.php/Admin/admin/data_admin'; ?>"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>
  <?php foreach($admin as $u){ ?>
	<form action="<?php echo base_url(). 'index.php/Admin/admin/update'; ?>" method="post">
		<table class="table">
			<tr>
				<td></td>
				<td><input type="hidden" name="idAdmin" value="<?php echo $u->idAdmin ?>"></td>
			</tr>
			<tr>
				<td>Nama Admin</td>
				<td><input type="text" class="form-control" name="namaAdmin" value="<?php echo $u->namaAdmin ?>"></td>
			</tr>
            <tr>
				<td>Password</td>
				<td><input type="text" class="form-control" name="passwordAdmin" value="<?php echo $u->passwordAdmin ?>"></td>
			</tr>
			<tr>
				<td>Level</td>
				<td>
                <select name="level" required>
                  <option value=""></option>
                  <option value="Superadmin" <?php if($u->level == 'Superadmin'){ echo 'selected'; } ?>>Superadmin</option> 
                  <option value="Admin" <?php if($u->level == 'Admin'){ echo 'selected'; }?>>Admin</option>
                </select>
                <br/></td>
			</tr>
            <tr>
				<td>E-mail</td>
				<td><input type="text" class="form-control" name="emailAdmin" value="<?php echo $u->emailAdmin ?>"></td>
			</tr>
			<tr>
				<td>Jenis Kelamin</td>
				<td><input type="text" class="form-control" name="jkAdmin" value="<?php echo $u->jkAdmin ?>"></td>
			</tr>
            <tr>
				<td>Alamat</td>
				<td><input type="text" class="form-control" name="alamatAdmin" value="<?php echo $u->alamatAdmin ?>"></td>
			</tr>
            <tr>
				<td>Telepon</td>
				<td><input type="text" class="form-control" name="telpAdmin" value="<?php echo $u->telpAdmin ?>"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" class="btn btn-info" value="Simpan">
               	<a class="btn btn-info" href="<?php echo base_url(). 'index.php/Admin/admin/data_admin'; ?>">Batal</a>

                </td>
			</tr>
		</table>
	</form>
	<?php 
}
?>
</body>
</html>
