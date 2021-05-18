<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Jadwal Siswa</h1>
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
    <a href=?page=jadwal&aksi=entri&id_adm=<?php echo $_GET['id_adm'] ?> class="btn btn-primary fa fa-plus"> Entri Jadwal </a>
</div>
<br/>

<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
               Data Jadwal
            </div>        
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kelas</th>
                                <th>Jadwal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        
                        <?php 
                        $no=1;
                        $tampil=mysqli_query($koneksi,"SELECT * FROM kelas order by kelas");
                        while ($data=mysqli_fetch_array($tampil)) {
                        ?>

                        <tbody>
                            <!-- isi tabel -->
                            <tr class="odd gradeX">
                                <td><?php echo $no?></td>
                                <td><?php echo $data['kelas']?></td>
                                <td><?php echo $data['jadwal']?></td>
                                <td><a href=?page=jadwal&aksi=edit&id_adm=<?php echo $_GET['id_adm'] ?>&kelas=<?php echo $data['kelas']; ?> class="btn btn-success btn-sm fa fa-pencil"> Edit</a>
			                        <a href="aksi_jadwal.php?page=jadwal&id_adm=<?php echo $_GET['id_adm'] ?>&proses=hapus&kelas=<?php echo $data['kelas']; ?>" 
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
                    <a href=?page=jadwal&aksi=list&id_adm=<?php echo $_GET['id_adm'] ?> class="btn btn-danger fa fa-table"> Data Jadwal </a>
                    <h2>Entri New Jadwal</h2>

                    <form role="form" method="post" enctype="multipart/form-data" action="aksi_jadwal.php?page=jadwal&proses=input">
                        
                        <div class="form-group">
                            <label>Kelas</label>
                            <input type="text" name="kelas" class="form-control" placeholder="Kelas">
                        </div>

                        <div class="form-group">
                            <label>Jadwal</label>
                            <input type="file" name="file_image">
                        </div>


                        <button type="submit" class="btn btn-primary fa fa-floppy-o"> Simpan</button>
                        <button type="reset" class="btn btn-default">Reset</button>
                        <br></br>
                        
                    </form>
                    <?php
                        break;
                    case 'edit' :	
                    $query=mysqli_query($koneksi,"SELECT * FROM kelas WHERE kelas='$_GET[kelas]'");
                    $data=mysqli_fetch_array($query);
                    ?>
                    <a href=?page=jadwal&aksi=list&id_adm=<?php echo $_GET['id_adm'] ?> class="btn btn-danger fa fa-table"> Data Jadwal </a>
                    <h2>Edit Data Jadwal</h2>

                    <form role="form" method="post" enctype="multipart/form-data" action="aksi_jadwal.php?page=jadwal&proses=update">
                        
                        <div class="form-group">
                            <label>Kelas</label>
                            <input type="text" name="kelas" class="form-control" placeholder="Kelas" value="<?php echo $data['kelas']?>">
                        </div>


                        <div class="form-group">
                            <label>Jadwal</label>
                            <input type="file" name="file_image">
                            <?php 
                            if ($data['jadwal']!='') {
                                echo "<img class='gambar' src='jadwal/$data[jadwal]' height='100' width='100'>";
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