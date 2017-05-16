<table class="table table-hover">
	<tr>
		<th class="col-md-0">No</th>
        <th class="col-md-1">Kategori</th>
		<th class="col-md-2">Nama Barang</th>
		<th class="col-md-1">Harga Barang</th>
		<th class="col-md-1">Deskripsi</th>
		<th class="col-md-1">Stock</th>
		<th class="col-md-1">Diskon</th>
        <th class="col-md-2">Gambar</th>
		<th class="col-md-3">Pilihan</th>
	</tr>
	<?php 
	if(isset($_GET['cari'])){
		$cari=mysql_real_escape_string($_GET['cari']);
		$brg=mysql_query("select * from tabel_barang where nama_barang like '$cari'");
	}else{
		$brg=mysql_query("select * from tabel_barang limit $start, $per_hal");
	}
	$no=1;
	while($b=mysql_fetch_array($brg)){

		?>
		<tr>
			<td><?php echo $no++ ?></td>
            <td><?php echo $b['kategori'] ?></td>
			<td><?php echo $b['nama_barang'] ?></td>
			<td>Rp.<?php echo $b['harga_barang'] ?>,-</td>
            <td><?php echo $b['deskripsi'] ?></td>
			<td><?php echo $b['stock'] ?></td>
            <td><?php echo $b['diskon'] ?></td>
            
            
            <td><img src="/images/galleryMelati/<?php echo $b['input_foto'];?>"height="60px" width="60px" /></td>
          
			<td>
				<a href="detail_barang.php?id=<?php echo $b['kode_barang']; ?>" class="btn btn-info">Detail</a>
				<a href="edit_barang.php?id=<?php echo $b['kode_barang']; ?>" class="btn btn-warning">Edit</a>
				<a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='hapus_barang.php?id=<?php echo $b['kode_barang']; ?>' }" class="btn btn-danger">Hapus</a>
			</td>
		</tr>		
		<?php 
	}
	?>
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