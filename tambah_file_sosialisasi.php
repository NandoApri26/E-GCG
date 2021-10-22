<h2>Sosialisasi</h2>
<div class="col">
	<div class="table-responsive">
		<table class="table table-sm table-bordered">
			<thead>
				<tr>
					<th>Tanggal</th>
					<th>Judul</th>
					<th>Image</th>
					<th>Deskripsi</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php $ambil = $koneksi->query("SELECT * FROM sosialisasi"); ?>
				<?php while ($pecah = $ambil->fetch_assoc()) { ?>
					<tr>
						<td><?php echo $pecah['tanggal']; ?></td>
						<td><?php echo $pecah['judul']; ?></td>
						<td>
							<img src="foto_sosialisasi/<?php echo $pecah['image']; ?>" width="100">
						</td>
						<?php $str = substr($pecah['deskripsi'], 0, 50) ?>
						<td>
							<div class="col-1 text-truncate"><?php echo $str ?>...</div>
						</td>
						<td>
							<a href="index.php?halaman=ubah_file_sosialisasi&id=<?php echo $pecah['id']; ?>" class="btn btn-warning">Ubah</a>
							<a href="index.php?halaman=hapus_file_sosialisasi&id=<?php echo $pecah['id']; ?>" class="btn-danger btn">Hapus</a>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>
<a href="index.php?halaman=sosialisasi" class="btn btn-primary">Back to sosialisasi</a>