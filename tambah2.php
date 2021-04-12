<?php include('config.php'); ?>

		<center><font size="6">Tambah Data</font></center>
		<hr>
		<?php
		if(isset($_POST['submit'])){
			$Dname			= $_POST['Dname'];
			$Dnumber			= $_POST['Dnumber'];
			$Mgr_ssn	= $_POST['Mgr_ssn'];
			$Mgr_start_date		= $_POST['Mgr_start_date'];

			$cek = mysqli_query($koneksi, "SELECT * FROM department WHERE Dnumber='$Dnumber'") or die(mysqli_error($koneksi));

			if(mysqli_num_rows($cek) == 0){
				$sql = mysqli_query($koneksi, "INSERT INTO department(Dname, Dnumber, Mger_ssn, Mger_start_date) VALUES('$Dname','$Dnumber','$Mgr_ssn','$Mgr_start_date')") or die(mysqli_error($koneksi));

				if($sql){
					echo '<script>alert("Berhasil menambahkan data."); document.location="index.php?page=tampil2";</script>';
				}else{
					echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
				}
			}else{
				echo '<div class="alert alert-warning">Gagal, Dnumber sudah terdaftar.</div>';
			}
		}
		?>

		<form action="index.php?page=tambah2" method="post">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Dname</label>
				<div class="col-md-6 col-sm-6 ">
					<input type="text" name="Dname" class="form-control" size="4" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Dnumber</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="Dnumber" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Mgr_ssn</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="Dnumber" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Mgr_start_date</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="Mgr_start_date" class="form-control" required>
				</div>
			</div>
			
			
			<div class="item form-group">
				<div  class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
			</div>
		</form>
	</div>