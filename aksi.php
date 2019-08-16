<?php
require_once 'functions.php';


/** LOGIN */
if ($mod == 'login') {
    $user = esc_field($_POST['user']);
    $pass = esc_field($_POST['pass']);

    $row = $db->get_row("SELECT * FROM tb_user WHERE user='$user' AND pass='$pass'");
    if ($row) {
        $_SESSION['login'] = $row->user;
        redirect_js("index.php");
    } else {
        print_msg("Username atau Password Anda Salah.");
    }
} else if ($mod == 'password') {
    $pass1 = $_POST[pass1];
    $pass2 = $_POST[pass2];
    $pass3 = $_POST[pass3];

    $row = $db->get_row("SELECT * FROM tb_user WHERE user='$_SESSION[user]' AND pass='$pass1'");

    if ($pass1 == '' || $pass2 == '' || $pass3 == '')
        print_msg('Field bertanda * harus diisi.');
    elseif (!$row)
        print_msg('Password lama salah.');
    elseif ($pass2 != $pass3)
        print_msg('Password baru dan konfirmasi password baru tidak sama.');
    else {
        $db->query("UPDATE tb_user SET pass='$pass2' WHERE user='$_SESSION[user]'");
        print_msg('Password berhasil diubah.', 'success');
    }
} elseif ($act == 'logout') {
    unset($_SESSION['login']);
    header("location:index.php?m=login");
}

/** PAGE */
elseif ($mod == 'page_ubah') {
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];

    if ($judul == '' || $isi == '')
        print_msg("Field yang bertanda * tidak boleh kosong!");
    else {
        $db->query("UPDATE tb_page SET judul='$judul', isi='$isi' WHERE nama_page='$_GET[nama]'");
        print_msg("Data tersimpan", 'success');
    }
}

