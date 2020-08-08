<?php $sql = $conn->query("SELECT * FROM mahasiswa"); ?>
<div class="container">
	<div class="row mt-2">
		<div class="col-md-12 text-center">
			<h1>Data Mahasiswa</h1><hr>
		</div>
		<div class="col-md-12">
			<a href="?page=add" class="btn btn-primary">Tambah Data</a><hr>
			<div class="table-responsive">
				<table class="table table-hover">
					<thead>
						<th>No</th>
						<th>NPM</th>
						<th>Nama</th>
						<th>Telp</th>
						<th>Email</th>
						<th>Jurusan</th>
						<th>Alamat</th>
						<th>Action</th>
					</thead>
					<tbody>
						<?php  
						$no = 1;
						while ($row = $sql->fetch_assoc()) :
						?>
						<tr>
							<td><?= $no++; ?>.</td>
							<td><?= $row['npm']; ?></td>
							<td><?= $row['nama']; ?></td>
							<td><?= $row['telp']; ?></td>
							<td><?= $row['email']; ?></td>
							<td><?= $row['jurusan']; ?></td>
							<td><?= $row['alamat']; ?></td>
							<td>
								<a href="?page=edit&npm=<?= $row['npm']; ?>" class="badge badge-warning">Edit</a> | 
								<a href="?page=delete&npm=<?= $row['npm']; ?>" class="badge badge-danger" onclick="return(confirm('Yakin Ingin Dihapus ?'))">Hapus</a>
							</td>
						</tr>
					<?php endwhile; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>