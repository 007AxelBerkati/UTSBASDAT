<?php include('config.php'); ?>


	<div class="container" style="margin-top:20px">
		<center><font size="6">Edit Data</font></center>

		<hr>

		<?php
		//jika sudah mendapatkan parameter GET id dari URL
		if(isset($_GET['Dnumber'])){
			//membuat variabel $id untuk menyimpan id dari GET id di URL
			$Dnumber = $_GET['Dnumber'];

			//query ke database SELECT tabel mahasiswa berdasarkan id = $id
			$select = mysqli_query($koneksi, "SELECT * FROM department WHERE Dnumber='$Dnumber'") or die(mysqli_error($koneksi));

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
			$Dname	    = $_POST['Dname'];
			$Mgr_ssn	= $_POST['Mgr_ssn'];
			$Mgr_start_date	= $_POST['Mgr_start_date'];
			
			$sql = mysqli_query($koneksi, "UPDATE department SET Dname='$Dname', Mgr_ssn='$Mgr_ssn', Mgr_start_date='$Mgr_start_date' WHERE Dnumber='$Dnumber'") or die(mysqli_error($koneksi));

			if($sql){
				echo '<script>alert("Berhasil menyimpan data."); document.location="index.php?page=tampil2";</script>';
			}else{
				echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
			}
		}
		?>

		<form action="index.php?page=edit2&Dnumber=<?php echo $Dnumber; ?>" method="post">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nomor Department</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="Dnumber" class="form-control" size="4" value="<?php echo $data['Dnumber']; ?>" readonly required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nama Department</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="Dname" class="form-control" value="<?php echo $Dname['Dname']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Date Start</label>
				<div class="col-md-6 col-sm-6">
					<input type="date" name="Mgr_start_date" class="form-control" value="<?php echo $Mgr_start_date['Mgr_start_date']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<div class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
					<a href="index.php?page=tampil2" class="btn btn-warning">Kembali</a>
				</div>
			</div>
		</form>
	</div>
