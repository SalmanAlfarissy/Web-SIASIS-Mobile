<?php
session_start();
include("../koneksi.php");
$page=isset($_GET['page']) ? $_GET['page'] : '';
$proses=isset($_GET['proses']) ? $_GET['proses'] : '';


if ($page=='event' AND $proses=='hapus'){
  
  $r=mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM informasi WHERE id_info='$_GET[id_info]'"));
  $file1=$r['gambar_event'];
  $file2='./event/'.$file1;
    unlink($file2);
mysqli_query($koneksi,"DELETE FROM informasi WHERE id_info='$_GET[id_info]'");
  header('location:index.php?page=event&id_adm='.$_SESSION['id_adm']);
}

else if ($page=='event' AND $proses=='input'){

  $lokasi_file    = $_FILES['file_image']['tmp_name'];
  $tipe_file      = $_FILES['file_image']['type'];
  $nama_file      = $_FILES['file_image']['name'];
  $acak           = rand(000000,999999);
  $nama_file_unik = $acak.$nama_file; 
  $date = date('Y-m-d H:i:s');
  if (!empty($lokasi_file)){
    
    if ($tipe_file != "image/jpeg" AND $tipe_file != "image/pjpg" AND $tipe_file != "image/png") {
      echo "Gagal menyimpan data !!! <br>
            Tipe file <b>$nama_file</b> : $tipe_file <br>
            Tipe file yang diperbolehkan adalah : <b>JPG/JPEG/png</b>.<br>";
        echo "<a href=javascript:history.go(-1)>Ulangi Lagi</a>";       
    }    else{
      move_uploaded_file($lokasi_file,"event/$nama_file_unik");
      mysqli_query($koneksi,"INSERT INTO informasi (id_info,id_adm,nama_event,gambar_event,tgl_post,deskripsi) VALUES 
      ('$_POST[id_info]',
      '$_SESSION[id_adm]',
      '$_POST[nama_event]',
      '$nama_file_unik',
      '$date',
      '$_POST[deskripsi]')");
    header('location:index.php?page=event&id_adm='.$_SESSION['id_adm']);
    }

  }   else {
    mysqli_query($koneksi,"INSERT INTO informasi (id_info,id_adm,nama_event,tgl_post,deskripsi) VALUES 
      ('$_POST[id_info]',
      '$_SESSION[id_adm]',
      '$_POST[nama_event]',
      '$date',
      '$_POST[deskripsi]')");
  header('location:index.php?page=event&id_adm='.$_SESSION['id_adm']);
  }

  
}
else if ($page=='event' AND $proses=='update'){
  // ======Raport====
  $r=mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM informasi WHERE id_info='$_POST[id_info]'"));
  $file1=$r['gambar_event'];
  $file2='./event/'.$file1;
    unlink($file2);

  $lokasi_file    = $_FILES['file_image']['tmp_name'];
  $tipe_file      = $_FILES['file_image']['type'];
  $nama_file      = $_FILES['file_image']['name'];
  $acak           = rand(000000,999999);
  $nama_file_unik = $acak.$nama_file;
  $date = date('Y-m-d H:i:s'); 
  
  move_uploaded_file($lokasi_file,"event/$nama_file_unik");
    mysqli_query($koneksi,"UPDATE informasi SET 
                            nama_event   	= '$_POST[nama_event]',
                            gambar_event  = '$nama_file_unik',
                            tgl_post   	= '$date',
                            deskripsi   	= '$_POST[deskripsi]'
                           WHERE id_info = '$_POST[id_info]'");
  header('location:index.php?page=event&id_adm='.$_SESSION['id_adm']);
  }

?>