<style>
body{
    color:black;
}
table, tr, td{
    color: black;
}
</style>
<div class="page-header">
    <h1>Data Sembako</h1>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        <form class="form-inline">
            <input type="hidden" name="m" value="galeri" />
            <div class="form-group">
                <input class="form-control" type="text" placeholder="Pencarian. . ." name="q" value="<?= $_GET['q'] ?>" />
            </div>
            <div class="form-group">
                <button class="btn btn-success"><span class="glyphicon glyphicon-refresh"></span> Refresh</button>
            </div>
            <div class="form-group">
                <a class="btn btn-primary" href="?m=galeri_tambah"><span class="glyphicon glyphicon-plus"></span> Tambah</a>
            </div>
        </form>
    </div>
    <div class="oxa">
        <table class="table table-bordered">
            <thead>
                <tr class="nw">
                    <th>No</th>
                    <th>Nama Sembako</th>
                    <th>Gambar</th>
                    <th>Satuan</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <?php
            $q = esc_field($_GET['q']);
            $pg = new Paging();
            $limit = 25;
            $offset = $pg->get_offset($limit, $_GET[page]);

            $rows = $db->get_results("SELECT * FROM tb_sembako
            WHERE nama_sembako LIKE '%$q%' ORDER BY nama_sembako LIMIT $offset, $limit");

            $no = $offset;

            $jumrec = $db->get_var("SELECT COUNT(*) 
            FROM tb_sembako 
            WHERE nama_sembako LIKE '%$q%'");

            foreach ($rows as $row) :
                ?>
                <tr>
                    <td><?= ++$no ?></td>
                    <td><?= $row->nama_sembako ?></td>
                    <td><img class="thumbnail" src="assets/images/galeri/small_<?= $row->gambar ?>" height="60" /></td>
                    <td><?= $row->satuan ?></td>
                    <td><?= $row->deskripsi ?></td>
                    <td class="nw">
                        <a class="btn btn-xs btn-warning" href="?m=galeri_ubah&ID=<?= $row->id_sembako ?>"><span class="glyphicon glyphicon-edit"></span></a>
                        <a class="btn btn-xs btn-danger" href="aksi.php?act=galeri_hapus&ID=<?= $row->id_sembako ?>" onclick="return confirm('Hapus data?')"><span class="glyphicon glyphicon-trash"></span></a>
                    </td>
                </tr>
            <?php endforeach;    ?>
        </table>
    </div>
    <div class="panel-footer">
        <ul class="pagination"><?= $pg->show("m=galeri&q=$_GET[q]&page=", $jumrec, $limit, $_GET[page]) ?></ul>
    </div>
</div>