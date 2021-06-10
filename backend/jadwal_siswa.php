<?php
include_once '../koneksi.php';

 $cek=mysqli_query($koneksi,"Select nama_sis,nis,kelas,semester,jadwal from kelas join siswa using(kelas)");
 $json_reponse = array();
 
 $result=mysqli_num_rows($cek);
 if ($result>0) {
     while ($row=mysqli_fetch_array($cek)){
         $json_reponse[] = $row;
     }
     echo json_encode(array('kelas' => $json_reponse));
    
}
	        
?>