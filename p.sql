-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema salon-fransisco
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema salon-fransisco
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `salon-fransisco` DEFAULT CHARACTER SET utf8 ;
USE `salon-fransisco` ;

-- -----------------------------------------------------
-- Table `salon-fransisco`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `salon-fransisco`.`user` (
  `id_user` INT NOT NULL,
  `username` VARCHAR(20) NULL,
  `password` VARCHAR(35) NULL,
  `role` ENUM('admin', 'kasir', 'gudang', 'bos') NULL,
  `status` ENUM('aktif', 'tidak aktif') NULL,
  PRIMARY KEY (`id_user`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `salon-fransisco`.`kategori`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `salon-fransisco`.`kategori` (
  `id_kategori` INT NOT NULL,
  `kategori` VARCHAR(45) NULL,
  PRIMARY KEY (`id_kategori`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `salon-fransisco`.`jasa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `salon-fransisco`.`jasa` (
  `id_jasa` INT NOT NULL,
  `nama_jasa` VARCHAR(45) NULL,
  `harga` INT NULL,
  `id_kategori` INT NOT NULL,
  PRIMARY KEY (`id_jasa`),
  INDEX `fk_jasa_kategori1_idx` (`id_kategori` ASC) ,
  CONSTRAINT `fk_jasa_kategori1`
    FOREIGN KEY (`id_kategori`)
    REFERENCES `salon-fransisco`.`kategori` (`id_kategori`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `salon-fransisco`.`barang`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `salon-fransisco`.`barang` (
  `id_barang` INT NOT NULL,
  `nama_barang` VARCHAR(45) NULL,
  `harga_beli` INT NULL,
  `stock` INT NULL,
  PRIMARY KEY (`id_barang`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `salon-fransisco`.`supplier`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `salon-fransisco`.`supplier` (
  `id_supplier` INT NOT NULL,
  `nama_supplier` VARCHAR(45) NULL,
  `alamat` VARCHAR(250) NULL,
  PRIMARY KEY (`id_supplier`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `salon-fransisco`.`pembelian`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `salon-fransisco`.`pembelian` (
  `id_pembelian` INT NOT NULL,
  `manufaktur` VARCHAR(45) NULL,
  `tanggal` DATE NULL,
  `total` INT NULL,
  `id_user` INT NOT NULL,
  `id_supplier` INT NOT NULL,
  PRIMARY KEY (`id_pembelian`),
  INDEX `fk_pembelian_user1_idx` (`id_user` ASC) ,
  INDEX `fk_pembelian_supplier1_idx` (`id_supplier` ASC) ,
  CONSTRAINT `fk_pembelian_user1`
    FOREIGN KEY (`id_user`)
    REFERENCES `salon-fransisco`.`user` (`id_user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_pembelian_supplier1`
    FOREIGN KEY (`id_supplier`)
    REFERENCES `salon-fransisco`.`supplier` (`id_supplier`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `salon-fransisco`.`detail_pembelian`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `salon-fransisco`.`detail_pembelian` (
  `id_detail_pembelian` INT NOT NULL,
  `jumlah` INT NULL,
  `harga` INT UNSIGNED NULL,
  `subtotal` INT NULL,
  `id_pembelian` INT NOT NULL,
  `id_barang` INT NOT NULL,
  PRIMARY KEY (`id_detail_pembelian`),
  INDEX `fk_detail_pembelian_pembelian1_idx` (`id_pembelian` ASC) ,
  INDEX `fk_detail_pembelian_barang1_idx` (`id_barang` ASC) ,
  CONSTRAINT `fk_detail_pembelian_pembelian1`
    FOREIGN KEY (`id_pembelian`)
    REFERENCES `salon-fransisco`.`pembelian` (`id_pembelian`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_detail_pembelian_barang1`
    FOREIGN KEY (`id_barang`)
    REFERENCES `salon-fransisco`.`barang` (`id_barang`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `salon-fransisco`.`layanan`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `salon-fransisco`.`layanan` (
  `id_layanan` INT NOT NULL,
  `tanggal` DATE NULL,
  `total` INT NULL,
  `id_user` INT NOT NULL,
  PRIMARY KEY (`id_layanan`),
  INDEX `fk_layanan_user1_idx` (`id_user` ASC) ,
  CONSTRAINT `fk_layanan_user1`
    FOREIGN KEY (`id_user`)
    REFERENCES `salon-fransisco`.`user` (`id_user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `salon-fransisco`.`detail_layanan`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `salon-fransisco`.`detail_layanan` (
  `id_detail_layanan` INT NOT NULL,
  `jumlah` INT NULL,
  `harga` INT NULL,
  `subtotal` INT NULL,
  `id_layanan` INT NOT NULL,
  `id_jasa` INT NOT NULL,
  PRIMARY KEY (`id_detail_layanan`),
  INDEX `fk_detail_layanan_layanan1_idx` (`id_layanan` ASC) ,
  INDEX `fk_detail_layanan_jasa1_idx` (`id_jasa` ASC) ,
  CONSTRAINT `fk_detail_layanan_layanan1`
    FOREIGN KEY (`id_layanan`)
    REFERENCES `salon-fransisco`.`layanan` (`id_layanan`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_detail_layanan_jasa1`
    FOREIGN KEY (`id_jasa`)
    REFERENCES `salon-fransisco`.`jasa` (`id_jasa`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `salon-fransisco`.`pengambilan`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `salon-fransisco`.`pengambilan` (
  `id_pengambilan` INT NOT NULL,
  `tanggal` DATE NULL,
  `total` INT NULL,
  `id_user` INT NOT NULL,
  PRIMARY KEY (`id_pengambilan`),
  INDEX `fk_pengambilan_user1_idx` (`id_user` ASC) ,
  CONSTRAINT `fk_pengambilan_user1`
    FOREIGN KEY (`id_user`)
    REFERENCES `salon-fransisco`.`user` (`id_user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `salon-fransisco`.`detail_pengambilan`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `salon-fransisco`.`detail_pengambilan` (
  `id_detail_pengambilan` INT NOT NULL,
  `jumlah` INT NULL,
  `id_pengambilan` INT NOT NULL,
  `id_barang` INT NOT NULL,
  PRIMARY KEY (`id_detail_pengambilan`),
  INDEX `fk_detail_pengambilan_pengambilan1_idx` (`id_pengambilan` ASC) ,
  INDEX `fk_detail_pengambilan_barang1_idx` (`id_barang` ASC) ,
  CONSTRAINT `fk_detail_pengambilan_pengambilan1`
    FOREIGN KEY (`id_pengambilan`)
    REFERENCES `salon-fransisco`.`pengambilan` (`id_pengambilan`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_detail_pengambilan_barang1`
    FOREIGN KEY (`id_barang`)
    REFERENCES `salon-fransisco`.`barang` (`id_barang`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `salon-fransisco`.`pengeluaran_lainnya`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `salon-fransisco`.`pengeluaran_lainnya` (
  `id_pengeluaran_lainnya` INT NOT NULL,
  `keterangan` VARCHAR(45) NULL,
  `total` INT NULL,
  `tanggal` DATE NULL,
  `id_user` INT NOT NULL,
  PRIMARY KEY (`id_pengeluaran_lainnya`),
  INDEX `fk_pengeluaran_lainnya_user1_idx` (`id_user` ASC) ,
  CONSTRAINT `fk_pengeluaran_lainnya_user1`
    FOREIGN KEY (`id_user`)
    REFERENCES `salon-fransisco`.`user` (`id_user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
