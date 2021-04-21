<?php
//memasukkan file config.php
include('config.php');
?>


	<div class="container" style="margin-top:20px">
		<center><font size="6">Data Works On</font></center>
		<hr>
		<a href="index.php?page=tambah5"><button class="btn btn-dark right">Tambah Data</button></a>
		<div class="table-responsive">
		<table class="table table-striped jambo_table bulk_action">
			<thead>
				<tr>
					<th>NO.</th>
					<th>Essn</th>
					<th>Pno</th>
					<th>Hours</th>
					<th>aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				//query ke database SELECT tabel mahasiswa urut berdasarkan id yang paling besar
				$sql = mysqli_query($koneksi, "SELECT * FROM works_on ORDER BY Essn DESC") or die(mysqli_error($koneksi));
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
							<td>'.$data['Essn'].'</td>
							<td>'.$data['Pno'].'</td>
							<td>'.$data['Hours'].'</td>
							<td>
								<a href="index.php?page=edit5&Essn='.$data['Essn'].'" class="btn btn-secondary btn-sm">Edit</a>
								<form action="delete5.php" method="get">
								<input type="hidden" name="essn" value="'.$data['Essn'].'">
								<input type="hidden" name="pno" value="'.$data['Pno'].'">
								<button type="submit" name="submit">submit</button>
								</form>
							</td>
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
