<?php include('config.php'); ?>


	<div class="container" style="margin-top:20px">
		<center><font size="6">Edit Data</font></center>

		<hr>

		<?php
		//jika sudah mendapatkan parameter GET id dari URL
		if(isset($_GET['Dependent_name'])){
			//membuat variabel $id untuk menyimpan id dari GET id di URL
			$Dependent_name = $_GET['Dependent_name'];

			//query ke database SELECT tabel mahasiswa berdasarkan id = $id
			$select = mysqli_query($koneksi, "SELECT * FROM dependent WHERE Dependent_name='$Dependent_name'") or die(mysqli_error($koneksi));

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
			$Essn		= $_POST['Essn'];
			$Dependent_name	= $_POST['Dependent_name'];
			$Dependent_namebaru	= $_POST['Dependent_namebaru'];
			$Sex	= $_POST['Sex'];
			$Bdate	= $_POST['Bdate'];
			$Relationship	= $_POST['Relationship'];


			$sql = mysqli_query($koneksi, "UPDATE dependent SET Essn='$Essn', Sex='$Sex', Bdate='$Bdate', Relationship='$Relationship' WHERE Dependent_name='$Dependent_name'") or die(mysqli_error($koneksi));
			$sql1 = mysqli_query($koneksi, "UPDATE dependent SET Dependent_name='$Dependent_namebaru' WHERE Dependent_name='$Dependent_name'") or die(mysqli_error($koneksi));
			if($sql && $sql1){
				echo '<script>alert("Berhasil menyimpan data."); document.location="index.php?page=tampil6";</script>';
			}else{
				echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
			}
		}
		?>

		<form action="index.php?page=edit6&Dependent_name=<?php echo $Dependent_name; ?>" method="post">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Essn</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="Essn" class="form-control" size="4" value="<?php echo $data['Essn']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Dependent_name</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="Dependent_name" class="form-control" value="<?php echo $data['Dependent_name']; ?>" readonly required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Dependent_name baru</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="Dependent_namebaru" class="form-control" value="<?php echo $data['Dependent_namebaru']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Sex</label>
				<div class="col-md-6 col-sm-6 ">
					<div class="btn-group" data-toggle="buttons">
						<label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
							<input type="radio" class="join-btn" name="Sex" value="L" <?php if($data['Sex'] == 'L'){ echo 'checked'; } ?> required>Laki-laki
						</label>
						<label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
							<input type="radio" class="join-btn" name="Sex" value="P" <?php if($data['Sex'] == 'P'){ echo 'checked'; } ?> required>perempuan
						</label>
					</div>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Bdate</label>
				<div class="col-md-6 col-sm-6">
					<input type="date" name="Bdate" class="form-control" value="<?php echo $data['Bdate']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Relationship</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="Relationship" class="form-control" value="<?php echo $data['Relationship']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<div class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
					<a href="index.php?page=tampil6" class="btn btn-warning">Kembali</a>
				</div>
			</div>
		</form>
	</div>
