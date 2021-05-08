<?php
session_start();
include("../koneksi.php");
$page=isset($_GET['page']) ? $_GET['page'] : '';
$proses=isset($_GET['proses']) ? $_GET['proses'] : '';


if ($page=='administrator' AND $proses=='hapus'){

mysqli_query($koneksi,"DELETE FROM administrator WHERE id_adm='$_GET[id_hps]'");
  header('location:index.php?page=administrator&id_adm='.$_SESSION['id_adm']);
  
}

else if ($page=='administrator' AND $proses=='input'){
  $pass=md5($_POST['password']);

  $query =mysqli_query($koneksi,"SELECT * FROM administrator WHERE id_adm=$_POST[id_adm]");
  $ckdt = mysqli_num_rows($query);

  if  ($ckdt > 0){
    echo "Data Dengan ID Administrator = $_POST[id_adm] sudah ada!!</br>";
    echo "<a href=javascript:history.go(-1)>Please try again!!</a>"; 
  }else {
    mysqli_query($koneksi,"INSERT INTO administrator
  								(id_adm,
                  nip_ad,
                  nama_ad,
                  email,
                  password) 
	                       VALUES
                                ('$_POST[id_adm]',
                                '$_POST[nip_ad]',
                                '$_POST[nama_ad]',
                                '$_POST[email]',
                                '$pass')");
    header('location:index.php?page=administrator&id_adm='.$_SESSION['id_adm']);
  }

      
}

else if ($page=='administrator' AND $proses=='update'){
  $pass=md5($_POST['password']);
    mysqli_query($koneksi,"UPDATE administrator SET 
                            id_siswa    = '$_POST[nip_ad]',
                            id_guru     = '$_POST[nama_ad]',
                            rapor       = '$_POST[email]',
							              semester	  = '$pass'  
                           WHERE id_adm = '$_POST[id_adm]'");

  header('location:index.php?page=administrator&id_adm='.$_SESSION['id_adm']);
  }

?>