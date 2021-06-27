<?php
include_once '../koneksi.php';

 $cek=mysqli_query($koneksi,"Select * from pembayaran");
 $json_reponse = array();
 
 $result=mysqli_num_rows($cek);
 if ($result>0) {
     while ($row=mysqli_fetch_array($cek)){
         $json_reponse[] = $row;
     }
     echo json_encode(array('pembayaran' => $json_reponse));
    
}
	        
?>