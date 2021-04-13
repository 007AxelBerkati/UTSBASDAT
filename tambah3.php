<?php include('config.php'); ?>

		<center><font size="6">Tambah Data</font></center>
		<hr>
		<?php
		if(isset($_POST['submit'])){
			$Dnumber			= $_POST['Dnumber'];
			$Dlocation			= $_POST['Dlocation'];

				$sql = mysqli_query($koneksi, "INSERT INTO dept_location(Dnumber, Dlocation) VALUES('$Dnumber','$Dlocation')") or die(mysqli_error($koneksi));

				if($sql){
					echo '<script>alert("Berhasil menambahkan data."); document.location="index.php?page=tampil3";</script>';
				}else{
					echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
				}
			}
		?>

		<form action="index.php?page=tambah3" method="post">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Dnumber</label>
				<div class="col-md-6 col-sm-6 ">
					<input type="text" name="Dnumber" class="form-control" size="4" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Dlocation</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="Dlocation" class="form-control" required>
				</div>
			</div>
			
			<div class="item form-group">
				<div  class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
			</div>
		</form>
	</div>