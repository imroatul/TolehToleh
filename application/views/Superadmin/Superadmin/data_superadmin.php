<div class="content-admin">
<button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-tosca"><span class="glyphicon glyphicon-plus"></span>&nbsp;Tambah Admin</button><br/>
<br/>
<?php
	$per_hal=5;
	$jumlah_record=mysql_query("SELECT COUNT(*) from admin");
	$jum=mysql_result($jumlah_record, 0);
	$halaman=ceil($jum / $per_hal);
	$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
	$start = ($page - 1) * $per_hal;
?>
<div class="col-md-7">
   	<a style="margin-bottom:10px" href="http://localhost/TolahToleh/Superadmin/superadmin/excel_admin" target="_blank" class="btn btn-default pull-right"><span class='glyphicon glyphicon-print'></span>  Excel</a>
</div>
<form action="<?php echo site_url('Superadmin/superadmin/data_superadmin/'); ?>" method="get">
	<div class="input-group col-md-5 col-md-offset-7">
		<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search"></span></span>
		<input type="text" class="form-control" placeholder="Cari Barang .." aria-describedby="basic-addon1" name="cari">
	</div>
</form>
<br/>
<table class="table table-bordered">
	<tr>
		<th class="col-md-1">No</th>
		<th class="col-md-0">Nama</th>
		<th class="col-md-0">Password</th>
		<th class="col-md-0">Level</th>
		<th class="col-md-0">E-mail</th>
        <th class="col-md-0">JK</th>
        <th class="col-md-0">Alamat</th>
        <th class="col-md-0">Telepon</th>
		<th class="col-md-0">Pilihan</th>
	</tr>
<?php
if(empty($query))
 {
 echo "<tr><td colspan=\"6\">Data tidak tersedia</td></tr>";
 }else
 {
 $no = 1;
 foreach($query as $row)
 {
 ?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $u->namaAdmin ?></td>
			<td><?php echo $u->passwordAdmin ?></td>
            <td><?php echo $u->level ?></td>
            <td><?php echo $u->emailAdmin ?></td>
            <td><?php echo $u->jkAdmin ?></td>
            <td><?php echo $u->alamatAdmin ?></td>
            <td><?php echo $u->telpAdmin ?></td>
			<td>
			    <?php echo anchor('http://localhost/TolahToleh/index.php/Superadmin/superadmin/edit_superadmin/'.$u->idAdmin,'Edit'); ?>
                <?php echo anchor('http://localhost/TolahToleh/index.php/Superadmin/superadmin/hapus_superadmin/'.$u->idAdmin,'Hapus'); ?>
			</td>
            
		</tr>
 <?php
 $no++;
 }}
 ?>
 </table>
 <div class="halaman">Halaman : <?php echo $halaman;?></div>

<div id="myModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">
                <?php
				mysql_connect("localhost", "root", "");
				mysql_select_db("tolahtoleh");
				$query = "SELECT max(idAdmin) as idMaks FROM admin";
				$hasil = mysql_query($query);
				$data  = mysql_fetch_array($hasil);
				$idadmin = $data['idMaks'];

				//mengatur 2 karakter sebagai jumalh karakter yang tetap
				//mengatur 3 karakter untuk jumlah karakter yang berubah-ubah
				$noUrut = (int) substr($idadmin, 3, 2);
				$noUrut++;

				//menjadikan T sebagai 1 karakter yang tetap
				$char = "TTA";
				//%03s untuk mengatur 3 karakter di belakang S
				$IDbaru = $char . sprintf("%02s", $noUrut);
				?>
                <form role="form" action="http://localhost/TolahToleh/index.php/Superadmin/superadmin/tambah_superadmin" method="post">
                      <div class="form-group">
                      <input type="text" class="form-control" placeholder="Kode" name="idAdmin" value="<?php echo $IDbaru; ?>" readonly= "readonly">
                      </div>
                      <div class="form-group">
                      <input type="text" name="namaAdmin" class="form-control" placeholder="Nama" required>
                      </div>
                      <div class="form-group">
                      <input type="password" name="passwordAdmin" class="form-control" placeholder="Password" required>
                      </div>
                      <div class="form-group">
                      <td><select name="level" id="level" class="form-control" placeholder="Level" required>
                	      <option value="">Pilih Level...</option>
                          <option value="Superadmin">Superadmin</option>
                          <option value="Admin">Admin</option>
                          </select>
                      </td>
                      </div>
                      <div class="form-group">
                      <input type="text" name="emailAdmin" class="form-control" placeholder="E-mail" required>
                      </div>
                      <div class="form-group">
                      <td><select name="jkAdmin" id="jkAdmin" class="form-control" placeholder="Jenis Kelamin" required>
                	      <option value="">Jenis Kelamin...</option>
                          <option value="P">Wanita</option>
                          <option value="L">Laki-Laki</option>
                          </select>
                      </td>
                      </div>
                      <div class="form-group">
                      <input type="text" name="alamatAdmin" class="form-control" placeholder="Alamat" required>
                      </div>
                      <div class="form-group">
                      <input type="text" name="telpAdmin" class="form-control" placeholder="Telepon" required>
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
