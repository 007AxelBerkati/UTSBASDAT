<?php
//memasukkan file config.php
include('config.php');
?>


	<div class="container" style="margin-top:20px">
		<center><font size="6">Kelola Dependent</font></center>
		<hr>
		<a href="index.php?page=tambah6"><button class="btn btn-dark right">Tambah Data</button></a>
		<div class="table-responsive">
		<table class="table table-striped jambo_table bulk_action">
			<thead>
				<tr>
					<th>NO.</th>
					<th>Essn</th>
					<th>Dependent name</th>
					<th>Sex</th>
					<th>Bdate</th>
					<th>Relationship</th>
					<th>aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				
				$sql = mysqli_query($koneksi, "SELECT * FROM dependent ORDER BY Essn DESC") or die(mysqli_error($koneksi));
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
							<td>'.$data['Dependent_name'].'</td>
							<td>'.$data['Sex'].'</td>
							<td>'.$data['Bdate'].'</td>
							<td>'.$data['Relationship'].'</td>
							<td>
								<a href="index.php?page=edit6&Dependent_name='.$data['Dependent_name'].'" class="btn btn-secondary btn-sm">Edit</a>
								<a href="delete6.php?Dependent_name='.$data['Dependent_name'].'" class="btn btn-danger btn-sm" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Delete</a>
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
