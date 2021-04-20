<?php include('config.php'); ?>


	<div class="container" style="margin-top:20px">
		<center><font size="6">Edit Data</font></center>

		<hr>

		<?php
		//jika sudah mendapatkan parameter GET id dari URL
		if(isset($_GET['Pnumber'])){
			//membuat variabel $id untuk menyimpan id dari GET id di URL
			$Pnumber = $_GET['Pnumber'];

			//query ke database SELECT tabel mahasiswa berdasarkan id = $id
			$select = mysqli_query($koneksi, "SELECT * FROM project WHERE Pnumber='$Pnumber'") or die(mysqli_error($koneksi));

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
			$Pname			  = $_POST['Pname'];
			$Pnumber	= $_POST['Pnumber'];
			$Pnumberbaru	= $_POST['Pnumberbaru'];
			$Plocation	= $_POST['Plocation'];
			$Dnum	= $_POST['Dnum'];

			$sql = mysqli_query($koneksi, "UPDATE project SET Pname='$Pname', Plocation='$Plocation', Dnum='$Dnum' WHERE Pnumber='$Pnumber'") or die(mysqli_error($koneksi));
			$sql1 = mysqli_query($koneksi, "UPDATE project SET Pnumber='$Pnumberbaru' WHERE Pnumber='$Pnumber'") or die(mysqli_error($koneksi));
			if($sql && $sql1){
				echo '<script>alert("Berhasil menyimpan data."); document.location="index.php?page=tampil4";</script>';
			}else{
				echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
			}
		}
		?>

		<form action="index.php?page=edit4&Pnumber=<?php echo $Pnumber; ?>" method="post">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Pnumber</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="Pnumber" class="form-control" size="4" value="<?php echo $data['Pnumber']; ?>" readonly required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Pnumberbaru</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="Pnumberbaru" class="form-control" value="<?php echo $data['Pnumberbaru']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Pname</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="Pname" class="form-control" value="<?php echo $data['Pname']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Plocation</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="Plocation" class="form-control" value="<?php echo $data['Plocation']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Dnum</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="Dnum" class="form-control" value="<?php echo $data['Dnum']; ?>" required>
				</div>
			</div>
			
			<div class="item form-group">
				<div class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
					<a href="index.php?page=tampil4" class="btn btn-warning">Kembali</a>
				</div>
			</div>
		</form>
	</div>
