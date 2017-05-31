<?php
    header ("Cache-Control: no-cache, must-revalidate");
    header ("Pragma: no-cache");
    header ("Content-type: application/x-msexcel");
    header ("Content-Disposition: attachment; filename=cetak-laporan-barang-excel.xls");
?>
<html>
<head>
	<title>Cetak Excel</title>
</head>
<body>

<h1 style="text-align: center;">Data Makanan dan Minuman</h1>

<style>
table {
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
}
</style>

<table border="1" align="center">
<tr>
	<th>No</th>
	<th>Foto</th>
	<th>Deskripsi</th>
	<th>Nama</th>
	<th>Kategori</th>
    <th>Harga</th>
    <th>Stok</th>
</tr>
<?php
if( ! empty($barang)){
	$no = 1;
	foreach($barang as $data){
		echo "<tr>";
		echo "<td>".$no."</td>";
		echo "<td>".$data->fotoBarang."</td>";
		echo "<td>".$data->deskripsi."</td>";
		echo "<td>".$data->namaBarang."</td>";
		echo "<td>".$data->kategoriBarang."</td>";
		echo "<td>".$data->hargaBarang."</td>";
		echo "<td>".$data->stokBarang."</td>";
		echo "</tr>";
		$no++;
	}
}
?>
</table>

</body>
</html>
