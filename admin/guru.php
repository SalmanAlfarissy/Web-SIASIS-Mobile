<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Guru</h1>
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
    <a href=?page=guru&aksi=entri&id_adm=<?php echo $_GET['id_adm'] ?> class="btn btn-primary fa fa-plus"> Entri Data Guru </a>
</div>
<br/>

<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
               Data Guru
            </div>        
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIP</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>No Telp</th>
                                <th>Jabatan</th>
                                <th>Password</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        
                        <?php 
                        $no=1;
                        $tampil=mysqli_query($koneksi,"SELECT * FROM guru order by id_guru ASC");
                        while ($data=mysqli_fetch_array($tampil)) {
                            
                        ?>

                        <tbody>
                            <!-- isi tabel -->
                            <tr class="odd gradeX">
                                <td><?php echo $no?></td>
                                <td><?php echo $data['nip_guru']?></td>
                                <td><?php echo $data['nama_guru']?></td>
                                <td><?php echo $data['email_guru']?></td>
                                <td><?php echo $data['no_telp']?></td>
                                <td><?php echo $data['jabatan']?></td>
                                <td><?php echo $data['password']?></td>
                                <td><a href=?page=guru&aksi=edit&id_adm=<?php echo $_GET['id_adm'] ?>&id_guru=<?php echo $data['id_guru']; ?> class="btn btn-success btn-sm fa fa-pencil"> Edit</a>
			                        <a href="aksi_guru.php?page=guru&id_adm=<?php echo $_GET['id_adm'] ?>&proses=hapus&id_guru=<?php echo $data['id_guru']; ?>" 
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
                    <a href=?page=guru&aksi=list&id_adm=<?php echo $_GET['id_adm'] ?> class="btn btn-danger fa fa-table"> Data Guru </a>
                    <h2>Entri New Guru</h2>

                    <form role="form" method="post" enctype="multipart/form-data" action="aksi_guru.php?page=guru&proses=input">
                        
                        <div class="form-group">
                            <label>ID</label>
                            <input type="text" name="id_guru" class="form-control" placeholder="ID">
                        </div>

                        <div class="form-group">
                            <label>NIP</label>
                            <input type="text" name="nip_guru" class="form-control" placeholder="NIP">
                        </div>

                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="nama_guru" class="form-control" placeholder="Nama">
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email_guru" class="form-control" placeholder="Email">
                        </div>

                        <div class="form-group">
                            <label>No Telp</label>
                            <input type="text" name="no_telp" class="form-control" placeholder="No Telp">
                        </div>

                        <div class="form-group">
                            <label>Jabatan</label>
                            <input type="text" name="jabatan" class="form-control" placeholder="Jabatan">
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password">
                        </div>


                        <button type="submit" class="btn btn-primary fa fa-floppy-o"> Simpan</button>
                        <button type="reset" class="btn btn-default">Reset</button>
                        <br></br>
                        
                    </form>
                    <?php
                        break;
                    case 'edit' :	
                    $query=mysqli_query($koneksi,"SELECT * FROM guru WHERE id_guru=$_GET[id_guru]");
                    $data=mysqli_fetch_array($query);
                    ?>
                    <a href=?page=guru&aksi=list&id_adm=<?php echo $_GET['id_adm'] ?> class="btn btn-danger fa fa-table"> Data Administrator </a>
                    <h2>Edit Data Guru</h2>

                    <form role="form" method="post" enctype="multipart/form-data" action="aksi_guru.php?page=guru&proses=update">
                        
                        <div class="form-group">
                            <label>ID</label>
                            <input type="text" name="id_guru" class="form-control" placeholder="ID" value="<?php echo $data['id_guru']?>">
                        </div>

                        <div class="form-group">
                            <label>NIP</label>
                            <input type="text" name="nip_guru" class="form-control" placeholder="NIP" value="<?php echo $data['nip_guru']?>">
                        </div>

                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="nama_guru" class="form-control" placeholder="Nama" value="<?php echo $data['nama_guru']?>">
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email_guru" class="form-control" placeholder="Email" value="<?php echo $data['email_guru']?>">
                        </div>

                        <div class="form-group">
                            <label>No Telp</label>
                            <input type="text" name="no_telp" class="form-control" placeholder="No Telp" value="<?php echo $data['no_telp']?>">
                        </div>

                        <div class="form-group">
                            <label>Jabatan</label>
                            <input type="text" name="jabatan" class="form-control" placeholder="Jabatan" value="<?php echo $data['jabatan']?>">
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo $data['password']?>">
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