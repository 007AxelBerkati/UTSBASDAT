<?php include('config.php'); ?>

		<center><font size="6">Tambah Data</font></center>
		<hr>
		<?php
		if(isset($_POST['submit'])){
			$Fname			= $_POST['Fname'];
			$Minit			= $_POST['Minit'];
			$Lname			= $_POST['Lname'];
			$Bdate			= $_POST['Bdate'];
			$Address			= $_POST['Address'];
			$Sex			= $_POST['Sex'];
			$Salary			= $_POST['Salary'];
			$Super_ssn			= $_POST['Super_ssn'];
			$Dno			= $_POST['Dno'];

			$cek = mysqli_query($koneksi, "SELECT * FROM employee WHERE Ssn='$Ssn'") or die(mysqli_error($koneksi));

			if(mysqli_num_rows($cek) == 0){
				$sql = mysqli_query($koneksi, "INSERT INTO employee VALUES('$Fname', '$Minit', '$Lname', '$Bdate', '$Sex', '$Salary', '$Super_ssn','$Dno')") or die(mysqli_error($koneksi));

				if($sql){
					echo '<script>alert("Berhasil menambahkan data."); document.location="index.php?page=tampil1";</script>';
				}else{
					echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
				}
			}else{
				echo '<div class="alert alert-warning">Gagal, Ssn sudah terdaftar.</div>';
			}
		}
		?>

		<form action="index.php?page=tambah1" method="post">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">First name</label>
				<div class="col-md-6 col-sm-6 ">
					<input type="text" name="Fname" class="form-control" size="4" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Minit</label>
				<div class="col-md-6 col-sm-6 ">
					<input type="text" name="Minit" class="form-control" size="4" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Last name</label>
				<div class="col-md-6 col-sm-6 ">
					<input type="text" name="Lname" class="form-control" size="4" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Ssn</label>
				<div class="col-md-6 col-sm-6 ">
					<input type="text" name="Ssn" class="form-control" size="4" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Birth date</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="Bdate" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Address</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="Address" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Sex</label>
				<div class="col-md-6 col-sm-6 ">
					<div class="btn-group" data-toggle="buttons">
						<label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
							<input type="radio" class="join-btn" name="Sex" value="M" required>Laki-Laki
						</label>
						<label class="btn btn-primary " data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
							<input type="radio" class="join-btn" name="Sex" value="F" required>Perempuan
						</label>
					</div>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Salary</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="Salary" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Super_ssn</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="Super_ssn" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Dno</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="Dno" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<div  class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
			</div>
		</form>
	</div>
