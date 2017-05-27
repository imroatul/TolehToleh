	<body>
 
	<div class="container">
	<h3>Hasil Pencarian</h3>
	<hr>
 
		<?php
 
		if(count($cari)>0)
		{
			foreach ($cari as $data) {
			echo $data->namaBarang . " => " . $data->hargaBarang ." => " . $data->stokBarang ."<br>";
			}
		}
 
		else
		{
			echo "Data tidak ditemukan";
		}
 
		?>
 
	</div>
	</body>