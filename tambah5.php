<?php include('config.php'); ?>

		<center><font size="6">Tambah Data</font></center>
		<hr>
		<?php
		if(isset($_POST['submit'])){
			$Essn			= $_POST['Essn'];
			$Pno			= $_POST['Pno'];
			$Hours			= $_POST['Hours'];
			

			$cek = mysqli_query($koneksi, "SELECT * FROM works_on WHERE Essn='$Essn' or Pno='$Pno'") or die(mysqli_error($koneksi));

			if(mysqli_num_rows($cek) == 0){
				$sql = mysqli_query($koneksi, "INSERT INTO works_on (Essn, Pno, Hours) VALUES('$Essn','$Pno','$Hours')") or die(mysqli_error($koneksi));

				if($sql){
					echo '<script>alert("Berhasil menambahkan data."); document.location="index.php?page=tampil5";</script>';
				}else{
					echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
				}
			}else{
				echo '<div class="alert alert-warning">Gagal, Pno atau Essn sudah terdaftar.</div>';
			}
		}
		?>

		<form action="index.php?page=tambah5" method="post">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Essn</label>
				<div class="col-md-6 col-sm-6 ">
					<input type="text" name="Essn" class="form-control" size="4" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Pno</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="Nama_Mhs" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Hours</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="Hours" class="form-control" required>
				</div>
			</div>
			
			
			<div class="item form-group">
				<div  class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
			</div>
		</form>
	</div>
