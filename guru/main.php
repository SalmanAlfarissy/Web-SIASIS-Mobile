<?php
$page=isset($_GET['page']) ? $_GET['page'] : 'home';
if ($page=='home') include 'dashboard.php';
if ($page=='raport') include 'raport.php';
if ($page=='siswa') include 'data_siswa.php';
