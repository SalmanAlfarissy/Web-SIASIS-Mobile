<?php
session_start();
include("../koneksi.php");
$page=isset($_GET['page']) ? $_GET['page'] : '';
$proses=isset($_GET['proses']) ? $_GET['proses'] : '';


if ($page=='jadwal' AND $proses=='hapus'){
  
  $r=mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM kelas WHERE kelas='$_GET[kelas]'"));
  $file1=$r['jadwal'];
  $file2='./jadwal/'.$file1;
    unlink($file2);
mysqli_query($koneksi,"DELETE FROM kelas WHERE kelas='$_GET[kelas]'");
  header('location:index.php?page=jadwal&id_adm='.$_SESSION['id_adm']);
}

else if ($page=='jadwal' AND $proses=='input'){

  $lokasi_file    = $_FILES['file_image']['tmp_name'];
  $tipe_file      = $_FILES['file_image']['type'];
  $nama_file      = $_FILES['file_image']['name'];
  $acak           = rand(000000,999999);
  $nama_file_unik = $acak.$nama_file; 
  if (!empty($lokasi_file)){
    
    if ($tipe_file != "image/jpeg" AND $tipe_file != "image/pjpg" AND $tipe_file != "image/png") {
      echo "Gagal menyimpan data !!! <br>
            Tipe file <b>$nama_file</b> : $tipe_file <br>
            Tipe file yang diperbolehkan adalah : <b>JPG/JPEG/png</b>.<br>";
        echo "<a href=javascript:history.go(-1)>Ulangi Lagi</a>";       
    }    else{
      move_uploaded_file($lokasi_file,"jadwal/$nama_file_unik");
      mysqli_query($koneksi,"INSERT INTO kelas (kelas,jadwal) VALUES 
      ('$_POST[kelas]',
      '$nama_file_unik')");
    header('location:index.php?page=jadwal&id_adm='.$_SESSION['id_adm']);
    }

  }   else {
    mysqli_query($koneksi,"INSERT INTO kelas (kelas) VALUES 
    ('$_POST[kelas]')");
  header('location:index.php?page=jadwal&id_adm='.$_SESSION['id_adm']);
  }

  
}
else if ($page=='jadwal' AND $proses=='update'){
  // ======Raport====
  $r=mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM kelas WHERE kelas='$_POST[kelas]'"));
  $file1=$r['jadwal'];
  $file2='./jadwal/'.$file1;
    unlink($file2);

  $lokasi_file    = $_FILES['file_image']['tmp_name'];
  $tipe_file      = $_FILES['file_image']['type'];
  $nama_file      = $_FILES['file_image']['name'];
  $acak           = rand(000000,999999);
  $nama_file_unik = $acak.$nama_file; 
  
  move_uploaded_file($lokasi_file,"jadwal/$nama_file_unik");
    mysqli_query($koneksi,"UPDATE kelas SET 
                            kelas   	= '$_POST[kelas]',
                            jadwal       = '$nama_file_unik'
                           WHERE kelas = '$_POST[kelas]'");
  header('location:index.php?page=jadwal&id_adm='.$_SESSION['id_adm']);
  }

?>