<div class="content-admin">
<div class="col-md-1 mb">
   	<a style="margin-bottom:10px" href="http://localhost/TolahToleh/index.php/Superadmin/superadmin/excel_admin" target="_blank" class="btn btn-default pull-right"><span class='glyphicon glyphicon-print'></span>  Excel</a>
</div>
<br/>
<?php
	$per_hal=10;
	$jumlah_record=mysql_query("SELECT COUNT(*) from member ");
	$jum=mysql_result($jumlah_record, 0);
	$halaman=ceil($jum / $per_hal);
	$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
	$start = ($page - 1) * $per_hal;
?>
<!--<form action="<!-?php print base_url();?>Superadmin/superadmin/cari" method="post">
	<div class="input-group col-md-5 col-md-offset-7">
		<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search"></span></span>
		<input type="text" class="form-control" placeholder="Cari Admin .." aria-describedby="basic-addon1" name="cari">
	</div>
</form>--->
    <br/>
<table class="table table-bordered">
		<tr>
            <th>No</th>
            <th>Email</th>
            <th>Password</th>
            <th>Nama</th>
            <th>JK</th>
            <th>Alamat</th>
            <th>Kota</th>
            <th>Telp</th>
        </tr>		
		<?php 
		$no = 1;
		foreach($member as $u){ 
		?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $u->emailMember ?></td>
            <td><?php echo $u->passwordMember ?></td>
			<td><?php echo $u->namaMember ?></td>
			<td><?php echo $u->jkMember ?></td>
            <td><?php echo $u->alamatMember ?></td>
            <td><?php echo $u->kotaMember ?></td>
            <td><?php echo $u->telpMember ?></td>
		</tr>
		<?php } ?>
	</table>
</div>