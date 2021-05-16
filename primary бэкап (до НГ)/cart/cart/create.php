<?php
$dbserv = "mysql.ics.my";
$dblogin = "user_cafb3e57";
$dbpass = "4da1fa51";
$db = "db_cafb3e57";

$add_table_cart = "CREATE TABLE `db_cafb3e57`.`cart` ( `id` INT(5) NOT NULL AUTO_INCREMENT ,  `fio` VARCHAR(50) NOT NULL ,  `cartridge` VARCHAR(20) NOT NULL ,  `cabinet` VARCHAR(30) NOT NULL ,  `delivery` VARCHAR(30) NOT NULL ,    PRIMARY KEY  (`id`)) ENGINE = InnoDB";

$con = mysqli_connect($dbserv, $dblogin, $dbpass, $db);
if (mysqli_query($con, $add_table_cart)) {
  $message = "fine";
}
?>