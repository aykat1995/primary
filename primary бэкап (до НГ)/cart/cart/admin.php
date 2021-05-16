<?php

// создание пустой базы данных
if( isset( $_POST['create_db'] ) )
{
$dbserv = "mysql.ics.my";
$dblogin = "user_cafb3e57";
$dbpass = "4da1fa51";
$db = "db_cafb3e57";

$add_table_cart = "CREATE TABLE `db_cafb3e57`.`cart` ( `id` INT(5) NOT NULL AUTO_INCREMENT ,  `fio` CHAR(80) NOT NULL ,  `cartridge` CHAR(40) NOT NULL ,  `cabinet` CHAR(60) NOT NULL ,  `delivery` CHAR(60) NOT NULL ,    PRIMARY KEY  (`id`)) ENGINE = InnoDB";

$con = mysqli_connect($dbserv, $dblogin, $dbpass, $db);
if (mysqli_query($con, $add_table_cart)) {
  $message = "fine";
}
}


echo '
<!DOCTYPE html><html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="Awesome/css/font-awesome.min.css">
    <title>Админка</title>
  </head>
  <body>
<div class="container">
    <div class="form-box admin-form-box">
        <h3 class="box-title">Админка</h3>
        <a class="box-link" href="get_data.php">Посмотреть статистику</a>
        <a class="box-link" href="index.html">Вернуться к заявке</a>
        <form method="POST">
        <input class="admin-input" type="submit" name="create_db" value="Создать БД с нуля" />
    </form>
    </div>  
</div>

</body>

'


?>