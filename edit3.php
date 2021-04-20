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
			$select = mysqli_query($koneksi, "SELECT * FROM dept_location WHERE Dnumber='$Dnumber'") or die(mysqli_error($koneksi));

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
			$Dnumberbaru	= $_POST['Dnumberbaru'];
			$Dnumber	= $_POST['Dnumber'];
			$Dlocation	= $_POST['Dlocation'];
			$Dlocationbaru	= $_POST['Dlocationbaru'];

			$sql = mysqli_query($koneksi, "UPDATE dept_location SET  Dnumber='$Dnumberbaru' , Dlocation='$Dlocationbaru' WHERE Dlocation='$Dlocation'") or die(mysqli_error($koneksi));
			
			if($sql){
				echo '<script>alert("Berhasil menyimpan data."); document.location="index.php?page=tampil3";</script>';
			}else{
				echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
			}
		}
		?>

		<form action="index.php?page=edit3&Dlocation=<?php echo $Dlocation; ?>" method="post">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Dnumber</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="Dnumber" class="form-control" size="4" value="<?php echo $data['Dnumber']; ?>" readonly required>
				</div>
			</div>
			
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Dnumber_Baru</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="Dnumberbaru" class="form-control" value="<?php echo $data['Dnumberbaru']; ?>" required>
				</div>
			</div>

			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Dlocation</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="Dlocation" class="form-control" value="<?php echo $data['Dlocation']; ?>" readonly required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Dlocationbaru</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="Dlocationbaru" class="form-control" value="<?php echo $data['Dlocationbaru']; ?>" required>
				</div>
			</div>

			<div class="item form-group">
				<div class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
					<a href="index.php?page=tampil3" class="btn btn-warning">Kembali</a>
				</div>
			</div>
		</form>
	</div>
