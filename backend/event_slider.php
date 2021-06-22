<?php
include_once '../koneksi.php';

 $cek=mysqli_query($koneksi,"Select * from informasi order by id_info desc limit 3");
 $json_reponse = array();
 
 $result=mysqli_num_rows($cek);
 if ($result>0) {
     while ($row=mysqli_fetch_array($cek)){
         $json_reponse[] = $row;
     }
     echo json_encode(array('slider' => $json_reponse));
}
	        
?>