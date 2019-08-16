<style>
    table {
        border: 0px solid black;
        width: 100%;
        background-color: white;
        color: black;
    }
</style>
<?php
$q = esc_field($_GET['q']);

$sql = "SELECT * 
            FROM tb_kios 
            WHERE nama_kios LIKE '%$q%' 
            ORDER BY id_kios";
$rows = $db->get_results($sql);

foreach ($rows as $row) : ?>

<?php endforeach;    ?>





<table>
    <tr>
        <?php foreach ($rows as $row) : ?>
            <th>
                <div class="card-group">
                    <div class="card">
                        <img class="card-img-top" height="100" src="assets/images/tempat/small_<?= $row->gambar ?>" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Nama Kios :<?= $row->nama_kios ?></h5>
                            <h5 class="card-title">Lokasi Kios :<?= $row->lokasi ?></h5>
                            <p><a href="?m=tempat_detail&ID=<?= $row->id_kios ?>">Detail</a> </p>

                        </div>
                    </div>
                </div>
            <th>
            <?php endforeach;    ?>
    </tr>
</table>