<!DOCTYPE html>
<html>
<head>
	<title>Membuat CRUD dengan CodeIgniter | MalasNgoding.com</title>
</head>
<body>
	<center>
		<h1>Membuat CRUD dengan CodeIgniter | MalasNgoding.com</h1>
		<h3>Tambah data baru</h3>
	</center>
	<form action="http://localhost/BukuTamu/index.php/Tamu/tambah_aksi" method="post">
		<table style="margin:20px auto;">
			<tr>
				<td>ID</td>
				<td><input type="text" name="id_tamu"></td>
			</tr>
            <tr>
				<td>Nama</td>
				<td><input type="text" name="nama"></td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td><input type="text" name="alamat"></td>
			</tr>
			<tr>
				<td>Pesan</td>
				<td><input type="text" name="pesan"></td>
			</tr>
            <tr>
				<td>ID User</td>
				<td><input type="text" name="id_user"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Tambah"></td>
			</tr>
		</table>
	</form>	
</body>
</html>