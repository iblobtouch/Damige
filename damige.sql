-- MySQL Script generated by MySQL Workbench
-- Mon Apr 16 11:23:35 2018
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema damige
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema damige
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `damige` DEFAULT CHARACTER SET utf8 ;
USE `damige` ;

-- -----------------------------------------------------
-- Table `damige`.`Supplier`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `damige`.`Supplier` ;

CREATE TABLE IF NOT EXISTS `damige`.`Supplier` (
  `Supplier_ID` VARCHAR(10) NOT NULL,
  `Supplier_Name` VARCHAR(45) NULL,
  `Goods_Services` VARCHAR(45) NULL,
  `Based_In` VARCHAR(45) NULL,
  `Manager` VARCHAR(45) NULL,
  PRIMARY KEY (`Supplier_ID`),
  UNIQUE INDEX `Supplier_Name_UNIQUE` (`Supplier_Name` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `damige`.`idCard`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `damige`.`idCard` ;

CREATE TABLE IF NOT EXISTS `damige`.`idCard` (
  `Card_ID` VARCHAR(10) NOT NULL,
  `Start_Date` DATE NULL,
  `End_Date` DATE NULL,
  `Status` VARCHAR(10) NULL,
  PRIMARY KEY (`Card_ID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `damige`.`Driver`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `damige`.`Driver` ;

CREATE TABLE IF NOT EXISTS `damige`.`Driver` (
  `Driver_ID` VARCHAR(10) NOT NULL,
  `Title` VARCHAR(45) NULL,
  `Driver_name` VARCHAR(45) NULL,
  `Supplier_ID` VARCHAR(10) NOT NULL,
  `Card_ID` VARCHAR(10) NOT NULL,
  PRIMARY KEY (`Driver_ID`),
  INDEX `fk_Driver_Supplier1_idx` (`Supplier_ID` ASC),
  INDEX `fk_Driver_Driver Id Card1_idx` (`Card_ID` ASC),
  UNIQUE INDEX `Driver_name_UNIQUE` (`Driver_name` ASC),
  CONSTRAINT `fk_Driver_Supplier1`
    FOREIGN KEY (`Supplier_ID`)
    REFERENCES `damige`.`Supplier` (`Supplier_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Driver_Driver Id Card1`
    FOREIGN KEY (`Card_ID`)
    REFERENCES `damige`.`idCard` (`Card_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `damige`.`Venue`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `damige`.`Venue` ;

CREATE TABLE IF NOT EXISTS `damige`.`Venue` (
  `Venue_ID` VARCHAR(10) NOT NULL,
  `Area` VARCHAR(45) NULL,
  `Phone` VARCHAR(45) NULL,
  `Address` VARCHAR(45) NULL,
  `Stadium` VARCHAR(45) NULL,
  PRIMARY KEY (`Venue_ID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `damige`.`Vehicle`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `damige`.`Vehicle` ;

CREATE TABLE IF NOT EXISTS `damige`.`Vehicle` (
  `VRN` VARCHAR(10) NOT NULL,
  `Make` VARCHAR(45) NULL,
  `Model` VARCHAR(45) NULL,
  `Supplier_ID` VARCHAR(10) NOT NULL,
  PRIMARY KEY (`VRN`),
  INDEX `fk_Vehicle_Supplier_idx` (`Supplier_ID` ASC),
  CONSTRAINT `fk_Vehicle_Supplier`
    FOREIGN KEY (`Supplier_ID`)
    REFERENCES `damige`.`Supplier` (`Supplier_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `damige`.`Delivery`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `damige`.`Delivery` ;

CREATE TABLE IF NOT EXISTS `damige`.`Delivery` (
  `Delivery_ID` VARCHAR(10) NOT NULL,
  `Venue_ID` VARCHAR(10) NOT NULL,
  `VRN` VARCHAR(10) NOT NULL,
  `Supplier_ID` VARCHAR(10) NOT NULL,
  `Date` DATE NULL,
  `Driver_ID` VARCHAR(10) NOT NULL,
  PRIMARY KEY (`Delivery_ID`),
  INDEX `fk_Delivery_Venue1_idx` (`Venue_ID` ASC),
  INDEX `fk_Delivery_Vehicle1_idx` (`VRN` ASC),
  INDEX `fk_Delivery_Supplier1_idx` (`Supplier_ID` ASC),
  INDEX `fk_Delivery_Driver1_idx` (`Driver_ID` ASC),
  CONSTRAINT `fk_Delivery_Venue1`
    FOREIGN KEY (`Venue_ID`)
    REFERENCES `damige`.`Venue` (`Venue_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Delivery_Vehicle1`
    FOREIGN KEY (`VRN`)
    REFERENCES `damige`.`Vehicle` (`VRN`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Delivery_Supplier1`
    FOREIGN KEY (`Supplier_ID`)
    REFERENCES `damige`.`Supplier` (`Supplier_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Delivery_Driver1`
    FOREIGN KEY (`Driver_ID`)
    REFERENCES `damige`.`Driver` (`Driver_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `damige`.`Logs`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `damige`.`Logs` ;

CREATE TABLE IF NOT EXISTS `damige`.`Logs` (
  `LogID` INT NOT NULL AUTO_INCREMENT,
  `Type` VARCHAR(45) NULL,
  `Description` VARCHAR(45) NULL,
  `Date` DATE NULL,
  PRIMARY KEY (`LogID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `damige`.`users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `damige`.`users` ;

CREATE TABLE IF NOT EXISTS `damige`.`users` (
  `user_ID` INT NOT NULL,
  `username` VARCHAR(45) NULL,
  `password` VARCHAR(45) NULL,
  PRIMARY KEY (`user_ID`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
