<?php
include_once '../koneksi.php';

$stat = $koneksi->prepare
         ("SELECT * FROM alumni order by id_alumni asc");
 $stat->execute();
 $stat->bind_result($id_alumni ,$id_adm ,$nama, $angkatan, $pekerjaan, $alamat, $foto);
 $alumni = array();
 while ($stat->fetch()) {
    $temporary = array();
    $temporary ['id_alumni'] = $id_alumni;
    $temporary ['id_adm'] = $id_adm;
    $temporary ['nama'] = $nama;
    $temporary ['angkatan'] = $angkatan;
    $temporary ['pekerjaan'] = $pekerjaan;
    $temporary ['alamat'] = $alamat;
    $temporary ['foto'] = $foto;
    array_push($alumni, $temporary);
    
}
echo json_encode($alumni);
?>