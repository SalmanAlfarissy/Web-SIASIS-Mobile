<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Administrator</h1>
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
    <a href=?page=administrator&aksi=entri&id_adm=<?php echo $_GET['id_adm'] ?> class="btn btn-primary fa fa-plus"> Entri New Administrator </a>
</div>
<br/>

<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
               Data Administrator
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
                                <th>email</th>
                                <th>Password</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        
                        <?php 
                        $no=1;
                        $tampil=mysqli_query($koneksi,"SELECT * FROM administrator order by id_adm ASC");
                        while ($data=mysqli_fetch_array($tampil)) {
                            
                        ?>

                        <tbody>
                            <!-- isi tabel -->
                            <tr class="odd gradeX">
                                <td><?php echo $no?></td>
                                <td><?php echo $data['nip_ad']?></td>
                                <td><?php echo $data['nama_ad']?></td>
                                <td><?php echo $data['email']?></td>
                                <td><?php echo $data['password']?></td>
                                <td><a href=?page=administrator&aksi=edit&id_adm=<?php echo $_GET['id_adm'] ?>&id_edt=<?php echo $data['id_adm']; ?> class="btn btn-success btn-sm fa fa-pencil"> Edit</a>
			                        <a href="aksi_administrator.php?page=administrator&id_adm=<?php echo $_GET['id_adm'] ?>&proses=hapus&id_hps=<?php echo $data['id_adm']; ?>" 
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
                    <a href=?page=administrator&aksi=list&id_adm=<?php echo $_GET['id_adm'] ?> class="btn btn-danger fa fa-table"> Data Administrator </a>
                    <h2>Entri New Administrator</h2>

                    <form role="form" method="post" enctype="multipart/form-data" action="aksi_administrator.php?page=administrator&proses=input">
                        
                        <div class="form-group">
                            <label>ID</label>
                            <input type="text" name="id_adm" class="form-control" placeholder="ID">
                        </div>

                        <div class="form-group">
                            <label>NIP</label>
                            <input type="text" name="nip_ad" class="form-control" placeholder="NIP">
                        </div>

                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="nama_ad" class="form-control" placeholder="Nama">
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Email">
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
                    $query=mysqli_query($koneksi,"SELECT * FROM administrator WHERE id_adm=$_GET[id_edt]");
                    $data=mysqli_fetch_array($query);
                    ?>
                    <a href=?page=administrator&aksi=list&id_adm=<?php echo $_GET['id_adm'] ?> class="btn btn-danger fa fa-table"> Data Administrator </a>
                    <h2>Edit Administrator</h2>

                    <form role="form" method="post" enctype="multipart/form-data" action="aksi_administrator.php?page=administrator&proses=update">
                        
                        <div class="form-group">
                            <label>ID</label>
                            <input type="text" name="id_adm" class="form-control" placeholder="ID" value="<?php echo $data['id_adm']?>">
                        </div>

                        <div class="form-group">
                            <label>NIP</label>
                            <input type="text" name="nip_ad" class="form-control" placeholder="NIP" value="<?php echo $data['nip_ad']?>">
                        </div>

                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="nama_ad" class="form-control" placeholder="Nama" value="<?php echo $data['nama_ad']?>">
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $data['email']?>">
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