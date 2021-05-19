<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Data Alumni</h1>
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
    <a href=?page=alumni&aksi=entri&id_adm=<?php echo $_GET['id_adm'] ?> class="btn btn-primary fa fa-plus"> Entri Data Alumni </a>
</div>
<br/>

<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
               Data Alumni
            </div>        
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Angkatan</th>
                                <th>Pekerjaan</th>
                                <th>Alamat</th>
                                <th>Foto</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        
                        <?php 
                        $no=1;
                        $tampil=mysqli_query($koneksi,"SELECT * FROM alumni order by id_alumni ASC");
                        while ($data=mysqli_fetch_array($tampil)) {
                        ?>

                        <tbody>
                            <!-- isi tabel -->
                            <tr class="odd gradeX">
                                <td><?php echo $no?></td>
                                <td><?php echo $data['nama']?></td>
                                <td><?php echo $data['angkatan']?></td>
                                <td><?php echo $data['pekerjaan']?></td>
                                <td><?php echo $data['alamat']?></td>
                                <td><?php echo $data['foto']?></td>
                                <td><a href=?page=alumni&aksi=edit&id_adm=<?php echo $_GET['id_adm'] ?>&id_alumni=<?php echo $data['id_alumni']; ?> class="btn btn-success btn-sm fa fa-pencil"> Edit</a>
			                        <a href="aksi_alumni.php?page=alumni&id_adm=<?php echo $_GET['id_adm'] ?>&proses=hapus&id_alumni=<?php echo $data['id_alumni']; ?>" 
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
                    <a href=?page=alumni&aksi=list&id_adm=<?php echo $_GET['id_adm'] ?> class="btn btn-danger fa fa-table"> Data Alumni </a>
                    <h2>Entri New Data Alumni</h2>

                    <form role="form" method="post" enctype="multipart/form-data" action="aksi_alumni.php?page=alumni&proses=input">
                        
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="nama" class="form-control" placeholder="Nama">
                        </div>

                        <div class="form-group">
                            <label>Angkatan</label>
                            <input type="text" name="angkatan" class="form-control" placeholder="Angkatan">
                        </div>

                        <div class="form-group">
                            <label>Pekerjaan</label>
                            <input type="text" name="pekerjaan" class="form-control" placeholder="Pekerjaan">
                        </div>

                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea name="alamat" class="form-control" placeholder="Alamat"></textarea>
                        </div>

                        <div class="form-group">
                            <label>Foto</label>
                            <input type="file" name="file_image">
                        </div>


                        <button type="submit" class="btn btn-primary fa fa-floppy-o"> Simpan</button>
                        <button type="reset" class="btn btn-default">Reset</button>
                        <br></br>
                        
                    </form>
                    <?php
                        break;
                    case 'edit' :	
                    $query=mysqli_query($koneksi,"SELECT * FROM alumni WHERE id_alumni=$_GET[id_alumni]");
                    $data=mysqli_fetch_array($query);
                    ?>
                    <a href=?page=alumni&aksi=list&id_adm=<?php echo $_GET['id_adm'] ?> class="btn btn-danger fa fa-table"> Data Alumni </a>
                    <h2>Edit Data Alumni</h2>

                    <form role="form" method="post" enctype="multipart/form-data" action="aksi_alumni.php?page=alumni&proses=update">
                        
                        <div   div class="form-group">
                            <input name="id_alumni" class="form-control" value="<?php echo $data['id_alumni']?>" type="hidden">
                        </div>

                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="nama" class="form-control" placeholder="Nama" value="<?php echo $data['nama']?>">
                        </div>

                        <div class="form-group">
                            <label>Angkatan</label>
                            <input type="text" name="angkatan" class="form-control" placeholder="Angkatan" value="<?php echo $data['angkatan']?>">
                        </div>

                        <div class="form-group">
                            <label>Pekerjaan</label>
                            <input type="text" name="pekerjaan" class="form-control" placeholder="Pekerjaan" value="<?php echo $data['pekerjaan']?>">
                        </div>

                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea type="text" name="alamat" class="form-control" placeholder="Alamat"><?php echo $data['alamat']?></textarea>
                        </div>

                        <div class="form-group">
                            <label>Foto</label>
                            <input type="file" name="file_image">
                            <?php 
                            if ($data['foto']!='') {
                                echo "<img class='gambar' src='alumni/$data[foto]' height='100' width='100'>";
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