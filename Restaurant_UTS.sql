create database restaurant_uts;
use restaurant_uts;
CREATE TABLE account(
	ID INT AUTO_INCREMENT PRIMARY KEY,
	username VARCHAR(12),
	email VARCHAR(50),
	password VARCHAR(255),
	firstName VARCHAR(50),
	lastName VARCHAR(15),
	birthDate DATE,
	gender CHAR(1),
	role CHAR(30)
);
CREATE TABLE pesanan(
    ID_Pesanan INT AUTO_INCREMENT PRIMARY KEY,
    ID_User INT(5),
    tanggalPemesanan DATE,
    FOREIGN KEY(id_user) REFERENCES account(ID)
)engine=innoDB;
CREATE TABLE detailPesanan(
    ID_Menu INT AUTO_INCREMENT PRIMARY KEY,
    hargaMenu INT(20),
    jumlah INT(30), 
    ID_Pesanan INT(5),
    FOREIGN KEY (ID_Pesanan) REFERENCES pesanan(ID_Pesanan)
)engine=innoDB;
CREATE TABLE Kategori(
    ID_Kategori INT AUTO_INCREMENT PRIMARY KEY,
    namaKategori VARCHAR(100),
    deskripsiKategori VARCHAR(255),
    kategoriMenu VARCHAR(100),
    gambarKategori VARCHAR(255)
)engine=innoDB;
CREATE TABLE menu(
    namaMenu VARCHAR(50),
    deskripsiMenu VARCHAR(200),
    hargaMenu INT(20),
    gambarMenu VARCHAR(100),
    ID_Menu INT,
    ID_Kategori INT,
    FOREIGN KEY(ID_Menu) REFERENCES detailPesanan(ID_Menu),
    FOREIGN KEY(ID_Kategori) REFERENCES kategori(ID_Kategori)
)engine=innoDB;

-- insert into account()
-- values("","admin","adminsushipay@gmail.com","","");