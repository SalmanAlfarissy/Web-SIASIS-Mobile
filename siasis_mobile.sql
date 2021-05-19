-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Bulan Mei 2021 pada 19.24
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siasis_mobile`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `administrator`
--

CREATE TABLE `administrator` (
  `id_adm` int(50) NOT NULL,
  `nip_ad` varchar(100) NOT NULL,
  `nama_ad` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `administrator`
--

INSERT INTO `administrator` (`id_adm`, `nip_ad`, `nama_ad`, `email`, `password`) VALUES
(1, '18110820271990', 'Salman Alfarissy', 'alfarissy.scorpio@gmail.com', 'e807f1fcf82d132f9bb018ca6738a19f'),
(2, '18110820230999', 'Vira mistika', 'vira.mistika@gmail.com', 'e807f1fcf82d132f9bb018ca6738a19f'),
(3, '18110810062000', 'Novita Aulia', 'novita.aulia@gmail.com', 'e807f1fcf82d132f9bb018ca6738a19f'),
(4, '18110820240999', 'Afrizal Fauzi', 'afrizal.fauzi@gmail.com', 'e807f1fcf82d132f9bb018ca6738a19f'),
(5, '18110820191999', 'Indah Wahyu Andilah', 'indah.wahyu@gmail.com', 'e807f1fcf82d132f9bb018ca6738a19f');

-- --------------------------------------------------------

--
-- Struktur dari tabel `alumni`
--

CREATE TABLE `alumni` (
  `id_alumni` int(50) NOT NULL,
  `id_adm` int(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `angkatan` varchar(50) NOT NULL,
  `pekerjaan` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `id_guru` int(50) NOT NULL,
  `id_adm` int(50) NOT NULL,
  `nip_guru` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_guru` varchar(100) NOT NULL,
  `email_guru` varchar(100) NOT NULL,
  `no_telp` varchar(100) NOT NULL,
  `jabatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`id_guru`, `id_adm`, `nip_guru`, `password`, `nama_guru`, `email_guru`, `no_telp`, `jabatan`) VALUES
(1, 1, '18110820271999', 'e807f1fcf82d132f9bb018ca6738a19f', 'Salman Alfarissy', 'alfarissy.scorpio@gmail.com', '082285032741', 'Wali Kelas X.1'),
(2, 1, '18110810062000', 'e807f1fcf82d132f9bb018ca6738a19f', 'Novita Aulia', 'novi@gmail.com', '082285000190', 'Wali Kelas X.2'),
(3, 3, '18110820231999', 'e807f1fcf82d132f9bb018ca6738a19f', 'Vira Mistika', 'vira@gmail.com', '082234567890', 'Wali Kelas x.3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `informasi`
--

CREATE TABLE `informasi` (
  `id_info` int(50) NOT NULL,
  `id_adm` int(50) NOT NULL,
  `nama_event` varchar(50) NOT NULL,
  `gambar_event` text NOT NULL,
  `tgl_post` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `kelas` varchar(50) NOT NULL,
  `jadwal` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`kelas`, `jadwal`) VALUES
('X.1', ''),
('X.2', ''),
('X.3', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pem` int(50) NOT NULL,
  `id_adm` int(50) NOT NULL,
  `nis` varchar(50) NOT NULL,
  `semester` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rapor`
--

CREATE TABLE `rapor` (
  `id_rapor` int(100) NOT NULL,
  `id_siswa` int(100) NOT NULL,
  `id_guru` int(100) NOT NULL,
  `rapor` text NOT NULL,
  `semester` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(50) NOT NULL,
  `id_guru` int(50) NOT NULL,
  `id_adm` int(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nisn` varchar(50) NOT NULL,
  `nis` varchar(100) NOT NULL,
  `nama_sis` varchar(100) NOT NULL,
  `foto_sis` text NOT NULL,
  `ttl` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `status_keluarga` varchar(50) NOT NULL,
  `anak_ke` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `kelas` varchar(40) NOT NULL,
  `tahun_diterima` varchar(25) NOT NULL,
  `semester_diterima` varchar(40) NOT NULL,
  `nama_sekolah_asal` text NOT NULL,
  `alamat_sekolah_asal` text NOT NULL,
  `tahun_ijazah_sebelumnya` varchar(20) NOT NULL,
  `nomor_ijazah_sebelumnya` varchar(20) NOT NULL,
  `tahun_skhun_sebelumya` varchar(20) NOT NULL,
  `nomor_skhun_sebelumnya` varchar(20) NOT NULL,
  `nama_ayah` varchar(100) NOT NULL,
  `nama_ibu` varchar(100) NOT NULL,
  `alamat_ortu` text NOT NULL,
  `pekerjaan_ayah` varchar(100) NOT NULL,
  `pekerjaan_ibu` varchar(100) NOT NULL,
  `nama_wali` varchar(100) NOT NULL,
  `alamat_wali` text NOT NULL,
  `no_hp_wali` varchar(20) NOT NULL,
  `pekerjaan_wali` varchar(100) NOT NULL,
  `cover` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `id_guru`, `id_adm`, `password`, `nisn`, `nis`, `nama_sis`, `foto_sis`, `ttl`, `jenis_kelamin`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `no_hp`, `kelas`, `tahun_diterima`, `semester_diterima`, `nama_sekolah_asal`, `alamat_sekolah_asal`, `tahun_ijazah_sebelumnya`, `nomor_ijazah_sebelumnya`, `tahun_skhun_sebelumya`, `nomor_skhun_sebelumnya`, `nama_ayah`, `nama_ibu`, `alamat_ortu`, `pekerjaan_ayah`, `pekerjaan_ibu`, `nama_wali`, `alamat_wali`, `no_hp_wali`, `pekerjaan_wali`, `cover`) VALUES
