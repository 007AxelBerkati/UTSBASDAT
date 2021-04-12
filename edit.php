<?php include('config.php'); ?>


	<div class="container" style="margin-top:20px">
		<center><font size="6">Edit Data</font></center>

		<hr>

		<?php
		//jika sudah mendapatkan parameter GET id dari URL
		if(isset($_GET['Ssn'])){
			//membuat variabel $id untuk menyimpan id dari GET id di URL
			$Ssn = $_GET['Ssn'];

			//query ke database SELECT tabel mahasiswa berdasarkan id = $id
			$select = mysqli_query($koneksi, "SELECT * FROM employee WHERE Ssn='$Snn'") or die(mysqli_error($koneksi));

			//jika hasil query = 0 maka muncul pesan error
			if(mysqli_num_rows($select) == 0){
				echo '<div class="alert alert-warning">ID tidak ada dalam database.</div>';
				exit();
			//jika hasil query > 0
			}else{
				//membuat variabel $data dan menyimpan data row dari query
				$data = mysqli_fetch_assoc($select);
			}
		}
		?>

		<?php
		//jika tombol simpan di tekan/klik
		if(isset($_POST['submit'])){
			$Fname			= $_POST['Fname'];
			$Minit	= $_POST['Minit'];
			$Lname	= $_POST['Lname'];
			$Ssn		= $_POST['Ssn'];
			$Ssnbaru		= $_POST['Ssnbaru'];
			$Bdate	= $_POST['Bdate'];
			$Address	= $_POST['Address'];
			$Sex	= $_POST['Sex'];
			$Salary	= $_POST['Salary'];
			$Super_ssn	= $_POST['Super_ssn'];
			$Dno	= $_POST['Dno'];

			$sql = mysqli_query($koneksi, "UPDATE employee SET Fname='$Fname', Minit='$Minit', Lname='$Lname', Bdate='$Bdate', Address='$Address', Sex='$Sex', Salary='$Salary', super_ssn='$super_ssn', Dno='$Dno' WHERE Ssn='$Ssn'") or die(mysqli_error($koneksi));

			if($sql){
				echo '<script>alert("Berhasil menyimpan data."); document.location="index.php?page=tampil1";</script>';
			}else{
				echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
			}
		}
		?>

		<form action="index.php?page=edit&Ssn=<?php echo $Ssn; ?>" method="post">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Fname</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="Fname" class="form-control" value="<?php echo $data['Fname']; ?>" required>
				</div>
			</div>

			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Minit</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="Minit" class="form-control" value="<?php echo $data['Minit']; ?>" required>
				</div>
			</div>
			
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Lname</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="Lname" class="form-control" value="<?php echo $data['Lname']; ?>" required>
				</div>
			</div>
			
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Ssn</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="Ssn" class="form-control" value="<?php echo $data['Ssn']; ?>" required>
				</div>
			</div>
			
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Bdate</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="Bdate" class="form-control" value="<?php echo $data['Bdate']; ?>" required>
				</div>
			</div>
			
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Address</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="Address" class="form-control" value="<?php echo $data['Address']; ?>" required>
				</div>
			</div>

			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Sex</label>
				<div class="col-md-6 col-sm-6 ">
					<div class="btn-group" data-toggle="buttons">
						<label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
							<input type="radio" class="join-btn" name="Sex" value="L" <?php if($data['Sex'] == 'Laki-laki'){ echo 'checked'; } ?> required>Laki-laki
						</label>
						<label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
							<input type="radio" class="join-btn" name="Sex" value="M" <?php if($data['Sex'] == 'Perempuan'){ echo 'checked'; } ?> required>perempuan
						</label>
					</div>
				</div>
			</div>

			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Salary</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="Salary" class="form-control" value="<?php echo $data['Salary']; ?>" required>
				</div>
			</div>

			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Super_ssn</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="Super_ssn" class="form-control" value="<?php echo $data['Super_ssn']; ?>" required>
				</div>
			</div>

			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">dno</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="dno" class="form-control" value="<?php echo $data['dno']; ?>" required>
				</div>
			</div>

			<div class="item form-group">
				<div class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
					<a href="index.php?page=tampil_mhs" class="btn btn-warning">Kembali</a>
				</div>
			</div>
		</form>
	</div>
