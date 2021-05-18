<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Event</h1>
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
    <a href=?page=event&aksi=entri&id_adm=<?php echo $_GET['id_adm'] ?> class="btn btn-primary fa fa-plus"> Entri Event </a>
</div>
<br/>

<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
               Data Event
            </div>        
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Gambar</th>
                                <th>Tanggal Posting</th>
                                <th>Deskripsi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        
                        <?php 
                        $no=1;
                        $tampil=mysqli_query($koneksi,"SELECT * FROM informasi order by id_info ASC");
                        while ($data=mysqli_fetch_array($tampil)) {
                        ?>

                        <tbody>
                            <!-- isi tabel -->
                            <tr class="odd gradeX">
                                <td><?php echo $no?></td>
                                <td><?php echo $data['nama_event']?></td>
                                <td><?php echo $data['gambar_event']?></td>
                                <td><?php echo $data['tgl_post']?></td>
                                <td><?php echo $data['deskripsi']?></td>
                                <td><a href=?page=event&aksi=edit&id_adm=<?php echo $_GET['id_adm'] ?>&id_info=<?php echo $data['id_info']; ?> class="btn btn-success btn-sm fa fa-pencil"> Edit</a>
			                        <a href="aksi_event.php?page=event&id_adm=<?php echo $_GET['id_adm'] ?>&proses=hapus&id_info=<?php echo $data['id_info']; ?>" 
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
                    <a href=?page=event&aksi=list&id_adm=<?php echo $_GET['id_adm'] ?> class="btn btn-danger fa fa-table"> Data Event </a>
                    <h2>Entri New Event</h2>

                    <form role="form" method="post" enctype="multipart/form-data" action="aksi_event.php?page=event&proses=input">
                        
                        <div class="form-group">
                            <label>ID</label>
                            <input type="text" name="id_info" class="form-control" placeholder="ID">
                        </div>

                        <div class="form-group">
                            <label>Judul</label>
                            <input type="text" name="nama_event" class="form-control" placeholder="Judul">
                        </div>

                        <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea rows="5" name="deskripsi" class="form-control" placeholder="Deskripsi"></textarea>
                        </div>

                        <div class="form-group">
                            <label>Gambar</label>
                            <input type="file" name="file_image">
                        </div>


                        <button type="submit" class="btn btn-primary fa fa-floppy-o"> Simpan</button>
                        <button type="reset" class="btn btn-default">Reset</button>
                        <br></br>
                        
                    </form>
                    <?php
                        break;
                    case 'edit' :	
                    $query=mysqli_query($koneksi,"SELECT * FROM informasi WHERE id_info='$_GET[id_info]'");
                    $data=mysqli_fetch_array($query);
                    ?>
                    <a href=?page=event&aksi=list&id_adm=<?php echo $_GET['id_adm'] ?> class="btn btn-danger fa fa-table"> Data Event </a>
                    <h2>Edit Data Evetn</h2>

                    <form role="form" method="post" enctype="multipart/form-data" action="aksi_event.php?page=event&proses=update">
                        
                        <div class="form-group">
                            <label>ID</label>
                            <input type="text" name="id_info" class="form-control" placeholder="ID" value="<?php echo $data['id_info']?>">
                        </div>

                        <div class="form-group">
                            <label>Judul</label>
                            <input type="text" name="nama_event" class="form-control" placeholder="Judul" value="<?php echo $data['nama_event']?>">
                        </div>

                        <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea name="deskripsi" class="form-control" rows="5" placeholder="Deskripsi"><?php echo $data['deskripsi']?></textarea>
                        </div>


                        <div class="form-group">
                            <label>Gambar</label>
                            <input type="file" name="file_image">
                            <?php 
                            if ($data['gambar_event']!='') {
                                echo "<img class='gambar' src='event/$data[gambar_event]' height='100' width='100'>";
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