-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Bulan Mei 2021 pada 10.19
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
(1, '18110820271999', 'Salman Alfarissy', 'alfarissy.scorpio@gmail.com', 'e807f1fcf82d132f9bb018ca6738a19f');

-- --------------------------------------------------------

--
-- Struktur dari tabel `adm_pembayaran`
--

CREATE TABLE `adm_pembayaran` (
  `id_adm_pem` int(50) NOT NULL,
  `id_pem` int(50) NOT NULL,
  `id_adm` int(50) NOT NULL
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
  `no_telp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`id_guru`, `id_adm`, `nip_guru`, `password`, `nama_guru`, `no_telp`) VALUES
(1, 1, '18110820272699', 'e807f1fcf82d132f9bb018ca6738a19f', 'Salman Alfarissy', '082285032741');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hubungan`
--

CREATE TABLE `hubungan` (
  `id_hub` int(50) NOT NULL,
  `id_info` int(50) NOT NULL,
  `id_adm` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `informasi`
--

CREATE TABLE `informasi` (
  `id_info` int(50) NOT NULL,
  `nama_event` varchar(50) NOT NULL,
  `gambar_event` text NOT NULL,
  `tgl_post` date NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(50) NOT NULL,
  `id_guru` int(50) NOT NULL,
  `nip_guru` varchar(50) NOT NULL,
  `jabatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pem` int(50) NOT NULL,
  `nis` varchar(50) NOT NULL,
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
  `ttl` date NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `agama` varchar(20) NOT NULL,
  `status_keluarga` enum('Anak Kandung','Anak Tiri') NOT NULL,
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
(1, 1, 1, 'e807f1fcf82d132f9bb018ca6738a19f', '9996054913', '3534', 'Salman Alfarissy', '', '1999-10-26', 'L', 'islam', 'Anak Kandung', '2', 'Kampuang Tanjuang,Nagari Kampuang Tanjuang Koto Mambang Sungai Durian,Kec.Patamuan,Kab.Padang Pariaman,Prov.Sumatera Barat', '082285032741', 'X.1', '2016', 'Semester 1', 'Smp N 1 Patamuan', 'Kabun Pondok Duo', '2016', '123456', '2016', '12344567', 'Abdul kosasi', 'Murlena Dewi', 'Kampuang Tanjuang', 'Buruh harian Lepas', 'IRT', '', '', '', '', ''),
(2, 1, 1, 'e807f1fcf82d132f9bb018ca6738a19f', '9996054912', '123454', 'Vira Mistika', '', '1999-09-09', 'P', 'islam', 'Anak Kandung', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`id_adm`);

--
-- Indeks untuk tabel `adm_pembayaran`
--
ALTER TABLE `adm_pembayaran`
  ADD PRIMARY KEY (`id_adm_pem`),
  ADD KEY `id_pem` (`id_pem`),
  ADD KEY `id_adm` (`id_adm`);

--
-- Indeks untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`),
  ADD KEY `id_adm` (`id_adm`);

--
-- Indeks untuk tabel `hubungan`
--
ALTER TABLE `hubungan`
  ADD PRIMARY KEY (`id_hub`),
  ADD KEY `id_info` (`id_info`,`id_adm`),
  ADD KEY `id_adm` (`id_adm`);

--
-- Indeks untuk tabel `informasi`
--
ALTER TABLE `informasi`
  ADD PRIMARY KEY (`id_info`);

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`),
  ADD KEY `id_guru` (`id_guru`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pem`);

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
  ADD KEY `id_guru` (`id_guru`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `adm_pembayaran`
--
ALTER TABLE `adm_pembayaran`
  ADD CONSTRAINT `adm_pembayaran_ibfk_1` FOREIGN KEY (`id_adm_pem`) REFERENCES `administrator` (`id_adm`),
  ADD CONSTRAINT `adm_pembayaran_ibfk_2` FOREIGN KEY (`id_pem`) REFERENCES `pembayaran` (`id_pem`),
  ADD CONSTRAINT `adm_pembayaran_ibfk_3` FOREIGN KEY (`id_adm`) REFERENCES `administrator` (`id_adm`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD CONSTRAINT `guru_ibfk_1` FOREIGN KEY (`id_adm`) REFERENCES `administrator` (`id_adm`);

--
-- Ketidakleluasaan untuk tabel `hubungan`
--
ALTER TABLE `hubungan`
  ADD CONSTRAINT `hubungan_ibfk_1` FOREIGN KEY (`id_adm`) REFERENCES `administrator` (`id_adm`);

--
-- Ketidakleluasaan untuk tabel `informasi`
--
ALTER TABLE `informasi`
  ADD CONSTRAINT `informasi_ibfk_1` FOREIGN KEY (`id_info`) REFERENCES `hubungan` (`id_info`);

--
-- Ketidakleluasaan untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD CONSTRAINT `jabatan_ibfk_1` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`id_guru`);

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
  ADD CONSTRAINT `siswa_ibfk_2` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`id_guru`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
