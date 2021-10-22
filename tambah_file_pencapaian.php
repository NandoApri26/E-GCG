<h2>Pencapaian</h2>
<div class="col">
	<div class="table-responsive">
		<table class="table table-sm table-bordered">
			<thead>
				<tr>
					<th>Judul</th>
					<th>Image</th>
					<th>Deskripsi</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php $ambil = $koneksi->query("SELECT * FROM pencapaian"); ?>
				<?php while ($pecah = $ambil->fetch_assoc()) { ?>
					<tr>
						<td><?php echo $pecah['judul']; ?></td>
						<td>
							<img src="foto_pencapaian/<?php echo $pecah['image']; ?>" width="100">
						</td>
						<?php $str = substr($pecah['deskripsi'], 0, 50) ?>
						<td>
							<div class="col-1 ttext-truncate"><?php echo $str ?>...</div>
						</td>
						<td>
							<a href="index.php?halaman=ubah_file_pencapaian&id=<?php echo $pecah['id']; ?>" class="btn btn-warning">Ubah</a>
							<a href="index.php?halaman=hapus_file_pencapaian&id=<?php echo $pecah['id']; ?>" class="btn-danger btn">Hapus</a>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>
<a href="index.php?halaman=pencapaian" class="btn btn-primary">Back to pencapaian</a>