<div class="page-header">
    <h1>Tambah Data Harga</h1>
</div>
<div class="row">
    <div class="col-sm-6">
        <?php if ($_POST) include 'aksi.php' ?>
        <form method="post" action="?m=harga_tambah" enctype="multipart/form-data">
        <div class="form-group">
                <label>Kios <span class="text-danger">*</span></label>
                <select class="form-control" name="id_kios">
                    <?=get_tempat_option($_POST[id_kios])?>
                </select>
            </div>
        <div class="form-group">
                <label>Sembako <span class="text-danger">*</span></label>
                <select class="form-control" name="id_sembako">
                    <?=get_sembako_option($_POST[id_sembako])?>
                </select>
            </div>
        <div class="form-group">
            <label>Harga Sembako</label>
            <input class="form-control" type="number" name="harga" value="<?= $_POST[harga] ?>" />
        </div>
        <div class="form-group">
            <label>Tanggal</label>
            <input class="form-control" type="date" name="tanggal" value="<?= $_POST[tanggal] ?>" />
        </div>        
            <div class="form-group">
                <label>Hari <span class="text-danger">*</span></label>
                <select class="form-control" name="hari">
                    <option value="Senin">Senin</option>
                    <option value="Selasa">Selasa</option>
                    <option value="Rabu">Rabu</option>
                    <option value="Kamis">Kamis</option>
                    <option value="Jumat">Jumat</option>
                    <option value="Sabtu">Sabtu</option>
                    <option value="Minggu">Minggu</option>                   
                </select>
            </div>           
            <div class="form-group">
                <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                <a class="btn btn-danger" href="?m=harga"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
            </div>
        </form>
    </div>
</div>