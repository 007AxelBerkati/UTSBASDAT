<?php
//memasukkan file config.php
include('config.php');
?>
	<div class="container" style="margin-top:20px">
		<center><font size="6">Notifikasi</font></center>
		<hr>
		<div class="table-responsive">
		<table class="table table-striped jambo_table bulk_action">
			<thead>
				<tr>
					<th>NO.</th>
					<th>essn</th>
					<th>hours</th>
					<th>notify</th>
				</tr>
			</thead>
			<tbody>
				<?php
				
				$sql = mysqli_query($koneksi, "SELECT * FROM temp ORDER BY essn DESC") or die(mysqli_error($koneksi));
				//jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
				if(mysqli_num_rows($sql) > 0){
					//membuat variabel $no untuk menyimpan nomor urut
					$no = 1;
					//melakukan perulangan while dengan dari dari query $sql
					while($data = mysqli_fetch_assoc($sql)){
						//menampilkan data perulangan
						echo '
						<tr>
							<td>'.$no.'</td>
							<td>'.$data['essn'].'</td>
							<td>'.$data['hours'].'</td>
							<td>'.$data['notify'].'</td>

						</tr>
						';
						$no++;
					}
				//jika query menghasilkan nilai 0
				}else{
					echo '
					<tr>
						<td colspan="6">Tidak ada data.</td>
					</tr>
					';
				}
				?>
			<tbody>
		</table>
	</div>
	</div>
