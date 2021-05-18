<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Siswa</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>

<?php
include("../koneksi.php");
$aksi=isset($_GET['aksi']) ? $_GET['aksi'] : 'list';
switch ($aksi){
    case 'list';
?>
<div>
    <a href=?page=siswa&aksi=entri&id_adm=<?php echo $_GET['id_adm'] ?> class="btn btn-primary fa fa-plus"> Entri Data Siswa </a>
</div>
<br/>

<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
               Data Siswa
            </div>        
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NISN</th>
                                <th>NIS</th>
                                <th>Nama_sis</th>
                                <th>password</th>
                                <th>kelas</th>
                                <th>Wali Kelas</th>
                                <th>Cover</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        
                        <?php 
                        $no=1;
                        $tampil=mysqli_query($koneksi,"SELECT * FROM siswa order by id_siswa ASC");
                        while ($data=mysqli_fetch_array($tampil)) {
                            $guru=mysqli_query($koneksi,"SELECT id_siswa,nama_guru FROM siswa join guru using(id_guru) WHERE id_siswa='$data[id_siswa]'");
                            $gr=mysqli_fetch_array($guru);
                        ?>

                        <tbody>
                            <!-- isi tabel -->
                            <tr class="odd gradeX">
                                <td><?php echo $no?></td>
                                <td><?php echo $data['nisn']?></td>
                                <td><?php echo $data['nis']?></td>
                                <td><?php echo $data['nama_sis']?></td>
                                <td><?php echo $data['password']?></td>
                                <td><?php echo $data['kelas']?></td>
                                <td><?php echo $gr['nama_guru']?></td>
                                <td><?php echo $data['cover']?></td>
                                <td><a href=?page=siswa&aksi=edit&id_adm=<?php echo $_GET['id_adm'] ?>&id_siswa=<?php echo $data['id_siswa']; ?> class="btn btn-success btn-sm fa fa-pencil"> Edit</a>
			                        <a href="aksi_siswa.php?page=siswa&id_adm=<?php echo $_GET['id_adm'] ?>&proses=hapus&id_siswa=<?php echo $data['id_siswa']; ?>" 
				                    onclick="return confirm('Yakin akan menghapus data ?');" class="btn btn-danger btn-sm fa fa-trash-o"> Hapus</td>
                            </tr>
                            <?php
                            $no++;
                        }
                            ?>
                            
                        </tbody>
                    </table>
                    <?php 
                        break;

                        case 'entri' ;

                    ?>
                    <a href=?page=siswa&aksi=list&id_adm=<?php echo $_GET['id_adm'] ?> class="btn btn-danger fa fa-table"> Data Siswa </a>
                    <h2>Entri New Siswa</h2>

                    <form role="form" method="post" enctype="multipart/form-data" action="aksi_siswa.php?page=siswa&proses=input">
                        
                        <div class="form-group">
                            <label>ID Siswa</label>
                            <input type="text" name="id_siswa" class="form-control" placeholder="ID Siswa">
                        </div>

                        <div class="form-group">
                            <label>ID Guru</label>
                            <input type="text" name="id_guru" class="form-control" placeholder="ID Guru">
                        </div>

                        <div class="form-group">
                            <label>NISN</label>
                            <input type="text" name="nisn" class="form-control" placeholder="NISN">
                        </div>

                        <div class="form-group">
                            <label>NIS</label>
                            <input type="text" name="nis" class="form-control" placeholder="NIS">
                        </div>

                        <div class="form-group">
                            <label>Nama Siswa</label>
                            <input type="text" name="nama_sis" class="form-control" placeholder="Nama Siswa">
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password">
                        </div>

                        <div class="form-group">
                            <label>Kelas</label>
                            <input type="text" name="kelas" class="form-control" placeholder="Kelas">
                        </div>

                        <div class="form-group">
                            <label>Cover</label>
                            <input type="file" name="file_image">
                        </div>


                        <button type="submit" class="btn btn-primary fa fa-floppy-o"> Simpan</button>
                        <button type="reset" class="btn btn-default">Reset</button>
                        <br></br>
                        
                    </form>
                    <?php
                        break;
                    case 'edit' :	
                    $query=mysqli_query($koneksi,"SELECT * FROM siswa WHERE id_siswa=$_GET[id_siswa]");
                    $data=mysqli_fetch_array($query);
                    ?>
                    <a href=?page=siswa&aksi=list&id_adm=<?php echo $_GET['id_adm'] ?> class="btn btn-danger fa fa-table"> Data Siswa </a>
                    <h2>Edit Data Siswa</h2>

                    <form role="form" method="post" enctype="multipart/form-data" action="aksi_siswa.php?page=siswa&proses=update">
                        
                        <div class="form-group">
                            <label>ID Siswa</label>
                            <input type="text" name="id_siswa" class="form-control" placeholder="ID Siswa" value="<?php echo $data['id_siswa']?>">
                        </div>

                        <div class="form-group">
                            <label>ID Guru</label>
                            <input type="text" name="id_guru" class="form-control" placeholder="ID Guru" value="<?php echo $data['id_guru']?>">
                        </div>

                        <div class="form-group">
                            <label>NISN</label>
                            <input type="text" name="nisn" class="form-control" placeholder="NISN" value="<?php echo $data['nisn']?>">
                        </div>

                        <div class="form-group">
                            <label>NIS</label>
                            <input type="text" name="nis" class="form-control" placeholder="NIS" value="<?php echo $data['nis']?>">
                        </div>

                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="nama_sis" class="form-control" placeholder="Nama" value="<?php echo $data['nama_sis']?>">
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo $data['password']?>">
                        </div>

                        <div class="form-group">
                            <label>Kelas</label>
                            <input type="text" name="kelas" class="form-control" placeholder="Kelas" value="<?php echo $data['kelas']?>">
                        </div>

                        <div class="form-group">
                            <label>Cover</label>
                            <input type="file" name="file_image">
                            <?php 
                            if ($data['cover']!='') {
                                echo "<img class='gambar' src='cover/$data[cover]' height='100' width='100'>";
                            }
                            else {
                                echo "Tidak ada image";
                            }
                            ?>
                        </div>
                        
                        <button type="submit" class="btn btn-primary fa fa-floppy-o"> Simpan</button>
                        <button type="reset" class="btn btn-default">Reset</button>
                        </br>
                        </br>
                    </form>
                    <?php
                        break;
                    }
                    ?>
                </div>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->