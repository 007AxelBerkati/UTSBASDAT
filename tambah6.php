<?php include('config.php'); ?>

		<center><font size="6">Tambah Data</font></center>
		<hr>
		<?php
		if(isset($_POST['submit'])){
			$Essn			= $_POST['Essn'];
			$Dependent_name			= $_POST['Dependent_name'];
			$Sex	= $_POST['Sex'];
			$Bdate		= $_POST['Bdate'];
			$Relationship		= $_POST['Relationship'];

			$cek = mysqli_query($koneksi, "SELECT * FROM dependent WHERE Essn='$Essn' or Dependent_name ='$Dependent_name'") or die(mysqli_error($koneksi));

				$sql = mysqli_query($koneksi, "INSERT INTO dependent (Nim, Nama_Mhs, Jenis_Kelamin, Program_Studi) VALUES('$Essn','$Dependent_name','$Sex','$Bdate','$Relationship')") or die(mysqli_error($koneksi));

				if($sql){
					echo '<script>alert("Berhasil menambahkan data."); document.location="index.php?page=tampil6";</script>';
				}else{
					echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
				}
		}
		?>

		<form action="index.php?page=tambah6" method="post">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Essn</label>
				<div class="col-md-6 col-sm-6 ">
					<input type="text" name="Essn" class="form-control" size="4" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Dependent_name</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="Dependent_name" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Sex</label>
				<div class="col-md-6 col-sm-6 ">
					<div class="btn-group" data-toggle="buttons">
						<label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
							<input type="radio" class="join-btn" name="Jenis_Kelamin" value="M" required>Laki-Laki
						</label>
						<label class="btn btn-primary " data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
							<input type="radio" class="join-btn" name="Jenis_Kelamin" value="F" required>Perempuan
						</label>
					</div>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Bdate</label>
				<div class="col-md-6 col-sm-6 ">
					<input type="text" name="Bdate" class="form-control" size="4" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Relationship</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="Relationship" class="form-control" required>
				</div>
			</div>
				<div class="item form-group">
				<div  class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
			</div>
		
		</form>
	</div>
