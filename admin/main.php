<?php
$page=isset($_GET['page']) ? $_GET['page'] : 'home';
if ($page=='home') include 'dashboard.php';
if ($page=='administrator') include 'administrator.php';
if ($page=='guru') include 'guru.php';
if ($page=='siswa') include 'siswa.php';
if ($page=='profil') include 'profil.php';
if ($page=='jadwal') include 'jadwal.php';
if ($page=='event') include 'event.php';
if ($page=='data_spp') include 'data_spp.php';
if ($page=='alumni') include 'alumni.php';