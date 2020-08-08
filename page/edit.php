<?php  
if (isset($_GET['npm'])) {
	$npm = $_GET['npm'];
	$row = $conn->query("SELECT * FROM mahasiswa WHERE npm = '$npm'")->fetch_assoc();
}
?>
<div class="container">
	<div class="row mt-2">
		<div class="col-md-12">
			<div class="text-center">
				<h1>Edit Data Mahasiswa</h1>
			</div><hr>
		</div>
		<div class="col-md-8">			
			<a href="?page=home" class="btn btn-info">Kembali</a>
			<form method="post" class="mt-3">
				<div class="form-row form-group">
					<div class="col">
						<label for="npm">Nomor Pokok Mahasiswa</label>
						<input type="number" name="npm" id="npm" class="form-control" placeholder="Nomor Pokok Mahasiswa" min="0" required value="<?= $row['npm']; ?>" readonly="true">
					</div>
					<div class="col">
						<label for="nama">Nama Mahasiswa</label>
						<input type="text" name="nama" id="nama" class="form-control" placeholder="Nama Mahasiswa" required value="<?= $row['nama']; ?>">
					</div>
				</div>
				<div class="form-row form-group">
					<div class="col">
						<label for="telp">Telepon</label>
						<input type="telp" name="telp" id="telp" class="form-control" placeholder="Telepon" required value="<?= $row['telp']; ?>">
					</div>
					<div class="col">
						<label for="email">Alamat Email</label>
						<input type="email" name="email" id="email" class="form-control" placeholder="Alamat Email" required value="<?= $row['email']; ?>">
					</div>
				</div>
				<div class="form-row form-group">
					<div class="col">
						<label for="jurusan">Jurusan</label>
						<select name="jurusan" id="jurusan" class="form-control">
							<option value="TI" <?= $row['jurusan'] === 'TI' ? 'selected' : ''; ?>>Teknik Informatika</option>
							<option value="SI" <?= $row['jurusan'] === 'SI' ? 'selected' : ''; ?>>Sistem Informasi</option>
							<option value="MI" <?= $row['jurusan'] === 'MI' ? 'selected' : ''; ?>>Manajemen Informatika</option>
						</select>
					</div>
					<div class="col">
						<label for="alamat">Alamat</label>
						<textarea name="alamat" id="alamat" cols="30" rows="2" class="form-control" placeholder="Alamat Mahasiswa" required><?= $row['alamat'] ?></textarea>
					</div>
				</div>
				<div class="float-right">
					<button name="btnSimpan" type="submit" class="btn btn-success">
						Update Data
					</button>
				</div>
			</form>
		</div>
	</div>
</div>

<?php  
if (isset($_POST['btnSimpan'])) {
	$npm = $_POST['npm'];
	$nama = $_POST['nama'];
	$telp = $_POST['telp'];
	$email = $_POST['email'];
	$jurusan = $_POST['jurusan'];
	$alamat = $_POST['alamat'];

	if (empty(trim($npm)) || empty(trim($nama)) || empty(trim($telp)) || empty(trim($email)) || empty($jurusan) || empty(trim($alamat))) {
		echo "<script>alert('Maaf, Data Tidak Lengkap!');</script>";
	} else {
		$sql = $conn->query("UPDATE mahasiswa SET nama = '$nama', telp = '$telp', email = '$email', jurusan = '$jurusan', alamat = '$alamat' WHERE npm = '$npm'");
		if ($sql) {
			echo "<script>alert('Data Mahasiswa Berhasil Diupdate.');location='?page=home';</script>";
		} else {
			echo "<script>alert('Maaf, Ada Masalah Saat Mengupdate Data!');</script>";
		}
	}
}
?>