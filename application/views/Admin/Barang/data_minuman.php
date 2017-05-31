<div class="content-admin">
<button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-tosca"><span class="glyphicon glyphicon-plus"></span>&nbsp;Tambah Barang</button>
<div class="col-md-1">
   	<a style="margin-bottom:10px" href="http://localhost/TolahToleh/index.php/Admin/admin/excel_barang_minuman" target="_blank" class="btn btn-default pull-right"><span class='glyphicon glyphicon-print'></span>  Excel</a>
</div>
<br/>
<br/>
<?php
	$per_hal=10;
	$jumlah_record=mysql_query("SELECT COUNT(*) from barang");
	$jum=mysql_result($jumlah_record, 0);
	$halaman=ceil($jum / $per_hal);
	$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
	$start = ($page - 1) * $per_hal;
?>
<!---<form action="http://localhost/TolahToleh/index.php/Admin/admin/cari_barang" method="get">
	<div class="input-group col-md-5 col-md-offset-7">
		<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search"></span></span>
		<input type="text" class="form-control" placeholder="Cari Barang .." aria-describedby="basic-addon1" name="cari">
	</div>
</form>--->
<br/>
<table class="table table-bordered">
	<tr>
		<th class="col-md-1">No</th>
    <th class="col-md-0">Foto</th>
		<th class="col-md-0">Nama Barang</th>
		<th class="col-md-0">Kategori</th>
		<th class="col-md-0">Harga Barang</th>
		<th class="col-md-0">Stok</th>
		<th class="col-md-0">Pilihan</th>
	</tr>
	<?php
	if(isset($_GET['cari_barang'])){
		$cari=mysql_real_escape_string($_GET['cari_barang']);
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
			    <?php echo anchor('http://localhost/TolahToleh/Admin/admin/edit/'.$u->idBarang,'Edit'); ?>
                <?php echo anchor('http://localhost/TolahToleh/Admin/admin/hapus/'.$u->idBarang,'Hapus'); ?>
			</td>
		</tr>
		<?php } ?>
</table>
<ul class="pagination">
			<?php
			for($x=1;$x<=$halaman;$x++){
				?>
				<li><a href=""><?php echo $x ?></a></li>
				<?php
			}
			?>
</ul>
<!-- modal input -->
<div id="myModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">
                <?php
				mysql_connect("localhost", "root", "");
				mysql_select_db("tolahtoleh");
				$query = "SELECT max(idBarang) as idMaks FROM barang";
				$hasil = mysql_query($query);
				$data  = mysql_fetch_array($hasil);
				$idbarang = $data['idMaks'];

				//mengatur 2 karakter sebagai jumalh karakter yang tetap
				//mengatur 3 karakter untuk jumlah karakter yang berubah-ubah
				$noUrut = (int) substr($idbarang, 2, 3);
				$noUrut++;

				//menjadikan S sebagai 1 karakter yang tetap
				$char = "TT";
				//%03s untuk mengatur 3 karakter di belakang S
				$IDbaru = $char . sprintf("%03s", $noUrut);
				?>
                <form role="form" action="<?php echo base_url(). 'index.php/Admin/admin/tambah_aksi'; ?>" method="post">
                      <div class="form-group">
                      <input type="text" class="form-control" placeholder="Kode" name="idBarang" value="<?php echo $IDbaru; ?>" readonly= "readonly">
                      </div>
                      <div class="form-group">
                      <input type="file" name="fotoBarang" class="form-control" placeholder="Foto" required>
                      </div>
                      <div class="form-group">
                      <input type="text" name="namaBarang" class="form-control" placeholder="Nama Barang" required>
                      </div>
                      <div class="form-group">
                      <td><select name="kategoriBarang" id="kategoriBarang" class="form-control" placeholder="Kategori" required>
                	      <option value="">Pilih Kategori...</option>
                          <option value="Makanan">Makanan</option>
                          <option value="Minuman">Minuman</option>
                          </select>
                      </td>
                      </div>
                      <div class="form-group">
                      <input type="text" name="hargaBarang" class="form-control" placeholder="Harga" required>
                      </div>
                      <div class="form-group">
                      <input type="text" name="stokbarang" class="form-control" placeholder="Stok" required>
                      </div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
					<input type="submit" class="btn btn-primary" value="Simpan">
				</div>
			</form>
		</div>
	</div>
</div>
</div>
