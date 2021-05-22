<?php
include_once '../koneksi.php';
 $nis = $_POST['nis'];
 $password = $_POST['password'];
 $nama_sis = $_POST['nama_sis'];
 $foto_sis= $_POST['foto_sis'];
 $ttl= $_POST['ttl'];
 $jenis_kelamin = $_POST['jenis_kelamin'];
 $agama= $_POST['agama'];
 $status_keluarga= $_POST['status_keluarga'];
 $anak_ke= $_POST['anak_ke'];
 $alamat= $_POST['alamat'];
 $no_hp= $_POST['no_hp'];
 $tahun_diterima= $_POST['tahun_diterima'];
 $semester_diterima= $_POST['semester_diterima'];
 $nama_sekolah_asal= $_POST['nama_sekolah_asal'];
 $alamat_sekolah_asal= $_POST['alamat_sekolah_asal'];
 $tahun_ijazah_sebelumnya= $_POST['tahun_ijazah_sebelumnya'];
 $nomor_ijazah_sebelumnya= $_POST['nomor_ijazah_sebelumnya'];
 $tahun_skhun_sebelumnya= $_POST['tahun_skhun_sebelumnya'];
 $nomor_skhun_sebelumnya= $_POST['nomor_skhun_sebelumnya'];
 $nama_ayah= $_POST['nama_ayah'];
 $nama_ibu= $_POST['nama_ibu'];
 $alamat_ortu= $_POST['alamat_ortu'];
 $pekerjaan_ayah= $_POST['pekerjaan_ayah'];
 $pekerjaan_ibu= $_POST['pekerjaan_ibu'];
 $nama_wali= $_POST['nama_wali'];
 $alamat_wali= $_POST['alamat_wali'];
 $no_hp_wali= $_POST['no_hp_wali'];
 $pekerjaan_wali= $_POST['pekerjaan_wali'];
 
 $sqlquery = "UPDATE siswa SET 
 password = '$password', 
 nama_sis = '$nama_sis', 
 foto_sis = '$foto_sis', 
 ttl='$ttl', 
 jenis_kelamin='$jenis_kelamin', 
 agama='$agama',
 status_keluarga = '$status_keluarga', 
 anak_ke = '$anak_ke', 
 alamat = '$alamat', 
 no_hp='$no_hp', 
 tahun_diterima='$tahun_diterima', 
 semester_diterima='$semester_diterima',
 nama_sekolah_asal = '$nama_sekolah_asal', 
 alamat_sekolah_asal = '$alamat_sekolah_asal', 
 tahun_ijazah_sebelumnya = '$tahun_ijazah_sebelumnya', 
 nomor_ijazah_sebelumnya='$nomor_ijazah_sebelumnya', 
 tahun_skhun_sebelumnya='$tahun_skhun_sebelumnya', 
 nomor_skhun_sebelumnya='$nomor_skhun_sebelumnya',
 nama_ayah = '$nama_ayah', 
 nama_ibu = '$nama_ibu', 
 alamat_ortu = '$alamat_ortu', 
 pekerjaan_ayah='$pekerjaan_ayah', 
 pekerjaan_ibu='$pekerjaan_ibu', 
 nama_wali='$nama_wali', 
 alamat_wali='$alamat_wali', 
 no_hp_wali='$no_hp_wali', 
 pekerjaan_wali='$pekerjaan_wali'
  WHERE nis= '$nis'";

 if (mysqli_query($koneksi, $sqlquery)) {
     echo 'update data suskses';
    
}
else{
    echo 'silahkan Coba lagi!!';
}
mysqli_close($koneksi)
?>
