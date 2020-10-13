/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Author:  snelson
 * Created: Jan 31, 2019
 */

CREATE USER 'snelson'@'localhost' IDENTIFIED VIA mysql_native_password USING '***';GRANT ALL PRIVILEGES ON *.* TO 'snelson'@'localhost' REQUIRE NONE WITH GRANT OPTION MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;CREATE DATABASE IF NOT EXISTS `snelson`;GRANT ALL PRIVILEGES ON `snelson`.* TO 'snelson'@'localhost';GRANT ALL PRIVILEGES ON `snelson\_%`.* TO 'snelson'@'localhost';