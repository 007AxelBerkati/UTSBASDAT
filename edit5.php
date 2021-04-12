<?php include('config.php'); ?>


	<div class="container" style="margin-top:20px">
		<center><font size="6">Edit Data</font></center>

		<hr>

		<?php
		//jika sudah mendapatkan parameter GET id dari URL
		if(isset($_GET['Essn'])){
			//membuat variabel $id untuk menyimpan id dari GET id di URL
			$Essn = $_GET['Essn'];

			//query ke database SELECT tabel mahasiswa berdasarkan id = $id
			$select = mysqli_query($koneksi, "SELECT * FROM works_on WHERE Essn='$Essn'") or die(mysqli_error($koneksi));

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
			$Essn	= $_POST['Essn'];
			$Pno	= $_POST['Pno'];
			$Hours	= $_POST['Hours'];

			$sql = mysqli_query($koneksi, "UPDATE works_on SET Essn='$Essn', Pno='$Pno', Hours='$Hours' WHERE Essn='$Essn'") or die(mysqli_error($koneksi));

			if($sql){
				echo '<script>alert("Berhasil menyimpan data."); document.location="index.php?page=tampil5";</script>';
			}else{
				echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
			}
		}
		?>

		<form action="index.php?page=edit5&Essn=<?php echo $Essn; ?>" method="post">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Essn</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="Essn" class="form-control" size="4" value="<?php echo $data['Essn']; ?>" readonly required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Pno</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="Pno" class="form-control" value="<?php echo $data['Pno']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Hours</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="Hours" class="form-control" value="<?php echo $data['Hours']; ?>" required>
				</div>
			</div>
			
			<div class="item form-group">
				<div class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
					<a href="index.php?page=tampil5" class="btn btn-warning">Kembali</a>
				</div>
			</div>
		</form>
	</div>
