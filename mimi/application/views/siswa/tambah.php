<div class="container">
    <?= form_open_multipart('siswa/tambah');?>
        <legend>Tambah Data Siswa</legend>
        <div class="mb-3">
            <label for="nis" class="form-label">NIS</label>
            <input type="text" class="form-control" id="nis" name="" style="widht : 500px;">
        <div class="form-text text-danger"><?= form_error('nis'); ?></div>
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">Foto</label>
            <input class="form-control" type="file" id="formFile" name="image" style="widht : 500px;" require>
            <div class="form-text text-danger"><?= form_error('nama'); ?></div>
        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" id="nama" name="nama" style="widht : 500px;">
            <div class="form-text text-danger"><?= form_error('nama'); ?></div>
        </div>
        <div class="mb-3">
            <label for="angkatan" class="form-label">Angkatan</label>
            <input type="text" class="form-control" id="angkatan" name="angkatan" style="widht : 500px;">
            <div class="form-text text-danger"><?= form_error('angkatan'); ?></div>
        </div>
        <div class="mb-3">
            <label for="jurusan" class="form-label">Jurusan</label>
            <select class="form-select" id="jurusan" name="jurusan" style="widht : 500px">
                <option selected>Pilih Jurusan</option>
                <?php foreach( $jurusan as $jur ): ?>
                    <option value="<?= $jur['id']; ?>"><?= $jur['jurusan']; ?></option>
                <?php endforeach; ?>
            </select>
            <div class="form-text text-danger"><?= form_error('jurusan'); ?></div>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control" id="email" name="email" style="widht : 500px;">
            <div class="form-text text-danger"><?= form_error('email'); ?></div>
        </div>
        <div class="mb-3">
            <label for="hp" class="form-label">Hp</label>
            <input type="text" class="form-control" id="hp" name="hp" style="widht : 500px;">
            <div class="form-text text-danger"><?= form_error('hp'); ?></div>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" style="widht : 500px;">
            <div class="form-text text-danger"><?= form_error('alamat'); ?></div>
        </div>
        <input type="submit" value="submit" class="btn btn-primary"></input>
    </form>
</div>