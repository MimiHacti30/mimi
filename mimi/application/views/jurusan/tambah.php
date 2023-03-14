<div class="container">
    <form action=""method="post">
        <legend>Tambah Data Jurusan</legend>
        <div class= "mb-3">
            <label for="jurusan" class="form-label">Nama Jurusan</label>
            <input type="text" class="from-control" id="jurusan" name="jurusan" style="widht : 300px;">
            <div class="form-text text-danger"><?= form_error('jurusan'); ?></div>
        </div>
        <input type="submit" value="submit" class="btn btn-primary"></input>
    </form>
</div>