<div class="content-admin">
<a href="<?php echo'http://localhost/TolahToleh/index.php/main/tambah'; ?>" class="btn btn-teal btn-md"><span class="glyphicon glyphicon-plus"></span>&nbsp;Tambah Barang</a>

<?php
	$per_hal=10;
	$jumlah_record=mysql_query("SELECT COUNT(*) from barang");
	$jum=mysql_result($jumlah_record, 0);
	$halaman=ceil($jum / $per_hal);
	$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
	$start = ($page - 1) * $per_hal;
?>

<form action="cari_barang.php" method="get">
	<div class="input-group col-md-5 col-md-offset-7">
		<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search"></span></span>
		<input type="text" class="form-control" placeholder="Cari Barang .." aria-describedby="basic-addon1" name="cari">
	</div>
</form>
<br/>
<table class="table table-bordered">
	<tr>
		<th class="col-md-0">No</th>
    <th class="col-md-0">Foto</th>
		<th class="col-md-0">Nama Barang</th>
		<th class="col-md-0">Kategori</th>
		<th class="col-md-0">Harga Barang</th>
		<th class="col-md-0">Stok</th>
		<th class="col-md-0">Pilihan</th>
	</tr>
	<?php
	if(isset($_GET['cari'])){
		$cari=mysql_real_escape_string($_GET['cari']);
		$brg=mysql_query("select * from barang where namaBarang like '$cari'");
	}else{
		$brg=mysql_query("select * from barang limit $start, $per_hal");
	}
		$no = 1;
		foreach($barang as $u){
		?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $u->fotoBarang ?></td>
			<td><?php echo $u->namaBarang ?></td>
			<td><?php echo $u->kategoriBarang ?></td>
            <td>Rp.<?php echo $u->hargaBarang ?>,-</td>
            <td><?php echo $u->stokBarang ?></td>
			<td>
			    <?php echo anchor('http://localhost/BukuTamu/main/edit/'.$u->idBarang,'Edit'); ?>
                <?php echo anchor('http://localhost/BukuTamu/main/hapus/'.$u->idBarang,'Hapus'); ?>
			</td>
		</tr>
		<?php } ?>
</table>
<ul class="pagination">
			<?php
			for($x=1;$x<=$halaman;$x++){
				?>
				<li><a href="?page=<?php echo $x ?>"><?php echo $x ?></a></li>
				<?php
			}
			?>
</ul>
</div>
