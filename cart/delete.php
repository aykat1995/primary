<?php
$dbserv = "mysql.ics.my";
$dblogin = "user_cafb3e57";
$dbpass = "4da1fa51";
$db = "db_cafb3e57";

if ($_POST['act1'] == 'order1') {
  $delete_id = ($_POST['delete_id']);
  $del_str_cart = "DELETE FROM `cart` WHERE `cart`.`id` = $delete_id";
  $result = mysqli_query(mysqli_connect($dbserv, $dblogin, $dbpass, $db), $del_str_cart);
}
  
?>  