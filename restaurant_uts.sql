-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Mar 2021 pada 10.54
-- Versi server: 10.4.16-MariaDB
-- Versi PHP: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurant_uts`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `account`
--

CREATE TABLE `account` (
  `ID` int(11) NOT NULL,
  `username` varchar(12) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `firstName` varchar(50) DEFAULT NULL,
  `lastName` varchar(15) DEFAULT NULL,
  `birthDate` date DEFAULT NULL,
  `gender` char(1) DEFAULT NULL,
  `role` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `account`
--

INSERT INTO `account` (`ID`, `username`, `email`, `password`, `firstName`, `lastName`, `birthDate`, `gender`, `role`) VALUES
(1, 'admin', 'adminsushipay@gmail.com', '$2y$10$k.6LxhTDgky1YtqiINXTwOHZk/a9hBuqfEfgy7yRsI.490QgzsMf6', '-', '-', '0000-00-00', '-', 'admin'),
(2, 'tes', 'tes@gmail.com', '$2y$10$ccFEgaGsgJjC6b6xHOKvpO6yvfE/lM7PRAbD1uTahQYqtU31IvUti', 'tes', 'tes', '2021-03-09', 'm', 'user');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detailpesanan`
--

CREATE TABLE `detailpesanan` (
  `ID_Pesanan` int(11) NOT NULL,
  `hargaMenu` int(20) DEFAULT NULL,
  `jumlah` int(30) DEFAULT NULL,
  `ID_Menu` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `ID_Kategori` int(11) NOT NULL,
  `namaKategori` varchar(100) DEFAULT NULL,
  `deskripsiKategori` varchar(255) DEFAULT NULL,
  `gambarKategori` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`ID_Kategori`, `namaKategori`, `deskripsiKategori`, `gambarKategori`) VALUES
(1, 'Sushi', 'Sushi is a traditional Japanese dish of prepared vinegared rice, usually with some sugar and salt, accompanying a variety of ingredients, such as seafood, often raw, and vegetables.', 'Sushi.jpg'),
(2, 'Surimi (Fish Ball)', 'Surimi refers to a paste made from fish or other meat. It can also refer to a number of East Asian foods that use that paste as their primary ingredient.', 'Surimi.jpg'),
(3, 'Tempura', 'Tempura is a typical Japanese dish usually consisting of seafood, meat, and vegetables that have been battered and deep fried.', 'Tempura.jpg'),
(4, 'Karaage', 'Karaage is a Japanese cooking technique in which various foods—most often chicken, but also other meat and fish—are deep fried in oil.', 'Karaage.jpg'),
(5, 'Kushi Katsu', 'Kushikatsu, also known as kushiage, is a Japanese dish of deep-fried skewered meat and vegetables. In Japanese, kushi refers to the skewers used while katsu means a deep-fried cutlet of meat.', 'Kushi Katsu.jpg'),
(6, 'Donburi', 'Donburi is a Japanese rice-bowl dish consisting of fish, meat, vegetables or other ingredients simmered together and served over rice.', 'Donburi.jpg'),
(7, 'Dessert', 'Dessert  is a sweet course or dish (as of pastry or ice cream) usually served at the end of a meal.', 'Dessert.jpg'),
(8, 'Drinks', 'We also serve many drinks for you to fresh your taste palate after eating heavy food with light refreshing drink like cold ocha.', 'Drinks.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `ID_Menu` int(11) NOT NULL,
  `namaMenu` varchar(50) DEFAULT NULL,
  `deskripsiMenu` varchar(200) DEFAULT NULL,
  `hargaMenu` int(20) DEFAULT NULL,
  `gambarMenu` varchar(100) DEFAULT NULL,
  `ID_Kategori` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`ID_Menu`, `namaMenu`, `deskripsiMenu`, `hargaMenu`, `gambarMenu`, `ID_Kategori`) VALUES
