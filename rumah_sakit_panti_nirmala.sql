-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Jul 2023 pada 09.53
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rumah_sakit_panti_nirmala`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokter`
--

CREATE TABLE `dokter` (
  `ID_DOKTER` int(255) NOT NULL,
  `ID_PENGGUNA` int(255) NOT NULL,
  `NOMOR_IZIN_PRAKTIK` varchar(255) NOT NULL,
  `TANGGAL_KADALUARSA_IZIN_PRAKTIK` date NOT NULL,
  `NAMA` varchar(255) NOT NULL,
  `JENIS_KELAMIN` varchar(255) NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `SPESIALISASI` varchar(255) NOT NULL,
  `GAJI` varchar(255) NOT NULL,
  `STATUS` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dokter`
--

INSERT INTO `dokter` (`ID_DOKTER`, `ID_PENGGUNA`, `NOMOR_IZIN_PRAKTIK`, `TANGGAL_KADALUARSA_IZIN_PRAKTIK`, `NAMA`, `JENIS_KELAMIN`, `EMAIL`, `SPESIALISASI`, `GAJI`, `STATUS`, `created_at`, `updated_at`) VALUES
(55108304, 1662543377, '2253', '2023-11-16', 'Enrico Puci', 'Laki-Laki', 'dkenrico@dokter.com', 'Organ Dalam', '25.000.000', 'Aktif', NULL, NULL),
(1454239525, 1662543377, '2113', '2023-11-10', 'Abdul Sugeng', 'Laki-Laki', 'dksugeng@dokter.com', 'Gigi', '20.000.000', 'Aktif', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_kamar`
--

CREATE TABLE `jenis_kamar` (
  `ID_JKAMAR` int(255) NOT NULL,
  `NAMA_KAMAR` varchar(255) NOT NULL,
  `FASILITAS` varchar(255) NOT NULL,
  `HARGA` varchar(255) NOT NULL,
  `KETERSEDIAN` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenis_kamar`
--

INSERT INTO `jenis_kamar` (`ID_JKAMAR`, `NAMA_KAMAR`, `FASILITAS`, `HARGA`, `KETERSEDIAN`) VALUES
(584913407, 'Superior Room', 'Tv, Meja, Toilet dalam, 2 Tempat tidur, AC', '2500000', '4'),
(616163204, 'Deluxe Room', 'Tv, AC, 2 Tempat tidur, Meja. Toilet Dalam, Ruang tamu dalam', '5000000', '2'),
(1601479998, 'Standard Room', 'Tv, Ac, 1 Kasur Pasien, Meja', '1000000', '3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_perawatan`
--

CREATE TABLE `jenis_perawatan` (
  `ID_JPERAWATAN` int(255) NOT NULL,
  `NAMA_PERAWATAN` varchar(255) NOT NULL,
  `DESKRIPSI` varchar(255) NOT NULL,
  `KATEGORI` varchar(255) NOT NULL,
  `DURASI` varchar(255) NOT NULL,
  `BIAYA` varchar(255) NOT NULL,
  `PERSYARATAN` varchar(255) NOT NULL,
  `KONTRAINDIKASI` varchar(255) NOT NULL,
  `DOKTER` varchar(255) NOT NULL,
  `JUMLAH_PASIEN` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenis_perawatan`
--

INSERT INTO `jenis_perawatan` (`ID_JPERAWATAN`, `NAMA_PERAWATAN`, `DESKRIPSI`, `KATEGORI`, `DURASI`, `BIAYA`, `PERSYARATAN`, `KONTRAINDIKASI`, `DOKTER`, `JUMLAH_PASIEN`) VALUES
(346785268, 'Rawat Jalan', 'melakukan pengecekan sesuai perjanjian yang telah dibuat. Setelah diperiksa, dokter akan memberikan Anda resep obat dan atau menganjurkan beberapa hal tertentu', 'Out-patient', '30menit-1jam', '200000', 'Membawa Data Diri', '-', 'Enrico Puci', '50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kamar`
--

CREATE TABLE `kamar` (
  `ID_KAMAR` int(255) NOT NULL,
  `ID_JKAMAR` int(255) NOT NULL,
  `NAMA_KAMAR` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kamar`
--

INSERT INTO `kamar` (`ID_KAMAR`, `ID_JKAMAR`, `NAMA_KAMAR`) VALUES
(145630201, 616163204, 'DejaVu'),
(642035047, 584913407, 'Nu Me Ro'),
(1793708845, 1601479998, 'Melati');

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat`
--

CREATE TABLE `obat` (
  `ID_OBAT` int(255) NOT NULL,
  `NAMA_OBAT` varchar(255) NOT NULL,
  `KATEGORI` varchar(255) NOT NULL,
  `DESKRIPSI` varchar(255) NOT NULL,
  `BENTUK_OBAT` varchar(255) NOT NULL,
  `DOSIS` varchar(255) NOT NULL,
  `CARA_PEMAKAIAN` varchar(255) NOT NULL,
  `KOMPOSISI` varchar(255) NOT NULL,
  `TANGGAL_KADALUARSA` varchar(255) NOT NULL,
  `HARGA` varchar(255) NOT NULL,
  `JUMLAH_STOK` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `obat`
--

INSERT INTO `obat` (`ID_OBAT`, `NAMA_OBAT`, `KATEGORI`, `DESKRIPSI`, `BENTUK_OBAT`, `DOSIS`, `CARA_PEMAKAIAN`, `KOMPOSISI`, `TANGGAL_KADALUARSA`, `HARGA`, `JUMLAH_STOK`) VALUES
(403855457, 'Forumen', 'Sesuai Petunjuk Dokter', 'FORUMEN EAR DROP 10 ML mengandung Natrium Docusate yang merupakan obat yang digunakan untuk membantu menyingkirkan serumen atau kotoran telinga.', 'Obat tetes', 'PENGGUNAAN OBAT INI HARUS SESUAI DENGAN PETUNJUK DOKTER. Teteskan secukupnya pada telinga yang mau dibersihkan 1 x sehari pada malam hari, tidak boleh digunakan lebih dari 2 malam berturut-turut', 'Diteteskan pada telinga', 'Per mL : Docusate Na 5 mg', '2024-01-25', '30000', '20'),
(1345919653, 'Ponstan', 'NSAID', 'Ponstan adalah obat yang mengandung Asam Mefenamat digunakan sebagai pereda nyeri, dismenore, nyeri ringan khususnya ketika pasien juga mengalami peradangan, dan mengurangi gangguan inflamasi (peradangan) secara umum', 'Tablet', '500 mg', '500 mg, 3 kali sehari', '500 mg asam mefenamat', '2023-12-14', '25000', '30'),
(2004835176, 'Paracetamol', 'obat bebas', 'obat untuk meredakan demam dan nyeri ringan hingga sedang, misalnya sakit kepala, nyeri haid, atau pegal-pegal', 'Kaplet/Tablet', '500 miligram', 'Orang dewasa dapat mengonsumsi 1 atau 2 tablet 500 miligram paracetamol setiap 4-6 jam', 'Paracetamol 500miligram/kaplet', '2024-01-04', '20000', '40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE `pasien` (
  `ID_PASIEN` int(255) NOT NULL,
  `ID_DOKTER` int(255) NOT NULL,
  `ID_KAMAR` int(255) NOT NULL,
  `NAMA` varchar(255) NOT NULL,
  `ALAMAT` varchar(255) NOT NULL,
  `TANGGAL_LAHIR` varchar(255) NOT NULL,
  `JENIS_KELAMIN` varchar(255) NOT NULL,
  `UMUR` varchar(255) NOT NULL,
  `NOMOR_TELEPON` varchar(255) NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `RIWAYAT_PENYAKIT` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pasien`
--

INSERT INTO `pasien` (`ID_PASIEN`, `ID_DOKTER`, `ID_KAMAR`, `NAMA`, `ALAMAT`, `TANGGAL_LAHIR`, `JENIS_KELAMIN`, `UMUR`, `NOMOR_TELEPON`, `EMAIL`, `RIWAYAT_PENYAKIT`) VALUES
(770870926, 1454239525, 642035047, 'Rojak kholak', 'Kepanjen', '2004-04-04', 'Perempuan', '19', '084235495842', 'Rojak@pasien.com', 'Gigi nyeri'),
(1684102239, 1454239525, 145630201, 'Ahmed Kevin', 'Blimbing', '2003-03-05', 'Laki-Laki', '20', '085524125243', 'Kevin@pasien.com', 'Telinga nyeri'),
(1777651549, 55108304, 642035047, 'Faruq Mucelo', 'Singosari', '2003-05-04', 'Laki-Laki', '20', '084234568354', 'Faruq@pasien.com', 'Pusing dan Demam');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `ID_PEGAWAI` int(255) NOT NULL,
  `ID_PENGGUNA` int(255) NOT NULL,
  `NAMA` varchar(255) NOT NULL,
  `ALAMAT` varchar(255) NOT NULL,
  `JENIS_KELAMIN` varchar(255) NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `NOMOR_TELEPON` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`ID_PEGAWAI`, `ID_PENGGUNA`, `NAMA`, `ALAMAT`, `JENIS_KELAMIN`, `EMAIL`, `NOMOR_TELEPON`) VALUES
(520052, 436885677, 'Juleha', 'Pasar Blimbing', 'Perempuan', 'juleha@pegawai.com', '085312953839');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `ID_PEMBAYARAN` int(255) NOT NULL,
  `ID_PASIEN` int(255) NOT NULL,
  `ID_DOKTER` int(255) NOT NULL,
  `ID_TKESEHATAN` int(255) NOT NULL,
  `ID_JPERAWATAN` int(255) NOT NULL,
  `ID_PEMERIKSAAN` int(255) NOT NULL,
  `ID_OBAT` int(255) NOT NULL,
  `ID_KAMAR` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`ID_PEMBAYARAN`, `ID_PASIEN`, `ID_DOKTER`, `ID_TKESEHATAN`, `ID_JPERAWATAN`, `ID_PEMERIKSAAN`, `ID_OBAT`, `ID_KAMAR`) VALUES
(652556205, 1777651549, 55108304, 2141496512, 346785268, 537134235, 2004835176, 1793708845);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemeriksaan_dokter`
--

CREATE TABLE `pemeriksaan_dokter` (
  `ID_PEMERIKSAAN` int(255) NOT NULL,
  `ID_PASIEN` int(255) NOT NULL,
  `ID_DOKTER` int(255) NOT NULL,
  `TANGGAL` varchar(255) NOT NULL,
  `KELUHAN` varchar(255) NOT NULL,
  `HASIL_PEMERIKSAAN` varchar(255) NOT NULL,
  `RESEP_OBAT` varchar(255) NOT NULL,
  `BIAYA` varchar(255) NOT NULL,
  `JENIS_PEMERIKSAAN` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pemeriksaan_dokter`
--

INSERT INTO `pemeriksaan_dokter` (`ID_PEMERIKSAAN`, `ID_PASIEN`, `ID_DOKTER`, `TANGGAL`, `KELUHAN`, `HASIL_PEMERIKSAAN`, `RESEP_OBAT`, `BIAYA`, `JENIS_PEMERIKSAAN`) VALUES
(537134235, 1777651549, 55108304, '2023-06-05', 'Pusing dan demam', 'Imun lemah', 'Paracetamol', '200000', 'Rawat Jalan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `ID_PENGGUNA` int(255) NOT NULL,
  `NAMA` varchar(255) NOT NULL,
  `USERNAME` varchar(255) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `JABATAN` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`ID_PENGGUNA`, `NAMA`, `USERNAME`, `PASSWORD`, `JABATAN`) VALUES
(436885677, 'Pegawai', 'pg112', '123', 'Pegawai'),
(1660166996, 'Tenaga Kesehatan', 'Tk1122', '123', 'Tenaga Kesehatan'),
(1662543377, 'Dokter', 'DK123', '123', 'Dokter');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tenaga_kesehatan`
--

CREATE TABLE `tenaga_kesehatan` (
  `ID_TKESEHATAN` int(255) NOT NULL,
  `ID_PENGGUNA` int(255) NOT NULL,
  `NOMOR_IZIN_PRAKTIK` varchar(255) NOT NULL,
  `TANGGAL_KADALUARSA_IZIN_PRAKTIK` date NOT NULL,
  `NAMA` varchar(255) NOT NULL,
  `JENIS_KELAMIN` varchar(255) NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `SPESIALISASI` varchar(255) NOT NULL,
  `GAJI` varchar(255) NOT NULL,
  `STATUS` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tenaga_kesehatan`
--

INSERT INTO `tenaga_kesehatan` (`ID_TKESEHATAN`, `ID_PENGGUNA`, `NOMOR_IZIN_PRAKTIK`, `TANGGAL_KADALUARSA_IZIN_PRAKTIK`, `NAMA`, `JENIS_KELAMIN`, `EMAIL`, `SPESIALISASI`, `GAJI`, `STATUS`) VALUES
(2141496512, 1660166996, '2241', '2025-05-05', 'Jajang Genjang', 'Laki-Laki', 'jajang@tenkes.com', 'Organ', '200000', 'Aktif');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`ID_DOKTER`),
  ADD KEY `ID_PENGGUNA` (`ID_PENGGUNA`);

--
-- Indeks untuk tabel `jenis_kamar`
--
ALTER TABLE `jenis_kamar`
  ADD PRIMARY KEY (`ID_JKAMAR`);

--
-- Indeks untuk tabel `jenis_perawatan`
--
ALTER TABLE `jenis_perawatan`
  ADD PRIMARY KEY (`ID_JPERAWATAN`);

--
-- Indeks untuk tabel `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`ID_KAMAR`),
  ADD KEY `ID_JKAMAR` (`ID_JKAMAR`);

--
-- Indeks untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`ID_OBAT`);

--
-- Indeks untuk tabel `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`ID_PASIEN`),
  ADD KEY `ID_DOKTER` (`ID_DOKTER`),
  ADD KEY `ID_KAMAR` (`ID_KAMAR`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`ID_PEGAWAI`),
  ADD KEY `ID_PENGGUNA` (`ID_PENGGUNA`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`ID_PEMBAYARAN`),
  ADD KEY `ID_PASIEN` (`ID_PASIEN`),
  ADD KEY `ID_DOKTER` (`ID_DOKTER`),
  ADD KEY `ID_TKESEHATAN` (`ID_TKESEHATAN`),
  ADD KEY `ID_JPERAWATAN` (`ID_JPERAWATAN`),
  ADD KEY `ID_PEMERIKSAAN` (`ID_PEMERIKSAAN`),
  ADD KEY `ID_OBAT` (`ID_OBAT`),
  ADD KEY `ID_KAMAR` (`ID_KAMAR`);

--
-- Indeks untuk tabel `pemeriksaan_dokter`
--
ALTER TABLE `pemeriksaan_dokter`
  ADD PRIMARY KEY (`ID_PEMERIKSAAN`),
  ADD KEY `ID_PASIEN` (`ID_PASIEN`),
  ADD KEY `ID_DOKTER` (`ID_DOKTER`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`ID_PENGGUNA`);

--
-- Indeks untuk tabel `tenaga_kesehatan`
--
ALTER TABLE `tenaga_kesehatan`
  ADD PRIMARY KEY (`ID_TKESEHATAN`),
  ADD KEY `ID_PENGGUNA` (`ID_PENGGUNA`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `kamar`
--
ALTER TABLE `kamar`
  ADD CONSTRAINT `kamar_ibfk_1` FOREIGN KEY (`ID_JKAMAR`) REFERENCES `jenis_kamar` (`ID_JKAMAR`);

--
-- Ketidakleluasaan untuk tabel `pasien`
--
ALTER TABLE `pasien`
  ADD CONSTRAINT `pasien_ibfk_1` FOREIGN KEY (`ID_DOKTER`) REFERENCES `dokter` (`ID_DOKTER`);

--
-- Ketidakleluasaan untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `pegawai_ibfk_1` FOREIGN KEY (`ID_PENGGUNA`) REFERENCES `pengguna` (`ID_PENGGUNA`);

--
-- Ketidakleluasaan untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`ID_PASIEN`) REFERENCES `pasien` (`ID_PASIEN`),
  ADD CONSTRAINT `pembayaran_ibfk_2` FOREIGN KEY (`ID_DOKTER`) REFERENCES `dokter` (`ID_DOKTER`),
  ADD CONSTRAINT `pembayaran_ibfk_3` FOREIGN KEY (`ID_KAMAR`) REFERENCES `kamar` (`ID_KAMAR`),
  ADD CONSTRAINT `pembayaran_ibfk_4` FOREIGN KEY (`ID_TKESEHATAN`) REFERENCES `tenaga_kesehatan` (`ID_TKESEHATAN`),
  ADD CONSTRAINT `pembayaran_ibfk_5` FOREIGN KEY (`ID_PEMERIKSAAN`) REFERENCES `pemeriksaan_dokter` (`ID_PEMERIKSAAN`),
  ADD CONSTRAINT `pembayaran_ibfk_6` FOREIGN KEY (`ID_OBAT`) REFERENCES `obat` (`ID_OBAT`),
  ADD CONSTRAINT `pembayaran_ibfk_7` FOREIGN KEY (`ID_JPERAWATAN`) REFERENCES `jenis_perawatan` (`ID_JPERAWATAN`);

--
-- Ketidakleluasaan untuk tabel `pemeriksaan_dokter`
--
ALTER TABLE `pemeriksaan_dokter`
  ADD CONSTRAINT `pemeriksaan_dokter_ibfk_1` FOREIGN KEY (`ID_PASIEN`) REFERENCES `pasien` (`ID_PASIEN`),
  ADD CONSTRAINT `pemeriksaan_dokter_ibfk_2` FOREIGN KEY (`ID_DOKTER`) REFERENCES `dokter` (`ID_DOKTER`);

--
-- Ketidakleluasaan untuk tabel `tenaga_kesehatan`
--
ALTER TABLE `tenaga_kesehatan`
  ADD CONSTRAINT `tenaga_kesehatan_ibfk_1` FOREIGN KEY (`ID_PENGGUNA`) REFERENCES `pengguna` (`ID_PENGGUNA`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
