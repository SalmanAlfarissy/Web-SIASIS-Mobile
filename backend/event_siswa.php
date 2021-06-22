<?php
include_once '../koneksi.php';

$stat = $koneksi->prepare
         ("SELECT * FROM informasi order by id_info desc");
 $stat->execute();
 $stat->bind_result($id_info, $id_adm, $nama_event, $gambar_event, $tgl_post, $deskripsi);
 $event = array();
 while ($stat->fetch()) {
    $temporary = array();
    $temporary ['id_info'] = $id_info;
    $temporary ['id_adm'] = $id_adm;
    $temporary ['nama_event'] = $nama_event;
    $temporary ['gambar_event'] = $gambar_event;
    $temporary ['tgl_post'] = $tgl_post;
    $temporary ['deskripsi'] = $deskripsi;
    array_push($event, $temporary);
    
}
echo json_encode($event);
?>