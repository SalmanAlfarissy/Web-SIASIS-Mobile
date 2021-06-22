<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Raport</h1>
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
    <a href=?page=raport&aksi=entri&id_guru=<?php echo $_GET['id_guru'] ?> class="btn btn-primary fa fa-plus"> Entri Raport</a>
</div>
<br/>

<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Raport Siswa
            </div>        
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Siswa</th>
                                <th>Nama Guru</th>
                                <th>Raport</th>
                                <th>Semester</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        
                        <?php 
                        $no=1;
                        $tampil=mysqli_query($koneksi,"SELECT * FROM rapor where id_guru=$_GET[id_guru] order by id_rapor ASC");
                        while ($data=mysqli_fetch_array($tampil)) {
                            $guru=mysqli_query($koneksi,"SELECT * FROM guru where id_guru = $data[id_guru]");
                            $siswa=mysqli_query($koneksi,"SELECT * FROM siswa where id_siswa = $data[id_siswa]");
                            $gr=mysqli_fetch_array($guru);
                            $sw=mysqli_fetch_array($siswa);
                        ?>

                        <tbody>
                            <!-- isi tabel -->
                            <tr class="odd gradeX">
                                <td><?php echo $no?></td>
                                <td><?php echo $sw['nama_sis']?></td>
                                <td><?php echo $gr['nama_guru']?></td>
                                <td><?php echo $data['rapor']?></td>
                                <td><?php echo $data['semester']?></td>
                                <td><a href=?page=raport&aksi=edit&id_guru=<?php echo $_GET['id_guru'] ?>&id_rapor=<?php echo $data['id_rapor']; ?> class="btn btn-success btn-sm fa fa-pencil"> Edit</a>
			                        <a href="aksi_raport.php?page=raport&id_guru=<?php echo $_GET['id_guru'] ?>&proses=hapus&id_rapor=<?php echo $data['id_rapor']; ?>" 
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
                    <a href=?page=raport&aksi=list&id_guru=<?php echo $_GET['id_guru'] ?> class="btn btn-danger fa fa-table"> Data Raport </a>
                    <h2>Entri Raport</h2>

                    <form role="form" method="post" enctype="multipart/form-data" action="aksi_raport.php?page=raport&proses=input">
                        
                        <div class="form-group">
                            <label>ID Raport</label>
                            <input type="text" name="id_rapor" class="form-control" placeholder="ID Rapor">
                        </div>

                        <div class="form-group">
                            <label>Nama Siswa</label>
                            <select name="id_siswa" class="form-control">
                                <?php
                                $ambil=mysqli_query($koneksi,"SELECT id_siswa,nisn,nama_sis FROM siswa where id_guru = $_GET[id_guru] order by id_siswa ASC");
                                while ($data=mysqli_fetch_array($ambil)) {
                                echo "<option value='$data[id_siswa]'>$data[nama_sis]</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Semester</label>
                            <select name="semester" class="form-control">
                                <option value='Semester 1'>Semester 1</option>
                                <option value='Semester 2'>Semester 2</option>  
                                <option value='Semester 3'>Semester 3</option>
                                <option value='Semester 4'>Semester 4</option> 
                                <option value='Semester 5'>Semester 5</option>
                                <option value='Semester 6'>Semester 6</option>                               
                            </select>
                        </div>

                        
                        <div class="form-group">
                            <label>Raport</label>
                            <input type="file" name="file_image">
                        </div>

                        <button type="submit" class="btn btn-primary fa fa-floppy-o"> Simpan</button>
                        <button type="reset" class="btn btn-default">Reset</button>
                    </form>
                    <?php
                        break;
                    case 'edit' :	
                    $ambil=mysqli_query($koneksi,"SELECT * FROM rapor WHERE id_rapor=$_GET[id_rapor]");
                    $r=mysqli_fetch_array($ambil);
                    ?>
                    <a href=?page=raport&aksi=list&id_guru=<?php echo $_GET['id_guru'] ?> class="btn btn-danger fa fa-table"> Data Raport </a>
                    <h2>Edit Berita</h2>

                    <form role="form" method="post" enctype="multipart/form-data" action="aksi_raport.php?page=raport&proses=update">
                        
                        
                        <div class="form-group">
                            <label>ID Raport</label>
                            <input type="text" name="id_rapor" value="<?php echo $r['id_rapor'];?>" class="form-control" placeholder="ID Raport">
                        </div>

                        <div class="form-group">
                            <label>Nama Siswa</label>
                            <select name="id_siswa" class="form-control">
                            <?php
                            $ambil=mysqli_query($koneksi,"SELECT id_siswa,nisn,nama_sis FROM siswa order by id_siswa ASC");
                            while ($data=mysqli_fetch_array($ambil)) {
                                $select=($r['id_siswa']==$data['id_siswa']) ? 'selected' :'';
                                echo "<option value='$data[id_siswa]' $select>$data[nama_sis]</option>";
                            }
                            ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Semester</label>
                            <select name="semester" class="form-control">
                                <?php
                                $ambil=mysqli_query($koneksi,"SELECT * FROM rapor order by id_rapor ASC");
                                while ($data=mysqli_fetch_array($ambil)) {
                                    $select=($r['id_rapor']==$data['id_rapor']) ? 'selected' :'';
                                    echo "<option value='$data[semester]' $select>$data[semester]</option>";
                                    
                                }
                                echo "<option value='Semester 1' >Semester 1</option>";
                                echo "<option value='Semester 2' >Semester 2</option>";
                                ?>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label>Raport</label>
                            <input type="file" name="file_image">
                            <?php 
                            if ($r['rapor']!='') {
                                echo "<img class='gambar' src='raport/$r[rapor]' height='100' width='100'>";
                            }
                            else {
                                echo "Tidak ada image";
                            }
                            ?>
                        </div>
                        
                        <button type="submit" class="btn btn-primary fa fa-floppy-o"> Simpan</button>
                        <button type="reset" class="btn btn-default">Reset</button>
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