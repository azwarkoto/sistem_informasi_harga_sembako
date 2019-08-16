<div class="page-header">
    <h1>Tambah Data Sembako</h1>
</div>
<div class="row">
    <div class="col-sm-6">
        <?php if ($_POST) include 'aksi.php' ?>
        <form method="post" action="?m=galeri_tambah" enctype="multipart/form-data">
        <div class="form-group">
            <label>Nama Sembako</label>
            <input class="form-control" type="text" name="nama_sembako" value="<?= $_POST[nama_sembako] ?>" />
        </div>
           <div class="form-group">
                <label>Gambar <span class="text-danger">*</span></label>
                <input class="form-control" type="file" name="gambar" />
            </div>
            <div class="form-group">
                <label>Satuan <span class="text-danger">*</span></label>
                <select class="form-control" name="satuan">
                    <option value="Pack">Pack</option>
                    <option value="Kardus">Kardus</option>
                    <option value="Bungkus">Bungkus</option>
                    <option value="Unit">Unit</option>
                </select>
            </div>
            <div class="form-group">
                <label>Keterangan</label>
                <textarea class="mce" name="deskripsi"><?= $_POST['deskripsi'] ?></textarea>
            </div>
            <div class="form-group">
                <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                <a class="btn btn-danger" href="?m=galeri"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
            </div>
        </form>
    </div>
</div>