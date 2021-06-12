<?php
include_once '../koneksi.php';

 $cek=mysqli_query($koneksi,"Select id_siswa,nis,nama_sis,rapor,rapor.semester from siswa join rapor using(id_siswa) order by id_siswa asc");
 $json_reponse = array();
 
 $result=mysqli_num_rows($cek);
 if ($result>0) {
     while ($row=mysqli_fetch_array($cek)){
         $json_reponse[] = $row;
     }
     echo json_encode(array('raport' => $json_reponse));
}
	        
?>