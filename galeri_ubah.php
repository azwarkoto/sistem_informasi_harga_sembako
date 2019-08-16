<?php
$row = $db->get_row("SELECT * FROM tb_sembako WHERE id_sembako='$_GET[ID]'");
?>
<div class="page-header">
    <h1>Ubah Data Sembako</h1>
</div>
<div class="row">
    <div class="col-sm-6">
        <?php if ($_POST) include 'aksi.php' ?>
        <form method="post" action="?m=galeri_ubah&ID=<?= $row->id_sembako ?>" enctype="multipart/form-data">
            <div class="form-group">
                <label>Nama Kios <span class="text-danger">*</span></label>
                <select class="form-control" name="id_kios">
                    <?= get_tempat_option($row->id_kios) ?>
                </select>
            </div>
            <div class="form-group">
                <label>Gambar</label>
                <input class="form-control" type="file" name="gambar" />
                <p class="help-block">Kosongkan jika tidak mengubah gambar</p>
                <img class="thumbnail" src="assets/images/galeri/small_<?= $row->gambar ?>" height="60" />
            </div>
            <div class="form-group">
                <label>Nama Sembako</label>
                <input class="form-control" type="text" name="nama_sembako" value="<?= $row->nama_sembako ?>" />
            </div>
            <div class="form-group">
                <label>Satuan <span class="text-danger">*</span></label>
                <select class="form-control" name="satuan">
                    <option value="<?= $row->satuan ?>"><?= $row->satuan ?></option>
                    <option value="Pack">Pack</option>
                    <option value="Kardus">Kardus</option>
                    <option value="Bungkus">Bungkus</option>
                    <option value="Unit">Unit</option>
                </select>
            </div>
            <div class="form-group">
                <label>Keterangan</label>
                <textarea class="mce" name="deskripsi"><?= $row->deskripsi ?></textarea>
            </div>
            <div class="form-group">
                <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                <a class="btn btn-danger" href="?m=galeri"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
            </div>
        </form>
    </div>
</div>