(1, 'California Roll', 'California Roll or California Maki is a makizushi sushi roll that is usually rolled inside-out, and containing cucumber, crab or imitation crab, and avocado.', 25000, 'California Roll.jpg', 1),
(2, 'Crunchy Roll', 'Crunchy Roll is a roll with a center of a shrimp tempura, snow crab mix, cucumber, and avocado and then it is topped with crunchy tempura flakes.', 25000, 'Crunchy Roll.jpg', 1),
(3, 'Spicy Tuna Roll', 'Spicy Tuna Roll is a makizushi roll that usually contains raw tuna, and spicy mayo or sriracha.', 30000, 'Spicy Tuna Roll.jpg', 1),
(4, 'Salmon Mayo Roll', 'Salmon Mayo Roll is a makizushi with a blend of salmon, sweet mayo, and shoyu sauce.', 29000, 'Salmon Mayo Roll.jpg', 1),
(5, 'Ebi Tempura Roll', 'Ebi Tempura Roll is a makizushi roll with a battered and deep fried shrimp that is topped with crunchy tempura flakes.', 23000, 'Ebi Tempura Roll.jpg', 1),
(6, 'Salmon Deep Fried Roll', 'Salmon Deep Fried Roll is a makizushi roll with deep fried salmon, asparagus core, and panko crust.', 13000, 'Salmon Deep Fried Roll.jpg', 1),
(7, 'Shrimp Bomb', 'Shrimp Bomb is an anti-personnel explosive device containing shrimps to increase its effectiveness at harming victims.', 24000, 'Shrimp Bomb.jpg', 2),
(8, 'Fish Ball', 'Fish Ball is made of pastry dough wrapped in a fish filling.', 49000, 'Fish Ball.jpg', 2),
(9, 'Cuttlefish Ball', 'Cuttlefish Ball is made of fish paste and cuttlefishes.', 49000, 'Cuttlefish Ball.jpg', 2),
(10, 'Crab Ball', 'Crab Ball is a dish made with deep fried crab paste.', 19000, 'Crab Ball.jpg', 2),
(11, 'Cheese Dumpling', 'Cheese Dumpling is a dish that consists of pieces of dough wrapped around a cheese filling.', 22000, 'Cheese Dumpling.jpg', 2),
(12, 'Kakiage Crab Stick', 'Kakiage Crab Stick is a seafood tempura made of starch and finely pulverized white fish.', 28000, 'Kakiage Crab Stick.jpg', 3),
(13, 'Kakiage Original', 'Kakiage is a type of tempura that consists of an assortment of seafood and thinly sliced vegetables.', 39000, 'Kakiage Original.jpg', 3),
(14, 'Kakiage Shrimp', 'Kakiage Shrimp is made by batter-dipping and deep-frying a batch of ingredients such as shrimp bits (or a clump of small-sized shrimp).', 42000, 'Kakiage Shrimp.jpg', 3),
(15, 'Shrimp Tempura', 'Shrimp Tempura or Ebi Ten is a deep fried shrimp coated with crispy tempura crumbs.', 18000, 'Shrimp Tempura.jpg', 3),
(16, 'Dori Tempura', 'Dori Tempura is a deep fried John Dory fish coated wih crispy tempura crumbs.', 43000, 'Dori Tempura.jpg', 3),
(17, 'Chicken Tempura', 'Chicken Tempura or Tori Ten is made of deep fried chicken with juicy & tender meat inside and crispy tempura crumbs outside.', 31000, 'Chicken Tempura.jpg', 3),
(18, 'Karaage Original', 'Karaage is a Japanese cooking technique in which various foods—most often chicken, but also other meat and fish—are deep fried in oil.', 21000, 'Karaage Original.jpg', 4),
(19, 'Karaage Spicy', 'Karaage Spicy is a Japanese cooking technique in which various foods—most often chicken, but also other meat and fish—are deep fried in oil with chili sauce', 43000, 'Karaage Spicy.jpg', 4),
(20, 'Karaage Cheese', 'Karaage Cheese is a Japanese cooking technique in which various foods—most often chicken, but also other meat and fish—are deep fried in oil with cheese', 39000, 'Karaage Cheese.jpg', 4),
(21, 'Karaage BBQ', ' Karaage BBQ is a Japanese cooking technique in which various foods—most often chicken, but also other meat and fish—are deep fried in oil and bbq sauce with BBQ flavor', 49000, 'Karaage BBQ.jpg', 4),
(22, 'Ebi Furai', 'Shrimps or prawns are often prepared by frying, especially deep frying. This is popular in many countries, especially in Asia.', 23000, 'Ebi Furai.jpg', 5),
(23, 'Dori Katsu', 'Dori Katsu is a katsu with dori fish.', 10000, 'Dori Katsu.jpg', 5),
(24, 'Chicken Katsu', 'Chicken Katsu is a Japanese dish of fried chicken made with panko bread crumbs which is also popular in Australia, Hawaii, London, California, and other areas of the world.', 8000, 'Chicken Katsu.jpg', 5),
(25, 'Calamari', 'The word calamari comes from the Italian for \"squid.\" In the United States, it generally refers to a battered and deep-fried appetizer served in restaurants and bars.', 11000, 'Calamari.jpg', 5),
(26, 'Ebi Katsu', 'This popular Japanese dish is often found on fast-food menus and is served on a hamburger bun with lettuce and mayonnaise. You can also serve this with rice and Japanese curry sauce.', 14000, 'Ebi Katsu.jpg', 5),
(27, 'Meaji Katsu', 'Meaji Katsu is a Japanese breaded and deep-fried ground meat patty; a fried meat cake.', 19000, 'Meaji Katsu.jpg', 5),
(28, 'Donburi Satsuma-Age', 'Donburi Satsuma-Age is a Japanese \"rice-bowl dish\" consisting of fried fishcake and served over rice.', 18000, 'Donburi Satsuma-Age.jpg', 6),
(29, 'Mix Karaage Set', 'Mix Karage Set is a Japanese \"rice-bowl dish\" consisting of mixed toppings and served over rice.', 22000, 'Mix Karage Set.jpg', 6),
(30, 'Donburi Chicken Katsu', 'Donburi Chicken Katsu is a Japanese \"rice-bowl dish\" consisting of chicken katsu and served over rice.', 17000, 'Donburi Chicken Katsu.jpg', 6),
(31, 'Donburi Seafood', 'Donburi Seafood is a Japanese \"rice-bowl dish\" consisting of seafood and served over rice.', 23000, 'Donburi Seafood.jpg', 6),
(32, 'Donburi Chicken Teriyaki', 'Donburi Chicken Teriyaki is a Japanese \"rice-bowl dish\" consisting of chicken terriyaki and served over rice.', 14000, 'Donburi Chicken Teriyaki.jpg', 6),
(33, 'Pudding Tiramisu', 'Tiramisu puddings are a class of dessert with tiramisu flavors.', 20000, 'Pudding Tiramisu.jpg', 7),
(34, 'Pudding Choco Cheese', 'Choco cheese puddings are a class of dessert with choco cheese flavors.', 19000, 'Pudding Choco Cheese.jpg', 7),
(35, 'Pudding Chocolate Deluxe', 'Chocolate puddings are a class of desserts with chocolate flavors.', 19000, 'Puding Chocolate Deluxe.jpg', 7),
(36, 'Pudding Cream Cheese', 'Smooth and delicate triple layered Cream Cheese Pudding with cheese grates.', 20000, 'Pudding Cream Cheese.jpg', 7),
(37, 'Cold Ocha', 'It is traditionally made using bancha tea leaves and unpolished brown rice grains. This gives the tea a distinctive roasted aroma that might remind you of popcorn, and a nutty taste with ice', 8000, 'Cold Ocha.jpg', 8),
(38, 'Lychee Tea', 'Lychee Tea is a fruit tea that consists of lychee fruit, juice, flower petals, or extracts mixed with traditional black tea. ', 8000, 'Lychee Tea.jpg', 8),
(39, 'Lemonade', 'Lemonade is a sweetened lemon-flavored beverage.', 8000, 'Lemonade.jpg', 8),
(40, 'Lemon Tea', 'Lemon Tea is a refreshing tea where lemon juice is added in black or green tea. It soothes the throat, prevents cough and congestion, and helps in weight loss. ', 9000, 'Lemon Tea.jpg', 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `ID_Pesanan` int(11) NOT NULL,
  `ID_User` int(5) DEFAULT NULL,
  `tanggalPemesanan` date DEFAULT NULL,
  `waktuPemesanan` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`ID_Pesanan`, `ID_User`, `tanggalPemesanan`, `waktuPemesanan`) VALUES
