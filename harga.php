<div class="page-header">
    <h1>Data Harga Sembako</h1>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        <form class="form-inline">
            <input type="hidden" name="m" value="harga" />
            <div class="form-group">
                <input class="form-control" type="text" placeholder="Pencarian. . ." name="cari" value="<?= $_GET['cari'] ?>" />
            </div>
            <div class="form-group">
                <button class="btn btn-success"><span class="glyphicon glyphicon-refresh"></span> Refresh</button>
            </div>
            <div class="form-group">
                <a class="btn btn-primary" href="?m=harga_tambah"><span class="glyphicon glyphicon-plus"></span> Tambah</a>
            </div>
        </form>
    </div>
    <div class="oxa">
        <table class="table table-bordered ">
            <thead>
                <tr class="nw">
                    <th>No</th>
                    <th>Nama Kios</th>
                    <th>Nama Sembako</th>
                    <th>Gambar Sembako</th>
                    <th>Harga</th>
                    <th>Tanggal</th>
                    <th>Hari</th>                    
                    <th>Aksi</th>
                </tr>
            </thead>
            <?php
            $cari = esc_field($_GET['cari']);
            $pg = new Paging();
            $limit = 25;
            $offset = $pg->get_offset($limit, $_GET[page]);

            $rows = $db->get_results("SELECT tb_harga.*, tb_kios.nama_kios, tb_sembako.nama_sembako, tb_sembako.gambar
            FROM tb_harga INNER JOIN tb_kios ON tb_kios.id_kios=tb_harga.id_kios
                          INNER JOIN tb_sembako ON tb_sembako.id_sembako=tb_harga.id_sembako
            WHERE tb_kios.nama_kios LIKE '%$cari%' ORDER BY tb_harga.id_harga LIMIT $offset, $limit");

            $no = $offset;

            $search = $db->get_var("SELECT COUNT(*) 
            FROM tb_harga INNER JOIN tb_kios ON tb_kios.id_kios=tb_harga.id_harga
                          INNER JOIN tb_sembako ON tb_sembako.id_sembako=tb_harga.id_sembako
            WHERE nama_kios LIKE '%$cari%'");

            foreach ($rows as $row) :
                ?>
                <tr>
                    <td><?= ++$no ?></td>
                    <td><?= $row->nama_kios ?></td>
                    <td><?= $row->nama_sembako ?></td>
                    <td><img class="thumbnail" src="assets/images/galeri/small_<?= $row->gambar ?>" height="60" /></td>
                    <td><?= $row->harga ?></td>
                    <td><?= $row->tanggal ?></td>
                    <td><?= $row->hari ?></td>
                    <td class="nw">
                        <a class="btn btn-xs btn-warning" href="?m=harga_ubah&ID=<?= $row->id_harga ?>"><span class="glyphicon glyphicon-edit"></span></a>
                        <a class="btn btn-xs btn-danger" href="aksi.php?act=harga_hapus&ID=<?= $row->id_harga ?>" onclick="return confirm('Hapus data?')"><span class="glyphicon glyphicon-trash"></span></a>
                    </td>
                </tr>
            <?php endforeach;    ?>
        </table>
    </div>
    <div class="panel-footer">
        <ul class="pagination"><?= $pg->show("m=harga&cari=$_GET[cari]&page=", $search, $limit, $_GET[page]) ?></ul>
    </div>
</div>