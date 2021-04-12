<?php
//memasukkan file config.php
include('config.php');
?>


	<div class="container" style="margin-top:20px">
		<center><font size="6">Data Employee</font></center>
		<hr>
		<a href="index.php?page=tambah1"><button class="btn btn-dark right">Tambah Data</button></a>
		<div class="table-responsive">
		<table class="table table-striped jambo_table bulk_action">
			<thead>
				<tr>
					<th>NO.</th>
					<th>Fname</th>
					<th>Minit</th>
					<th>Lname</th>
					<th>Ssn</th>
					<th>Bdate</th>
					<th>Address</th>
					<th>Sex</th>
					<th>Salary</th>
					<th>Super_ssn</th>
					<th>Dno</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				//query ke database SELECT tabel mahasiswa urut berdasarkan id yang paling besar
				$sql = mysqli_query($koneksi, "SELECT * FROM employee ORDER BY Ssn DESC") or die(mysqli_error($koneksi));
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
							<td>'.$data['Fname'].'</td>
							<td>'.$data['Minit'].'</td>
							<td>'.$data['Lname'].'</td>
							<td>'.$data['Ssn'].'</td>
							<td>'.$data['Bdate'].'</td>
							<td>'.$data['Address'].'</td>
							<td>'.$data['Sex'].'</td>
							<td>'.$data['Salary'].'</td>
							<td>'.$data['Super_ssn'].'</td>
							<td>'.$data['Dno'].'</td>
							<td>
								<a href="index.php?page=edit1&Ssn='.$data['Ssn'].'" class="btn btn-secondary btn-sm">Edit</a>
								<a href="delete.php?Ssn='.$data['Ssn'].'" class="btn btn-danger btn-sm" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Delete</a>
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
