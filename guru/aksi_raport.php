<?php
session_start();
include("../koneksi.php");
$page=isset($_GET['page']) ? $_GET['page'] : '';
$proses=isset($_GET['proses']) ? $_GET['proses'] : '';


if ($page=='raport' AND $proses=='hapus'){
  
  $r=mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM rapor WHERE id_rapor=$_GET[id_rapor]"));
  $file1=$r['rapor'];
  $file2='./raport/'.$file1;
    unlink($file2);
mysqli_query($koneksi,"DELETE FROM rapor WHERE id_rapor='$_GET[id_rapor]'");
  header('location:index.php?page=raport&id_guru='.$_SESSION['id_guru']);
}

else if ($page=='raport' AND $proses=='input'){

  // ======Raport====
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
      move_uploaded_file($lokasi_file,"raport/$nama_file_unik");
      mysqli_query($koneksi,"INSERT INTO rapor
  								(id_rapor,
                  id_siswa,
                  id_guru,
                  rapor,
                  semester) 
	                       VALUES
                                ('$_POST[id_rapor]',
                                '$_POST[id_siswa]',
                                '$_SESSION[id_guru]',
                                '$nama_file_unik',
                                '$_POST[semester]')");
    header('location:index.php?page=raport&id_guru='.$_SESSION['id_guru']);
    }

  }   else {
    mysqli_query($koneksi,"INSERT INTO rapor
    (id_rapor,
    id_siswa,
    id_guru,
    semester) 
          VALUES
                  ('$_POST[id_rapor]',
                  '$_POST[id_siswa]',
                  '$_SESSION[id_guru]',
                  '$_POST[semester]')");
  header('location:index.php?page=raport&id_guru='.$_SESSION['id_guru']);
  }

  
}
else if ($page=='raport' AND $proses=='update'){
  // ======Raport====
  $r=mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM rapor WHERE id_rapor=$_POST[id_rapor]"));
  $file1=$r['rapor'];
  $file2='./raport/'.$file1;
    unlink($file2);

  $lokasi_file    = $_FILES['file_image']['tmp_name'];
  $tipe_file      = $_FILES['file_image']['type'];
  $nama_file      = $_FILES['file_image']['name'];
  $acak           = rand(000000,999999);
  $nama_file_unik = $acak.$nama_file; 
  
  move_uploaded_file($lokasi_file,"raport/$nama_file_unik");
    mysqli_query($koneksi,"UPDATE rapor SET 
                            id_rapor   	= '$_POST[id_rapor]',
                            id_siswa    = '$_POST[id_siswa]',
                            id_guru     = '$_SESSION[id_guru]',
                            rapor       = '$nama_file_unik',
							              semester	  = '$_POST[semester]'  
                           WHERE id_rapor = '$_POST[id_rapor]'");
  header('location:index.php?page=raport&id_guru='.$_SESSION['id_guru']);
  }

?>