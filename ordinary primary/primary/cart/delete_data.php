<?php
$dbserv = "mysql.ics.my";
$dblogin = "user_cafb3e57";
$dbpass = "4da1fa51";
$db = "db_cafb3e57";

//$add_table_cart = "CREATE TABLE `db_cafb3e57`.`cart` ( `id` INT(5) NOT NULL AUTO_INCREMENT ,  `fio` VARCHAR(50) NOT NULL ,  `cartridge` VARCHAR(20) NOT NULL ,  `cabinet` VARCHAR(30) NOT NULL ,  `delivery` VARCHAR(30) NOT NULL ,    PRIMARY KEY  (`id`)) ENGINE = InnoDB";
$q_users = "SELECT * FROM users WHERE id > 0";
$q_adduser = "INSERT INTO `cart` (`id`, `fio`, `cartridge`, `cabinet`, `delivery`) VALUES (NULL, '$name', '$type', '$cabinet', '$deliv')";
$get_all = "SELECT * FROM `cart`";

$con = mysqli_connect($dbserv, $dblogin, $dbpass, $db);
//обработчик кнопки удаления

if(isset($_POST["delete_id"])){
  $delete_id = ($_POST['delete_id']);
  $del_str_cart = "DELETE FROM `cart` WHERE `cart`.`id` = $delete_id";
  mysqli_query($con, $del_str_cart);
}

if ($result = mysqli_query($con, $get_all)) {
  echo '<!DOCTYPE html><html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="Awesome/css/font-awesome.min.css">
    <title>Заявки по картриджам</title>
  </head>
  <body>
    <div class="container">
	<form method="post" >
      <div class="table-box">
        <h3 class="box-title">Записи в базе</h3>
        <table class="table">
        ';
            /* извлечение ассоциативного массива */
            printf ("<tr class='table-tr'><th class='table-th'>Номер</th><th class='table-th'>ФИО</th><th class='table-th'>Тип картриджа</th><th class='table-th'>Кабинет</th></tr>");
            while ($row = mysqli_fetch_assoc($result)) {              
                printf ("<tr class='table-tr'><td class='table-td'>%s</td> <td class='table-td'>%s</td> <td class='table-td'>%s</td> <td class='table-td'>%s</td> <td class='delete-td'><button type='submit' type='text' name='delete_id' value=%s class='delete-btn' id=%s>Удалить</button><input type='hidden' name='act1' value='order1'></td></tr>", $row["id"], $row["fio"], $row["cartridge"], $row["cabinet"], $row["id"], $row["id"]);
            }
            echo "</table>";
            /* удаление выборки */
            mysqli_free_result($result);
        /* закрытие соединения */
        echo '
        <a href="http://10.6.40.1/primary/cart/admin.php" class="table-btn">Вернуться в админку</a>
      </div>
	 </form>
    </div>
  </body>
  </html>';
  mysqli_close($con);    
}
else echo "<br/><h1>ОШИБКА </h1><br/>";

?>