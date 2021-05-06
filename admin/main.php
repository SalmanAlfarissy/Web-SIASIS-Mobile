<?php
$page=isset($_GET['page']) ? $_GET['page'] : 'home';
if ($page=='home') include 'dashboard.php';
if ($page=='administrator') include 'adm.php';
if ($page=='siswa') include 'data_siswa.php';