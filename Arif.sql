-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Waktu pembuatan: 22. Maret 2018 jam 19:45
-- Versi Server: 5.0.51
-- Versi PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `tbkereta`
-- 

-- --------------------------------------------------------

-- 
-- Struktur dari tabel `kelas`
-- 

CREATE TABLE `kelas` (
  `idKelas` int(3) NOT NULL auto_increment,
  `namaKelas` varchar(30) NOT NULL,
  `harga` int(12) NOT NULL,
  PRIMARY KEY  (`idKelas`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

-- 
-- Dumping data untuk tabel `kelas`
-- 

INSERT INTO `kelas` VALUES (2, 'Bisnis', 90000);
INSERT INTO `kelas` VALUES (3, 'Eksekutif', 100000);

-- --------------------------------------------------------

-- 
-- Struktur dari tabel `kelaspsw`
-- 

CREATE TABLE `kelaspsw` (
  `idKelas` int(3) NOT NULL auto_increment,
  `namaKelas` varchar(30) NOT NULL,
  `harga` int(12) NOT NULL,
  PRIMARY KEY  (`idKelas`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

-- 
-- Dumping data untuk tabel `kelaspsw`
-- 

INSERT INTO `kelaspsw` VALUES (3, 'Eksekutif', 100000);
INSERT INTO `kelaspsw` VALUES (4, 'Frist Class', 400000);
INSERT INTO `kelaspsw` VALUES (5, 'Economy', 3000000);
INSERT INTO `kelaspsw` VALUES (6, 'Business', 500000);
INSERT INTO `kelaspsw` VALUES (7, 'Premium Economy', 500000);

-- --------------------------------------------------------

-- 
-- Struktur dari tabel `kereta`
-- 

CREATE TABLE `kereta` (
  `idKA` int(3) NOT NULL auto_increment,
  `namaKA` varchar(30) NOT NULL,
  `tanggalBerangkat` date NOT NULL,
  `tanggalTiba` date NOT NULL,
  `jamBerangkat` varchar(10) NOT NULL,
  `jamTiba` varchar(10) NOT NULL,
  `dari` varchar(30) NOT NULL,
  `ke` varchar(30) NOT NULL,
  `idKelas` int(3) NOT NULL,
  PRIMARY KEY  (`idKA`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- 
-- Dumping data untuk tabel `kereta`
-- 

INSERT INTO `kereta` VALUES (1, 'AR`train Superfast', '2018-03-22', '2018-03-22', '09:00', '12:00', 'Surabaya', 'jakarta', 2);
INSERT INTO `kereta` VALUES (2, 'AR`train Superfast', '2018-03-22', '2018-03-22', '10:00', '14:00', 'madiun', 'jakarta', 2);
INSERT INTO `kereta` VALUES (3, 'AR`train SONIC', '2018-03-22', '2018-03-22', '09:00', '10:00', 'Surabaya', 'Jakarta', 3);

-- --------------------------------------------------------

-- 
-- Struktur dari tabel `pesan`
-- 

CREATE TABLE `pesan` (
  `idPesan` int(5) NOT NULL auto_increment,
  `namaPemesan` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `noTelp` varchar(15) NOT NULL,
  `dewasa` int(11) NOT NULL,
  `anak` int(11) NOT NULL,
  `idKA` int(3) NOT NULL,
  `status` char(1) NOT NULL default 'Y',
  PRIMARY KEY  (`idPesan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

-- 
-- Dumping data untuk tabel `pesan`
-- 

INSERT INTO `pesan` VALUES (1, 'Ahmad Afandi', 'Bondowoso', '085232749944', 1, 0, 4, 'Y');
INSERT INTO `pesan` VALUES (2, 'Ahmad Afandi', 'Bondowoso', '085232749944', 1, 1, 4, 'Y');
INSERT INTO `pesan` VALUES (3, 'Ahmad Afandi', 'Bondowoso', '085232749944', 1, 1, 4, 'Y');
INSERT INTO `pesan` VALUES (6, 'Samsul', 'Jember', '085232749944', 2, 3, 4, 'Y');
INSERT INTO `pesan` VALUES (7, 'Samsul', 'Jember', '085232749944', 2, 1, 1, 'Y');
INSERT INTO `pesan` VALUES (8, 'Ahmad Afandi', 'Jember', '085232749944', 1, 1, 1, 'Y');
INSERT INTO `pesan` VALUES (9, 'Ahmad Afandi', 'Jember', '085232749944', 1, 1, 3, 'Y');
INSERT INTO `pesan` VALUES (10, 'ar', 'pudak', '082234039093', 10, 1, 5, 'N');
INSERT INTO `pesan` VALUES (12, 'Vii', 'ttt', 'yy', 1, 0, 5, 'N');

-- --------------------------------------------------------

-- 
-- Struktur dari tabel `pesanpsw`
-- 

CREATE TABLE `pesanpsw` (
  `idPesan` int(5) NOT NULL auto_increment,
  `namaPemesan` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `noTelp` varchar(15) NOT NULL,
  `dewasa` int(11) NOT NULL,
  `anak` int(11) NOT NULL,
  `idPsw` int(3) NOT NULL,
  `status` char(1) NOT NULL default 'Y',
  PRIMARY KEY  (`idPesan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

-- 
-- Dumping data untuk tabel `pesanpsw`
-- 

INSERT INTO `pesanpsw` VALUES (1, 'Ahmad Afandi', 'Bondowoso', '085232749944', 1, 0, 4, 'Y');
INSERT INTO `pesanpsw` VALUES (3, 'Ahmad Afandi', 'Bondowoso', '085232749944', 1, 1, 4, 'Y');
INSERT INTO `pesanpsw` VALUES (6, 'Samsul', 'Jember', '085232749944', 2, 3, 4, 'N');
INSERT INTO `pesanpsw` VALUES (7, 'Samsul', 'Jember', '085232749944', 2, 1, 1, 'Y');
INSERT INTO `pesanpsw` VALUES (9, 'Ahmad Afandi', 'Jember', '085232749944', 1, 1, 3, 'Y');
INSERT INTO `pesanpsw` VALUES (10, 'ARIF DARMA PUTRA', 'panjang punjung', '082234039093', 1, 0, 1, 'Y');
INSERT INTO `pesanpsw` VALUES (12, 'Ar', 'aaa', 'aaaaa', 2, 0, 0, 'Y');
INSERT INTO `pesanpsw` VALUES (18, 'ARIF DARMA PUTRA', 'pudak ponorogo jawatimur', '082234039093', 2, 0, 1, 'N');
INSERT INTO `pesanpsw` VALUES (19, 'VII', 'pudak ponorogo jawatimur', '082234039093', 1, 2, 2, 'N');
INSERT INTO `pesanpsw` VALUES (20, 'ARIF DARMA PUTRA', 'pudak ponorogo jawatimur', '082234039093', 3, 0, 1, 'Y');

-- --------------------------------------------------------

-- 
-- Struktur dari tabel `pesawat`
-- 

CREATE TABLE `pesawat` (
  `idPsw` int(3) NOT NULL auto_increment,
  `namaPsw` varchar(30) NOT NULL,
  `tanggalBerangkat` date NOT NULL,
  `tanggalTiba` date NOT NULL,
  `jamBerangkat` varchar(10) NOT NULL,
  `jamTiba` varchar(10) NOT NULL,
  `dari` varchar(30) NOT NULL,
  `ke` varchar(30) NOT NULL,
  `idKelas` int(3) NOT NULL,
  PRIMARY KEY  (`idPsw`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

-- 
-- Dumping data untuk tabel `pesawat`
-- 

INSERT INTO `pesawat` VALUES (1, 'LION AIR', '2018-03-20', '2018-03-20', '13:00', '15:00', 'Jakarta CGK', 'Denpasar-Bali', 4);
INSERT INTO `pesawat` VALUES (2, 'Air asia', '2018-03-20', '2018-03-21', '13:00', '17:00', 'surabaya', 'Singapore DO', 3);
INSERT INTO `pesawat` VALUES (3, 'Air asia', '2018-03-22', '2018-03-22', '10:00', '13:00', 'Surabaya', 'Japan', 5);
INSERT INTO `pesawat` VALUES (4, 'Air asia', '2018-03-22', '2018-03-23', '05:00', '12:00', 'surabaya', 'Hongkong', 3);
INSERT INTO `pesawat` VALUES (5, 'LION AIR', '2018-03-22', '2018-03-22', '12:00', '17:00', 'Jakarta', 'surabaya', 6);

-- --------------------------------------------------------

-- 
-- Struktur dari tabel `user`
-- 

CREATE TABLE `user` (
  `iduser` int(11) NOT NULL auto_increment,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` enum('Administrator','user','karyawan') NOT NULL,
  `fullname` varchar(200) NOT NULL,
  PRIMARY KEY  (`iduser`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

-- 
-- Dumping data untuk tabel `user`
-- 

INSERT INTO `user` VALUES (1, 'arif', 'arif', 'Administrator', 'Arif Darma Putra');
INSERT INTO `user` VALUES (2, 'karyawan', 'karyawan', 'karyawan', 'Karyawannya arif');
INSERT INTO `user` VALUES (3, 'vii', 'vii', 'user', 'Vii');
INSERT INTO `user` VALUES (11, 'full', 'full', 'user', 'Fullname');
INSERT INTO `user` VALUES (12, 'ar', 'ar', 'user', 'ARIF ');