(1, 2, '2021-03-13', '00:00:00'),
(2, 2, '2021-03-13', '22:22:22'),
(4, 2, '2021-03-13', '10:10:12');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `detailpesanan`
--
ALTER TABLE `detailpesanan`
  ADD PRIMARY KEY (`ID_Pesanan`),
  ADD KEY `ID_Menu` (`ID_Menu`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`ID_Kategori`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`ID_Menu`),
  ADD KEY `ID_Kategori` (`ID_Kategori`);

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`ID_Pesanan`),
  ADD KEY `ID_User` (`ID_User`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `account`
--
ALTER TABLE `account`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `ID_Kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `ID_Menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `ID_Pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detailpesanan`
--
ALTER TABLE `detailpesanan`
  ADD CONSTRAINT `detailpesanan_ibfk_1` FOREIGN KEY (`ID_Menu`) REFERENCES `menu` (`ID_Menu`),
  ADD CONSTRAINT `detailpesanan_ibfk_2` FOREIGN KEY (`ID_Pesanan`) REFERENCES `pesanan` (`ID_Pesanan`);

--
-- Ketidakleluasaan untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`ID_Kategori`) REFERENCES `kategori` (`ID_Kategori`);

--
-- Ketidakleluasaan untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_ibfk_1` FOREIGN KEY (`ID_User`) REFERENCES `account` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