(1, 1, 1, 'e807f1fcf82d132f9bb018ca6738a19f', '9996054913', '13542', 'Salman Alfarissy', '', '', 'L', '', 'Anak Kandung', '', '', '', 'X.1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(2, 1, 1, 'e807f1fcf82d132f9bb018ca6738a19f', '9996054922', '12354', 'novita Aulia', '', '', 'L', '', 'Anak Kandung', '', '', '', 'X.1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(3, 2, 1, 'e807f1fcf82d132f9bb018ca6738a19f', '9996054999', '14236', 'Afrizal Fauzi', '', '', 'L', '', 'Anak Kandung', '', '', '', 'X.2', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(4, 2, 1, 'e807f1fcf82d132f9bb018ca6738a19f', '9996054920', '12569', 'Vira Mistika', '', '', 'L', '', 'Anak Kandung', '', '', '', 'X.2', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(5, 3, 1, 'e807f1fcf82d132f9bb018ca6738a19f', '9996054900', '13457', 'Indah Wahyu Andilah', '', '', 'L', '', 'Anak Kandung', '', '', '', 'X.3', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`id_adm`);

--
-- Indeks untuk tabel `alumni`
--
ALTER TABLE `alumni`
  ADD PRIMARY KEY (`id_alumni`),
  ADD KEY `id_adm` (`id_adm`);

--
-- Indeks untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`),
  ADD KEY `id_adm` (`id_adm`);

--
-- Indeks untuk tabel `informasi`
--
ALTER TABLE `informasi`
  ADD PRIMARY KEY (`id_info`),
  ADD KEY `id_adm` (`id_adm`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`kelas`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pem`),
  ADD KEY `id_adm` (`id_adm`);

--
-- Indeks untuk tabel `rapor`
--
ALTER TABLE `rapor`
  ADD PRIMARY KEY (`id_rapor`),
  ADD KEY `id_siswa` (`id_siswa`),
  ADD KEY `id_guru` (`id_guru`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD KEY `id_adm` (`id_adm`),
  ADD KEY `id_guru` (`id_guru`),
  ADD KEY `kelas` (`kelas`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `alumni`
--
ALTER TABLE `alumni`
  MODIFY `id_alumni` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pem` int(50) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `alumni`
--
ALTER TABLE `alumni`
  ADD CONSTRAINT `alumni_ibfk_1` FOREIGN KEY (`id_adm`) REFERENCES `administrator` (`id_adm`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD CONSTRAINT `guru_ibfk_1` FOREIGN KEY (`id_adm`) REFERENCES `administrator` (`id_adm`);

--
-- Ketidakleluasaan untuk tabel `informasi`
--
ALTER TABLE `informasi`
  ADD CONSTRAINT `informasi_ibfk_1` FOREIGN KEY (`id_adm`) REFERENCES `administrator` (`id_adm`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_adm`) REFERENCES `administrator` (`id_adm`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `rapor`
--
ALTER TABLE `rapor`
  ADD CONSTRAINT `rapor_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`),
  ADD CONSTRAINT `rapor_ibfk_2` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`id_guru`);

--
-- Ketidakleluasaan untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`id_adm`) REFERENCES `administrator` (`id_adm`),
  ADD CONSTRAINT `siswa_ibfk_2` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`id_guru`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `siswa_ibfk_3` FOREIGN KEY (`kelas`) REFERENCES `kelas` (`kelas`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
