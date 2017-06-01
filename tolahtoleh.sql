-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Inang: 127.0.0.1
-- Waktu pembuatan: 01 Jun 2017 pada 07.39
-- Versi Server: 5.5.27
-- Versi PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `tolahtoleh`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `idAdmin` int(10) NOT NULL AUTO_INCREMENT,
  `namaAdmin` varchar(25) NOT NULL,
  `passwordAdmin` varchar(25) NOT NULL,
  `level` enum('Superadmin','Admin') NOT NULL,
  `emailAdmin` varchar(40) NOT NULL,
  `jkAdmin` varchar(1) NOT NULL,
  `alamatAdmin` varchar(40) NOT NULL,
  `telpAdmin` varchar(12) NOT NULL,
  PRIMARY KEY (`idAdmin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`idAdmin`, `namaAdmin`, `passwordAdmin`, `level`, `emailAdmin`, `jkAdmin`, `alamatAdmin`, `telpAdmin`) VALUES
(1, 'jhon', '12345', 'Superadmin', 'jhon@yahoo.com', 'L', 'probolinggo', '081330373456'),
(2, 'lindri', '12345', 'Superadmin', 'lindri@yahoo.com', 'P', 'bondowoso', '081336234231'),
(3, 'rayhan', '12345', 'Superadmin', 'rayhan@yahoo.com', 'L', 'jember', '081330373452'),
(4, 'iim', '12345', 'Superadmin', 'iim@yahoo.com', 'P', 'jember', '081336236234'),
(5, 'dyah', '12345', 'Superadmin', 'dyah@yahoo.com', 'P', 'situbondo', '081330356754'),
(6, 'faiz', '12345', 'Superadmin', 'faiz@yahoo.com', 'L', 'banyuwangi', '081330373296'),
(7, 'admin', 'admin', 'Admin', 'admin@gmail.com', 'P', 'Jember', '0899999999'),
(9, 'ita', '12345', 'Admin', 'ita@gmail.com', 'P', 'Jember', '087654321345');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `idBarang` int(10) NOT NULL AUTO_INCREMENT,
  `fotoBarang` varchar(60) NOT NULL,
  `deskripsi` varchar(50) NOT NULL,
  `namaBarang` varchar(40) NOT NULL,
  `kategoriBarang` varchar(10) NOT NULL,
  `hargaBarang` varchar(9) NOT NULL,
  `stokBarang` varchar(3) NOT NULL,
  PRIMARY KEY (`idBarang`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`idBarang`, `fotoBarang`, `deskripsi`, `namaBarang`, `kategoriBarang`, `hargaBarang`, `stokBarang`) VALUES
(1, 'index.jpg', 'Terdiri dari berbagai macam rasa dan varian', 'Dodol Garut', 'Makanan', '18000', '20'),
(3, '', 'Suwar suwir enak', 'suwar-suwir balado', 'Makanan', '20000', '12'),
(4, '', 'bakiak manis', 'bakiak', 'Makanan', '21000', '22'),
(5, '', 'Kue lapis khas jawa', 'lapis kering', 'Makanan', '10000', '33'),
(6, '', 'Susu sapi asli Jember', 'susu segar sumbersari', 'Minuman', '8000', '15'),
(7, '', 'Kopi', 'wedang cor instan', 'Minuman', '5000', '30'),
(8, '', 'Kedelai Bubuk', 'serbuk kedelai hitam', 'Minuman', '7500', '25'),
(9, '', 'kripik pisang murah dan isi banyak', 'kripik pisang', 'Makanan', '5000', '25'),
(10, '', 'Edamame asli dari Mitra Tani jember', 'Edamame', 'Makanan', '15000', '40'),
(11, '', 'Kue Tart Murah', 'Tart Wedding', 'Makanan', '1000000', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `idMember` int(11) NOT NULL,
  `emailMember` varchar(40) NOT NULL,
  `passwordMember` varchar(40) NOT NULL,
  `namaMember` varchar(40) NOT NULL,
  `jkMember` char(1) NOT NULL,
  `alamatMember` varchar(40) NOT NULL,
  `kotaMember` varchar(40) NOT NULL,
  `telpMember` varchar(12) NOT NULL,
  PRIMARY KEY (`idMember`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `member`
--

INSERT INTO `member` (`idMember`, `emailMember`, `passwordMember`, `namaMember`, `jkMember`, `alamatMember`, `kotaMember`, `telpMember`) VALUES
(1, 'han@gmail.com', '123', 'han', 'l', 'jalan buntu 69', 'jember', '0331'),
(2, 'dyah@mail.com', 'dj6', 'Dyah Ayu Dj', 'p', 'Perum Mastrip', 'Jember', '082828282282'),
(3, 'imroatul@mail.com', '12345', 'Imroatul Bieber', 'p', 'Jalan Kenangan Mantan', 'Banyumas', '08923282728'),
(4, 'nico@mail.com', 'nico', 'Nico Robin', 'l', 'Jalan Panjang menuju Hatimu', 'Probolinggo', '0838218723'),
(5, 'faiz@mail.com', '1234', 'Faiz the Hot Muscle', 'l', 'Pinggir Jalan', 'Banyuwangai', '0333333333'),
(6, 'lindri@mail.com', '123', 'Lindrinillah', 'p', 'Jalan terus kapan jadian', 'BWS', '087487847');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
