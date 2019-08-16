<style>
table{
    border: 0px solid black;
    width: 100%;
    background-color:white;
    color:black;
}
</style>
<?php
           
            $sql = "SELECT tb_harga.*, tb_sembako.gambar as gambar, tb_sembako.nama_sembako, tb_sembako.satuan, tb_kios.nama_kios, tb_kios.lokasi
            FROM tb_harga
            INNER JOIN tb_sembako ON tb_sembako.id_sembako=tb_harga.id_sembako
            INNER JOIN tb_kios ON tb_kios.id_kios=tb_harga.id_kios";
            $rows = $db->get_results($sql);

           ?>         
        
 
<table > 
    <tr>
    <?php  foreach ($rows as $row) : ?>   
        <th>
          <img class="card-img-top"  height="100" src="assets/images/galeri/small_<?= $row->gambar ?>" alt="Card image cap">              
                <h5 >Nama Kios :<?= $row->nama_kios ?></h5>
                <h5 >Nama Sembako :<?= $row->nama_sembako ?></h5>
                <h5 >Lokasi Kios :<?= $row->lokasi ?></h5>
                <h5 >Harga :<?= $row->harga ?></h5>
                <h5 >Tanggal :<?= $row->tanggal ?></h5>
                <h5>Hari :<?= $row->hari ?></h5>    
                <th>
        <?php endforeach;    ?>
    </tr>  
</table>

