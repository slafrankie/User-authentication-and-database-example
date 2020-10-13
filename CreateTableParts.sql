/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Author:  snelson
 * Created: Jan 31, 2019
 */

CREATE TABLE `inventory`.`parts` ( `part_number` VARCHAR(10) NOT NULL , `manufacturer` VARCHAR(20) NOT NULL , `description` VARCHAR(100) NOT NULL , `instock` BOOLEAN NOT NULL , `buy_price` DECIMAL(6,2) NOT NULL , `sell_price` DECIMAL(6,2) NOT NULL , PRIMARY KEY (`part_number`(10))) ENGINE = InnoDB;
