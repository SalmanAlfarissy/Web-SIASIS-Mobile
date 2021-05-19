<?php
session_start();
include("../koneksi.php");
$page=isset($_GET['page']) ? $_GET['page'] : '';
$proses=isset($_GET['proses']) ? $_GET['proses'] : '';


if ($page=='data_spp' AND $proses=='hapus'){
mysqli_query($koneksi,"DELETE FROM pembayaran WHERE id_pem='$_GET[id_pem]'");
  header('location:index.php?page=data_spp&id_adm='.$_SESSION['id_adm']);
}

else if ($page=='data_spp' AND $proses=='input'){
      mysqli_query($koneksi,"INSERT INTO pembayaran (id_pem,id_adm,nis,semester,status) VALUES 
      ('',
      '$_SESSION[id_adm]',
      '$_POST[nis]',
      '$_POST[semester]',
      '$_POST[status]')");
    header('location:index.php?page=data_spp&id_adm='.$_SESSION['id_adm']);
}
else if ($page=='data_spp' AND $proses=='update'){
  
    mysqli_query($koneksi,"UPDATE pembayaran SET 
                            id_adm     = '$_SESSION[id_adm]',
                            nis     = '$_POST[nis]',
                            semester     = '$_POST[semester]',
                            status     = '$_POST[status]'
                           WHERE nis = '$_POST[nis]'");
  header('location:index.php?page=data_spp&id_adm='.$_SESSION['id_adm']);
  }

?>