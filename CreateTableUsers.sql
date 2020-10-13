/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Author:  snelson
 * Created: Jan 31, 2019
 */

CREATE TABLE `inventory`.`users` ( `username` VARCHAR(50) NOT NULL , `firstname` VARCHAR(20) NOT NULL , `lastname` VARCHAR(20) NOT NULL , `logged_in` DATETIME NOT NULL , PRIMARY KEY (`username`(50))) ENGINE = InnoDB;