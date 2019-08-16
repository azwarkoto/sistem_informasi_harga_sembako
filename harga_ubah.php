<?php
$row = $db->get_row("SELECT * FROM tb_harga WHERE id_harga='$_GET[ID]'");
?>
<div class="page-header">
    <h1>Ubah Galeri</h1>
</div>
<div class="row">
    <div class="col-sm-6">
        <?php if ($_POST) include 'aksi.php' ?>
        <form method="post" action="?m=harga_ubah&ID=<?= $row->id_harga ?>" enctype="multipart/form-data">
            <div class="form-group">
                <label>Nama Kios <span class="text-danger">*</span></label>
                <select class="form-control" name="id_kios">
                    <?= get_tempat_option($row->id_kios) ?>
                </select>
            </div>
            <div class="form-group">
                <label>Nama Sembako <span class="text-danger">*</span></label>
                <select class="form-control" name="id_sembako">
                    <?= get_sembako_option($row->id_sembako) ?>
                </select>
            </div>
            <div class="form-group">
                <label>Harga</label>
                <input class="form-control" type="hidden" name="id_harga" value="<?= $row->id_harga ?>" />
                <input class="form-control" type="text" name="harga" value="<?= $row->harga ?>" />
            </div>
            <div class="form-group">
                <label>Tanggal</label>
                <input class="form-control" type="text" name="tanggal" value="<?= $row->tanggal ?>" />
            </div>
            <div class="form-group">
                <label>Hari <span class="text-danger">*</span></label>
                <select class="form-control" name="hari">                    
                    <option value="<?= $row->hari ?>"><?= $row->hari ?></option>
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
                <a class="btn btn-danger" href="?m=galeri"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
            </div>
        </form>
    </div>
</div>