/** PURA */
if ($mod == 'tempat_tambah') {
    $nama_kios = $_POST['nama_kios'];
    $gambar = $_FILES['gambar'];
    $lat = $_POST['lat'];
    $lng = $_POST['lng'];
    $lokasi = $_POST['lokasi'];
    $deskripsi = esc_field($_POST['deskripsi']);

    if ($nama_kios == '' || $gambar['name'] == '' || $lat == '' || $lng == '' || $lokasi == '')
        print_msg("Field bertanda * tidak boleh kosong!");
    else {
        $file_name = rand(1000, 9999) . parse_file_name($gambar['name']);
        $img = new SimpleImage($gambar['tmp_name']);
        if ($img->get_width() > 800)
            $img->fit_to_width(800);
        if ($img->get_height() > 600);
        $img->fit_to_height(600);
        $img->save('assets/images/tempat/' . $file_name);
        $img->thumbnail(180, 120);
        $img->save('assets/images/tempat/small_' . $file_name);

        $db->query("INSERT INTO tb_kios (nama_kios, gambar, lat, lng, lokasi, deskripsi) 
                    VALUES ('$nama_kios', '$file_name', '$lat', '$lng', '$lokasi', '$deskripsi')");
        redirect_js("index.php?m=tempat");
    }
} else if ($mod == 'tempat_ubah') {
    $nama_kios = $_POST['nama_kios'];
    $gambar = $_FILES['gambar'];
    $lat = $_POST['lat'];
    $lng = $_POST['lng'];
    $lokasi = $_POST['lokasi'];
    $deskripsi = esc_field($_POST['deskripsi']);

    if ($nama_kios == '' || $lat == '' || $lng == '' || $lokasi == '')
        print_msg("Field bertanda * tidak boleh kosong!");
    else {
        if ($gambar['name'] != '') {
            hapus_gambar($_GET['ID']);
            $file_name = rand(1000, 9999) . parse_file_name($gambar['name']);
            $img = new SimpleImage($gambar['tmp_name']);
            if ($img->get_width() > 800)
                $img->fit_to_width(800);
            if ($img->get_height() > 600);
            $img->fit_to_height(600);
            $img->save('assets/images/tempat/' . $file_name);
            $img->thumbnail(180, 120);
            $img->save('assets/images/tempat/small_' . $file_name);

            $sql_gambar = ", gambar='$file_name'";
        }
        $db->query("UPDATE tb_kios SET nama_kios='$nama_kios' $sql_gambar , lat='$lat', lng='$lng', lokasi='$lokasi', deskripsi='$deskripsi' WHERE id_kios='$_GET[ID]'");
        redirect_js("index.php?m=tempat");
    }
} else if ($act == 'tempat_hapus') {
    hapus_gambar($_GET['ID']);
    $db->query("DELETE FROM tb_kios WHERE id_kios='$_GET[ID]'");
    header("location:index.php?m=tempat");
}



/** GAMBAR */
if ($mod == 'galeri_tambah') {   
    $nama_sembako = $_POST['nama_sembako'];
    $gambar = $_FILES['gambar'];
    $satuan = $_POST['satuan'];
    $deskripsi = $_POST['deskripsi'];

    if ( $gambar[name] == '')
        print_msg("Field bertanda * tidak boleh kosong!");
    else {
        $file_name = rand(1000, 9999) . parse_file_name($gambar['name']);

        $img = new SimpleImage($gambar['tmp_name']);
        if ($img->get_width() > 800)
            $img->fit_to_width(800);
        if ($img->get_height() > 600);
        $img->fit_to_height(600);
        $img->save('assets/images/galeri/' . $file_name);
        $img->thumbnail(180, 120);
        $img->save('assets/images/galeri/small_' . $file_name);

        $db->query("INSERT INTO tb_sembako ( nama_sembako, gambar, satuan, deskripsi) 
                    VALUES('$nama_sembako','$file_name','$satuan', '$deskripsi')");
        redirect_js("index.php?m=galeri");
    }
} else if ($mod == 'galeri_ubah') {
    $id_kios = $_POST['id_kios'];
    $gambar = $_FILES['gambar'];
    $nama_sembako = $_POST['nama_sembako'];
    $satuan = $_POST['satuan'];
    $deskripsi = $_POST['deskripsi'];

    if ($deskripsi == '')
        print_msg("Field bertanda * tidak boleh kosong!");
    else {
        if ($gambar[tmp_name] != '') {
            hapus_galeri($_GET['ID']);
            $file_name = rand(1000, 9999) . parse_file_name($gambar['name']);
            $img = new SimpleImage($gambar['tmp_name']);
            if ($img->get_width() > 800)
                $img->fit_to_width(800);
            if ($img->get_height() > 600);
            $img->fit_to_height(600);
            $img->save('assets/images/galeri/' . $file_name);
            $img->thumbnail(180, 120);
            $img->save('assets/images/galeri/small_' . $file_name);
            $sql_gambar = ", gambar='$file_name'";
        }
        
        $db->query("UPDATE tb_sembako SET  nama_sembako='$nama_sembako' $sql_gambar, satuan='$satuan', deskripsi='$deskripsi' WHERE id_sembako='$_GET[ID]'");
        redirect_js("index.php?m=galeri");
    }
} else if ($act == 'galeri_hapus') {
    hapus_galeri($_GET['ID']);
    $db->query("DELETE FROM tb_sembako WHERE id_sembako='$_GET[ID]'");
    header("location:index.php?m=galeri");
}



/** HARGA */
if ($mod == 'harga_tambah') {   
    $id_kios = $_POST['id_kios'];
    $id_sembako = $_POST['id_sembako'];
    $harga = $_POST['harga'];
    $tanggal = $_POST['tanggal'];
    $hari = $_POST['hari'];

    if ( $id_kios == '' )
        print_msg("Field bertanda * tidak boleh kosong!");
    else {

        $db->query("INSERT INTO tb_harga( id_kios, id_sembako, harga, tanggal, hari) 
        VALUES('$id_kios','$id_sembako','$harga', '$tanggal', '$hari')");
        redirect_js("index.php?m=harga");
    }
} else if ($mod == 'harga_ubah') {
    $id_harga = $_POST['id_harga'];
    $id_kios = $_POST['id_kios'];
    $id_sembako = $_POST['id_sembako'];
    $harga = $_POST['harga'];
    $tanggal = $_POST['tanggal'];
    $hari = $_POST['hari'];

    if ($id_kios == '')
        print_msg("Field bertanda * tidak boleh kosong!");
    else {
       
        $db->query("UPDATE tb_harga SET id_kios='$id_kios', id_sembako='$id_sembako' , harga='$harga', tanggal='$tanggal' WHERE id_harga='$id_harga'");
        redirect_js("index.php?m=harga");
    }
} else if ($act == 'harga_hapus') {
    hapus_harga($_GET['ID']);
    $db->query("DELETE FROM tb_harga WHERE id_harga='$_GET[ID]'");
    header("location:index.php?m=harga");
}
