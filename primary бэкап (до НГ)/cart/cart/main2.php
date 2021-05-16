<?php
define('TELEGRAM_TOKEN', '1493508889:AAEaKtxRPc3p2BiKZtuGH5s-R792ub3X9nI');
define('TELEGRAM_CHATID', '-489929646');

if ($_POST['act'] == 'order') {
  $name = ($_POST['name']);
  $cabinet = ($_POST['cabinet']);
  $type = ($_POST['cartridge']);
  $deliv = ($_POST['delivery']);
	
	if ($deliv == 'deliv') {$del = 'Доставить в кабинет';}
  else $del = 'Заберем сами';
  
$dbserv = "mysql.ics.my";
$dblogin = "user_cafb3e57";
$dbpass = "4da1fa51";
$db = "db_cafb3e57";
// $dbserv = "127.0.0.1:3306";
// $dblogin = "root";
// $dbpass = "root";
// $db = "db_cafb3e57";


//$add_table_cart = "CREATE TABLE `db_cafb3e57`.`cart` ( `id` INT(5) NOT NULL AUTO_INCREMENT ,  `fio` VARCHAR(50) NOT NULL ,  `cartridge` VARCHAR(20) NOT NULL ,  `cabinet` VARCHAR(30) NOT NULL ,  `delivery` VARCHAR(30) NOT NULL ,    PRIMARY KEY  (`id`)) ENGINE = InnoDB";
$q_users = "SELECT * FROM users WHERE id > 0";
$q_adduser = "INSERT INTO `cart` (`id`, `fio`, `cartridge`, `cabinet`, `delivery`) VALUES (NULL, '$name', '$type', '$cabinet', '$deliv')";

$con = mysqli_connect($dbserv, $dblogin, $dbpass, $db);
if (mysqli_query($con, $q_adduser)) {
  $message = "Пользователь ". $name. " ". " просит ". $type. " картридж в кабинет ". $cabinet. ". ". $del;

$ch = curl_init('https://api.telegram.org/bot'.TELEGRAM_TOKEN.'/sendMessage?chat_id='.TELEGRAM_CHATID.'&text='.$message); // URL
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // �� ���������� �����
curl_exec($ch); // ������ ������
curl_close($ch); // ��������� ����� cURL
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
      <div class="form-box">
        <h3 class="box-title">Ваша заявка принята!</h3>
        <p class="box-text">Мы отработаем заявку в ближайшее время</p>
        <a href="http://10.6.40.1/primary/" class="box-link">Вернуться на главную</a>
      </div>
    </div>
  </body>
  </html>';
  mysqli_close($con); 
}
else echo "<br/><h1>ОШИБКА </h1><br/>";
}
?>