<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Web Siasis Mobile</title>

        <!-- Bootstrap Core CSS -->
        <link href="../scss/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="../scss/metisMenu.min.css" rel="stylesheet">

        <!-- DataTables CSS -->
        <link href="../css/dataTables/dataTables.bootstrap.css" rel="stylesheet">

        <!-- DataTables Responsive CSS -->
        <link href="../css/dataTables/dataTables.responsive.css" rel="stylesheet">

        <!-- Timeline CSS -->
        <link href="../scss/timeline.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="../scss/startmin.css" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="../scss/morris.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="../scss/font-awesome.min.css" rel="stylesheet" type="text/css">

    </head>
    <body>

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">Administrator</a>
                </div>

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>


                <ul class="nav navbar-right navbar-top-links">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <?php 
                        include("../koneksi.php");
                        $query=mysqli_query($koneksi,"SELECT * FROM administrator WHERE id_adm=$_GET[id_adm]");
                        $data=mysqli_fetch_array($query);                        
                        ?>
                            <i class="fa fa-user fa-fw"></i> <?php echo $data['nama_ad']; ?> <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                            </li>
                            <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="../index.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- /.navbar-top-links -->

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li class="sidebar-search">
                                <div class="input-group custom-search-form">
                                    <input type="text" class="form-control" placeholder="Search...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fa fa-search"></i>
                                        </button>
                                </span>
                                </div>
                                <!-- /input-group -->
                            </li>
                            <li>
                                <a <?php if ($_GET["page"]=="home"){echo 'class="active"'; }?> href="?page=home&id_adm=<?php echo $_GET['id_adm']?>" ><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                            </li>

                            <li>
                                <a <?php if ($_GET["page"]=="administrator"){echo 'class="active"'; }?> href="?page=administrator&id_adm=<?php echo $_GET['id_adm']?>"><i class="fa fa-user-secret fa-fw"></i> Administrator </a>
                            </li>

                            <li>
                                <a <?php if ($_GET["page"]=="guru"){echo 'class="active"'; }?> href="?page=guru&id_adm=<?php echo $_GET['id_adm']?>"><i class="fa fa-user-md fa-fw"></i> Guru </a>
                            </li>

                            <li>
                                <a <?php if ($_GET["page"]=="siswa"){echo 'class="active"'; }?> href="?page=siswa&id_adm=<?php echo $_GET['id_adm']?>"><i class="fa fa-user fa-fw"></i> Siswa </a>
                            </li>

                            <li>
                                <a <?php if ($_GET["page"]=="profil"){echo 'class="active"'; }?> href="?page=profil&id_adm=<?php echo $_GET['id_adm']?>"><i class="fa fa-home fa-fw"></i> Profil Sekolah </a>
                            </li>

                            <li>
                                <a <?php if ($_GET["page"]=="jadwal"){echo 'class="active"'; }?> href="?page=jadwal&id_adm=<?php echo $_GET['id_adm']?>"><i class="fa fa-calendar-check-o fa-fw"></i> Jadwal Siswa </a>
                            </li>

                            <li>
                                <a <?php if ($_GET["page"]=="event"){echo 'class="active"'; }?> href="?page=event&id_adm=<?php echo $_GET['id_adm']?>"><i class="fa fa-calendar fa-fw"></i> Event </a>
                            </li>

                            <li>
                                <a <?php if ($_GET["page"]=="data_spp"){echo 'class="active"'; }?> href="?page=data_spp&id_adm=<?php echo $_GET['id_adm']?>"><i class="fa fa-calculator fa-fw"></i> Data Pembayaran SPP </a>
                            </li>

                            <li>
                                <a <?php if ($_GET["page"]=="alumni"){echo 'class="active"'; }?> href="?page=alumni&id_adm=<?php echo $_GET['id_adm']?>"><i class="fa fa-users fa-fw"></i> Data Alumni </a>
                            </li>



                        </ul>
                    </div>
                </div>
            </nav>

            <div id="page-wrapper">
                <div class="container-fluid">
                    <!-- /.row -->
                    <!-- kontent -->
                    <?php
include_once "main.php";
?>

                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="../js/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="../js/metisMenu.min.js"></script>

        <!-- DataTables JavaScript -->
        <script src="../js/dataTables/jquery.dataTables.min.js"></script>
        <script src="../js/dataTables/dataTables.bootstrap.min.js"></script>

        <!-- Morris Charts JavaScript -->
        <script src="../js/raphael.min.js"></script>
        <script src="../js/morris.min.js"></script>
        <script src="../js/morris-data.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="../js/startmin.js"></script>

        <!-- Page-Level Demo Scripts - Tables - Use for reference -->
        <script>
            $(document).ready(function() {
                $('#dataTables-example').DataTable({
                        responsive: true
                });
            });
        </script>

    </body>
</html>
