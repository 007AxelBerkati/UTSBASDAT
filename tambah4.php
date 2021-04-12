<?php include('config.php'); ?>

		<center><font size="6">Tambah Data</font></center>
		<hr>
		<?php
		if(isset($_POST['submit'])){
			$Pname			= $_POST['Pname'];
			$Pnumber			= $_POST['Pnumber'];
			$Plocation	= $_POST['Plocation'];
			$Dnum		= $_POST['Dnum'];

			$cek = mysqli_query($koneksi, "SELECT * FROM project WHERE Pnumber='$Pnumber'") or die(mysqli_error($koneksi));

			if(mysqli_num_rows($cek) == 0){
				$sql = mysqli_query($koneksi, "INSERT INTO project(Pname, Pnumber, Plocation, Dnum) VALUES('$Pname', '$Pnumber','$Plocation','$Dnum')") or die(mysqli_error($koneksi));

				if($sql){
					echo '<script>alert("Berhasil menambahkan data."); document.location="index.php?page=tampil4";</script>';
				}else{
					echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
				}
			}else{
				echo '<div class="alert alert-warning">Gagal, Pnumber sudah terdaftar.</div>';
			}
		}
		?>

		<form action="index.php?page=tambah4" method="post">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Pname</label>
				<div class="col-md-6 col-sm-6 ">
					<input type="text" name="Pname" class="form-control" size="4" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Pnumber</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="Pnumber" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Plocation</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="Plocation" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Dnum</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="Dnum" class="form-control" required>
				</div>
			</div>
			
			<div class="item form-group">
				<div  class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
			</div>
		</form>
	</div>
