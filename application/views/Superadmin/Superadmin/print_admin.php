<?php
    header ("Cache-Control: no-cache, must-revalidate");
    header ("Pragma: no-cache");
    header ("Content-type: application/x-msexcel");
    header ("Content-Disposition: attachment; filename=cetak-laporan-admin-excel.xls");
?>
<html>
<head>
	<title>Cetak Excel</title>
</head>
<body>

<h1 style="text-align: center;">Data Admin dan Superadmin</h1>

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
	<th>Nama</th>
	<th>Password</th>
	<th>Level</th>
	<th>Email</th>
    <th>JK</th>
    <th>Alamat</th>
    <th>Telp</th>
</tr>
<?php
if( ! empty($admin)){
	$no = 1;
	foreach($admin as $data){
		echo "<tr>";
		echo "<td>".$no."</td>";
		echo "<td>".$data->namaAdmin."</td>";
		echo "<td>".$data->passwordAdmin."</td>";
		echo "<td>".$data->level."</td>";
		echo "<td>".$data->emailAdmin."</td>";
		echo "<td>".$data->jkAdmin."</td>";
		echo "<td>".$data->alamatAdmin."</td>";
		echo "<td>".$data->telpAdmin."</td>";
		echo "</tr>";
		$no++;
	}
}
?>
</table>

</body>
</html>
