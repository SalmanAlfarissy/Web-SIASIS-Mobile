<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Data Siswa</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
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
                                <th>Nama Siswa</th>
                                <th>NISN</th>
                                <th>Agama</th>
                                <th>No Hp</th>
                                <th>Jenis Kelamin</th>
                                <th>Alamat</th>
                            </tr>
                        </thead>
                        
                        <?php 
                        $no=1;

                        include("../koneksi.php");
                        $siswa=mysqli_query($koneksi,"SELECT id_siswa,nama_sis,nisn,agama,no_hp,jenis_kelamin,alamat from siswa join guru using(id_guru) where id_guru=$_GET[id_guru] order by id_siswa");
                        while ($sw=mysqli_fetch_array($siswa)) {
                        ?>
                        <tbody>
                            <!-- isi tabel -->
                            <tr class="odd gradeX">
                                <td><?php echo $no?></td>
                                <td><?php echo $sw['nama_sis']?></td>
                                <td><?php echo $sw['nisn']?></td>
                                <td><?php echo $sw['agama']?></td>
                                <td><?php echo $sw['no_hp']?></td>
                                <td><?php echo $sw['jenis_kelamin']?></td>
                                <td><?php echo $sw['alamat']?></td>
                            </tr>
                            <?php
                            $no++;
                        }
                            ?>
                            
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->