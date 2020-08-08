<div class="container">
	<div class="row mt-2">
		<div class="col-md-12">
			<div class="text-center">
				<h1>Tambah Data Mahasiswa</h1>
			</div><hr>
		</div>
		<div class="col-md-8">			
			<a href="?page=home" class="btn btn-info">Kembali</a>
			<form method="post" class="mt-3">
				<div class="form-row form-group">
					<div class="col">
						<label for="npm">Nomor Pokok Mahasiswa</label>
						<input type="number" name="npm" id="npm" class="form-control" placeholder="Nomor Pokok Mahasiswa" min="0" required>
					</div>
					<div class="col">
						<label for="nama">Nama Mahasiswa</label>
						<input type="text" name="nama" id="nama" class="form-control" placeholder="Nama Mahasiswa" required>
					</div>
				</div>
				<div class="form-row form-group">
					<div class="col">
						<label for="telp">Telepon</label>
						<input type="telp" name="telp" id="telp" class="form-control" placeholder="Telepon" required>
					</div>
					<div class="col">
						<label for="email">Alamat Email</label>
						<input type="email" name="email" id="email" class="form-control" placeholder="Alamat Email" required>
					</div>
				</div>
				<div class="form-row form-group">
					<div class="col">
						<label for="jurusan">Jurusan</label>
						<select name="jurusan" id="jurusan" class="form-control">
							<option value="">- Pilih Jurusan -</option>
							<option value="TI">Teknik Informatika</option>
							<option value="SI">Sistem Informasi</option>
							<option value="MI">Manajemen Informatika</option>
						</select>
					</div>
					<div class="col">
						<label for="alamat">Alamat</label>
						<textarea name="alamat" id="alamat" cols="30" rows="2" class="form-control" placeholder="Alamat Mahasiswa" required></textarea>
					</div>
				</div>
				<div class="float-right">
					<button name="btnSimpan" type="submit" class="btn btn-success">
						Simpan Data
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
		$sql = $conn->query("INSERT INTO mahasiswa VALUES ('$npm', '$nama', '$telp', '$email', '$jurusan', '$alamat')");
		if ($sql) {
			echo "<script>alert('Data Mahasiswa Berhasil Disimpan.');location='?page=home';</script>";
		} else {
			echo "<script>alert('Maaf, Ada Masalah Saat Menyimpan Data!');</script>";
		}
	}
}
?>