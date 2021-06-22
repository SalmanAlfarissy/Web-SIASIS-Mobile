<?php
session_start();
include("../koneksi.php");
$page=isset($_GET['page']) ? $_GET['page'] : '';
$proses=isset($_GET['proses']) ? $_GET['proses'] : '';


if ($page=='siswa' AND $proses=='hapus'){
  
  $r=mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM siswa WHERE id_siswa=$_GET[id_siswa]"));
  $file1=$r['cover'];
  $file2='./cover/'.$file1;
    unlink($file2);
  $fileA=$r['foto_sis'];
  $fileB='./siswa/'.$fileA;
    unlink($fileB);  
mysqli_query($koneksi,"DELETE FROM siswa WHERE id_siswa='$_GET[id_siswa]'");
  header('location:index.php?page=siswa&id_adm='.$_SESSION['id_adm']);
}

else if ($page=='siswa' AND $proses=='input'){

  // ======Raport====
  $lokasi_file    = $_FILES['file_image']['tmp_name'];
  $tipe_file      = $_FILES['file_image']['type'];
  $nama_file      = $_FILES['file_image']['name'];
  $acak           = rand(000000,999999);
  $nama_file_unik = $acak.$nama_file;

  $lokasi_file2    = $_FILES['file_foto']['tmp_name'];
  $tipe_file2      = $_FILES['file_foto']['type'];
  $nama_file2      = $_FILES['file_foto']['name'];
  $acak2           = rand(000000,999999);
  $nama_file_unik2 = $acak2.$nama_file2;

  $pass=md5($_POST['password']);
  if (!empty($lokasi_file) && !empty($lokasi_file2)){
    
    if ($tipe_file != "image/jpeg" AND $tipe_file != "image/pjpg" AND $tipe_file != "image/png" AND $tipe_file2 != "image/jpeg" AND $tipe_file2 != "image/pjpg" AND $tipe_file2 != "image/png") {
      echo "Gagal menyimpan data !!! <br>
            Tipe file <b>$nama_file</b> : $tipe_file <br>
            Tipe file <b>$nama_file2</b> : $tipe_file2 <br>
            Tipe file yang diperbolehkan adalah : <b>JPG/JPEG/png</b>.<br>";
        echo "<a href=javascript:history.go(-1)>Ulangi Lagi</a>";       
    }    else{
      move_uploaded_file($lokasi_file,"cover/$nama_file_unik");
      move_uploaded_file($lokasi_file2,"siswa/$nama_file_unik2");
      mysqli_query($koneksi,"INSERT INTO siswa (id_siswa, id_guru, id_adm, password, nisn, nis, nama_sis, foto_sis, kelas, semester, cover) VALUES 
      ('$_POST[id_siswa]',
      '$_POST[id_guru]',
      '$_SESSION[id_adm]',
      '$pass',
      '$_POST[nisn]',
      '$_POST[nis]',
      '$_POST[nama_sis]',
      '$nama_file_unik2',
      '$_POST[kelas]',
      '$_POST[semester]',
      '$nama_file_unik')");
    header('location:index.php?page=siswa&id_adm='.$_SESSION['id_adm']);
    }

  }   else {
    mysqli_query($koneksi,"INSERT INTO siswa (id_siswa, id_guru, id_adm, password, nisn, nis, nama_sis, kelas, semester) VALUES 
    ('$_POST[id_siswa]',
    '$_POST[id_guru]',
    '$_SESSION[id_adm]',
    '$pass',
    '$_POST[nisn]',
    '$_POST[nis]',
    '$_POST[nama_sis]',
    '$_POST[kelas]',
    '$_POST[semester]')");
  header('location:index.php?page=siswa&id_adm='.$_SESSION['id_adm']);
  }

}
else if ($page=='siswa' AND $proses=='update'){
  // ======Raport====
  $r=mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM siswa WHERE id_siswa=$_POST[id_siswa]"));
  $file1=$r['cover'];
  $file2='./cover/'.$file1;
    unlink($file2);

  $fileA=$r['foto_sis'];
  $fileB='./siswa/'.$fileA;
    unlink($fileB); 

  $lokasi_file    = $_FILES['file_image']['tmp_name'];
  $tipe_file      = $_FILES['file_image']['type'];
  $nama_file      = $_FILES['file_image']['name'];
  $acak           = rand(000000,999999);
  $nama_file_unik = $acak.$nama_file; 

  $lokasi_file2    = $_FILES['file_foto']['tmp_name'];
  $tipe_file2      = $_FILES['file_foto']['type'];
  $nama_file2      = $_FILES['file_foto']['name'];
  $acak2           = rand(000000,999999);
  $nama_file_unik2 = $acak2.$nama_file2;

  $pass=md5($_POST['password']);
  
  move_uploaded_file($lokasi_file,"cover/$nama_file_unik");
  move_uploaded_file($lokasi_file2,"siswa/$nama_file_unik2");
    mysqli_query($koneksi,"UPDATE siswa SET 
                            id_siswa   	= '$_POST[id_siswa]',
                            id_guru    = '$_POST[id_guru]',
                            id_adm     = '$_SESSION[id_adm]',
                            nisn     = '$_POST[nisn]',
                            nis     = '$_POST[nis]',
                            nama_sis     = '$_POST[nama_sis]',
                            foto_sis     = '$nama_file_unik2',
                            password     = '$pass',
                            kelas     = '$_POST[kelas]',
                            semester = '$_POST[semester]',
                            cover       = '$nama_file_unik'
                           WHERE id_siswa = '$_POST[id_siswa]'");
  header('location:index.php?page=siswa&id_adm='.$_SESSION['id_adm']);
  }

?>