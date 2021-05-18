<?php
//memasukkan file config.php
include('config.php');
?>


	<div class="container" style="margin-top:20px">
		<center><font size="6">Kelola Department</font></center>
		<hr>
		<a href="index.php?page=tambah2"><button class="btn btn-dark right">Tambah Data</button></a>
		<div class="table-responsive">
		<table class="table table-striped jambo_table bulk_action">
			<thead>
				<tr>
                    <th>NO.</th>
                    <th>Dname</th>
					<th>Dnumber</th>
					<th>Mgr_ssn</th>
					<th>Mgr_start_date</th>
					<th>aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
			
				$sql = mysqli_query($koneksi, "SELECT * FROM department ORDER BY Dnumber ASC") or die(mysqli_error($koneksi));
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
							<td>'.$data['Dname'].'</td>
							<td>'.$data['Dnumber'].'</td>
							<td>'.$data['Mgr_ssn'].'</td>
							<td>'.$data['Mgr_start_date'].'</td>
							<td>
								<a href="index.php?page=edit2&Dnumber='.$data['Dnumber'].'" class="btn btn-secondary btn-sm">Edit</a>
								<a href="delete2.php?Dnumber='.$data['Dnumber'].'" class="btn btn-danger btn-sm" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Delete</a>
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
