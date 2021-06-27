<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Data Pembayaran SPP</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>

<?php
include "../koneksi.php";
$aksi = isset($_GET['aksi']) ? $_GET['aksi'] : 'list';
switch ($aksi) {
    case 'list';
        ?>
<div>
    <a href=?page=data_spp&aksi=entri&id_adm=<?php echo $_GET['id_adm'] ?> class="btn btn-primary fa fa-plus"> Entri Data Pembayaran SPP</a>
</div>
<br/>

<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
            Data Pembayaran SPP
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIS</th>
                                <th>Semester</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <?php
$no = 1;
        $tampil = mysqli_query($koneksi, "SELECT * FROM pembayaran order by id_pem ASC");
        while ($data = mysqli_fetch_array($tampil)) {

            ?>

                        <tbody>
                            <!-- isi tabel -->
                            <tr class="odd gradeX">
                                <td><?php echo $no ?></td>
                                <td><?php echo $data['nis'] ?></td>
                                <td><?php echo $data['semester'] ?></td>
                                <td><?php echo $data['status'] ?></td>
                                <td><a href=?page=data_spp&aksi=edit&id_adm=<?php echo $_GET['id_adm'] ?>&id_pem=<?php echo $data['id_pem']; ?> class="btn btn-success btn-sm fa fa-pencil"> Edit</a>
			                        <a href="aksi_data_spp.php?page=data_spp&id_adm=<?php echo $_GET['id_adm'] ?>&proses=hapus&id_pem=<?php echo $data['id_pem']; ?>"
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

    case 'entri';

        ?>
                    <a href=?page=data_spp&aksi=list&id_adm=<?php echo $_GET['id_adm'] ?> class="btn btn-danger fa fa-table"> Data Pembayaran SPP </a>
                    <h2>Entri New Data</h2>

                    <form role="form" method="post" enctype="multipart/form-data" action="aksi_data_spp.php?page=data_spp&proses=input">

                        <div class="form-group">
                            <label>NIS</label>
                            <select name="nis" class="form-control">
                            <?php
$ambil = mysqli_query($koneksi, "SELECT id_siswa,nis FROM siswa order by id_siswa ASC");
        while ($data = mysqli_fetch_array($ambil)) {
            echo "<option value='$data[nis]'>$data[nis]</option>";
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
                            <label>Status</label>
                            <select name="status" class="form-control">
                                <option value='Lunas'>Lunas</option>
                                <option value='Belum Bayar'>Belum Bayar</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary fa fa-floppy-o"> Simpan</button>
                        <button type="reset" class="btn btn-default">Reset</button>
                        <br></br>

                    </form>
                    <?php
break;
    case 'edit':
        $query = mysqli_query($koneksi, "SELECT * FROM pembayaran WHERE id_pem=$_GET[id_pem]");
        $p = mysqli_fetch_array($query);
        ?>
                    <a href=?page=data_spp&aksi=list&id_adm=<?php echo $_GET['id_adm'] ?> class="btn btn-danger fa fa-table"> Data Pembayaran SPP</a>
                    <h2>Edit Data</h2>

                    <form role="form" method="post" enctype="multipart/form-data" action="aksi_data_spp.php?page=data_spp&proses=update">

                        <div class="form-group">
                            <label>NIS</label>
                            <select name="nis" class="form-control">
                            <?php
$ambil = mysqli_query($koneksi, "SELECT id_siswa,nis FROM siswa order by id_siswa ASC");
        while ($data = mysqli_fetch_array($ambil)) {
            $select = ($p['nis'] == $data['nis']) ? 'selected' : '';
            echo "<option value='$data[nis]' $select >$data[nis]</option>";
        }
        ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Semester</label>
                            <select name="semester" class="form-control">
                            <?php
$ambil = mysqli_query($koneksi, "SELECT id_siswa,nis FROM siswa order by id_siswa ASC");
        while ($data = mysqli_fetch_array($ambil)) {
            $select = ($p['nis'] == $data['nis']) ? 'selected' : '';
            echo "<option value='$p[semester]' $select>$p[semester]</option>";

        }
        echo "<option value='Semester 1' >Semester 1</option>";
        echo "<option value='Semester 2' >Semester 2</option>";
        echo "<option value='Semester 3' >Semester 3</option>";
        echo "<option value='Semester 4' >Semester 4</option>";
        echo "<option value='Semester 5' >Semester 5</option>";
        echo "<option value='Semester 6' >Semester 6</option>";
        ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Status</label>
                            <select name="status" class="form-control">
                            <?php
$ambil = mysqli_query($koneksi, "SELECT id_siswa,nis FROM siswa order by id_siswa ASC");
        while ($data = mysqli_fetch_array($ambil)) {
            $select = ($p['nis'] == $data['nis']) ? 'selected' : '';
            echo "<option value='$p[status]' $select>$p[status]</option>";

        }
        echo "<option value='Lunas' >Lunas</option>";
        echo "<option value='Belum Bayar' >Belum Bayar</option>";
        ?>
                            </select>
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