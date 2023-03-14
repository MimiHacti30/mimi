<div class="container">
    <div class="card" style="widht: 18rem;">
    <img src="<?= base_url('assest/foto/') . $siswa['foto']; ?>" class="card-img-top" alt="...">
    <div class="card-body">
        <h5 class="card-title"><?= $siswa['nis']; ?></h5>
        <p class="card-text"><?= $siswa['nama']; ?></p>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item"><?= $siswa['angkatan']; ?></li>
        <li class="list-group-item"><?= $siswa['jurusan']; ?></li>
        <li class="list-group-item"><?= $siswa['email']; ?></li>
        <li class="list-group-item"><?= $siswa['hp']; ?></li>
        <li class="list-group-item"><?= $siswa['alamat']; ?></li>
    </ul>
    <div class="card-body">
        <a href="<?= base_url('siswa'); ?>" class="btn btn-primary">Kembali</a>
    </div>
    </div>
</div>