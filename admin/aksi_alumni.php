<?php
session_start();
include("../koneksi.php");
$page=isset($_GET['page']) ? $_GET['page'] : '';
$proses=isset($_GET['proses']) ? $_GET['proses'] : '';


if ($page=='alumni' AND $proses=='hapus'){
  
  $r=mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM alumni WHERE id_alumni=$_GET[id_alumni]"));
  $file1=$r['foto'];
  $file2='./alumni/'.$file1;
    unlink($file2);
mysqli_query($koneksi,"DELETE FROM alumni WHERE id_alumni='$_GET[id_alumni]'");
  header('location:index.php?page=alumni&id_adm='.$_SESSION['id_adm']);
}

else if ($page=='alumni' AND $proses=='input'){

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
      move_uploaded_file($lokasi_file,"alumni/$nama_file_unik");
      mysqli_query($koneksi,"INSERT INTO alumni (id_alumni,id_adm,nama,angkatan,pekerjaan,alamat,foto) VALUES 
      ('',
      '$_SESSION[id_adm]',
      '$_POST[nama]',
      '$_POST[angkatan]',
      '$_POST[pekerjaan]',
      '$_POST[alamat]',
      '$nama_file_unik')");
    header('location:index.php?page=alumni&id_adm='.$_SESSION['id_adm']);
    }

  }   else {
    mysqli_query($koneksi,"INSERT INTO alumni (id_alumni,id_adm,nama,angkatan,pekerjaan,alamat,foto) VALUES 
      ('',
      '$_SESSION[id_adm]',
      '$_POST[nama]',
      '$_POST[angkatan]',
      '$_POST[pekerjaan]',
      '$_POST[alamat]')");
    header('location:index.php?page=alumni&id_adm='.$_SESSION['id_adm']);
  }

  
}
else if ($page=='alumni' AND $proses=='update'){
  $r=mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM alumni WHERE id_alumni=$_POST[id_alumni]"));
  $file1=$r['foto'];
  $file2='./alumni/'.$file1;
    unlink($file2);

  $lokasi_file    = $_FILES['file_image']['tmp_name'];
  $tipe_file      = $_FILES['file_image']['type'];
  $nama_file      = $_FILES['file_image']['name'];
  $acak           = rand(000000,999999);
  $nama_file_unik = $acak.$nama_file; 
  
  move_uploaded_file($lokasi_file,"alumni/$nama_file_unik");
    mysqli_query($koneksi,"UPDATE alumni SET 
                            id_adm     = '$_SESSION[id_adm]',
                            nama     = '$_POST[nama]',
                            angkatan     = '$_POST[angkatan]',
                            pekerjaan     = '$_POST[pekerjaan]',
                            alamat     = '$_POST[alamat]',
                            foto       = '$nama_file_unik'
                           WHERE id_alumni = '$_POST[id_alumni]'");
  header('location:index.php?page=alumni&id_adm='.$_SESSION['id_adm']);
  }

?>