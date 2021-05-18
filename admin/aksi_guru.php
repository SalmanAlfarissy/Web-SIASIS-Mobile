<?php
session_start();
include("../koneksi.php");
$page=isset($_GET['page']) ? $_GET['page'] : '';
$proses=isset($_GET['proses']) ? $_GET['proses'] : '';


if ($page=='guru' AND $proses=='hapus'){

mysqli_query($koneksi,"DELETE FROM guru WHERE id_guru='$_GET[id_guru]'");
  header('location:index.php?page=guru&id_adm='.$_SESSION['id_adm']);
  
}

else if ($page=='guru' AND $proses=='input'){
  $pass=md5($_POST['password']);

  $query =mysqli_query($koneksi,"SELECT * FROM guru WHERE id_guru=$_POST[id_guru]");
  $ckdt = mysqli_num_rows($query);

  if  ($ckdt > 0){
    echo "Data Dengan ID Guru = $_POST[id_guru] sudah ada!!</br>";
    echo "<a href=javascript:history.go(-1)>Please try again!!</a>"; 
  }else {
    mysqli_query($koneksi,"INSERT INTO guru
  								(id_guru,
                  id_adm,
                  nip_guru,
                  password,
                  nama_guru,
                  email_guru,
                  no_telp,
                  jabatan) 
	                       VALUES
                                ('$_POST[id_guru]',
                                '$_SESSION[id_adm]',
                                '$_POST[nip_guru]',
                                '$pass',
                                '$_POST[nama_guru]',
                                '$_POST[email_guru]',
                                '$_POST[no_telp]',
                                '$_POST[jabatan]')");
    header('location:index.php?page=guru&id_adm='.$_SESSION['id_adm']);
  }

      
}

else if ($page=='guru' AND $proses=='update'){
  $pass=md5($_POST['password']);
    mysqli_query($koneksi,"UPDATE guru SET 
                            nip_guru    = '$_POST[nip_guru]',
                            password	  = '$pass',
                            nama_guru     = '$_POST[nama_guru]',
                            email_guru       = '$_POST[email_guru]',
                            no_telp       = '$_POST[no_telp]',
                            jabatan       = '$_POST[jabatan]'
                           WHERE id_guru = '$_POST[id_guru]'");
  header('location:index.php?page=guru&id_adm='.$_SESSION['id_adm']);
  }

?>