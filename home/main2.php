<?php
// токен бота
define('TELEGRAM_TOKEN', '1493508889:AAEaKtxRPc3p2BiKZtuGH5s-R792ub3X9nI');
// ваш внутренний ID
define('TELEGRAM_CHATID', '-489929646');

if ($_POST['act'] == 'order') {
  $name = ($_POST['name']);
  $cabinet = ($_POST['cabinet']);
  $type = ($_POST['cartridge']);
  $deliv = ($_POST['delivery']);

$message = $name. " просит картридж ". $cartridge. " в кабинет ". $cabinet. ". ". $deliv;

$ch = curl_init('https://api.telegram.org/bot'.TELEGRAM_TOKEN.'/sendMessage?chat_id='.TELEGRAM_CHATID.'&text='.$message); // URL
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Не возвращать ответ
curl_exec($ch); // Делаем запрос
curl_close($ch); // Завершаем сеанс cURL

file_put_contents ('file.txt', $name, $cabinet , $type );

echo ('<!DOCTYPE html><html lang="ru">
<head>
  <meta charset="windows-1251">
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
      <a href="http:\\10.6.40.1\primary" class="box-link">Вернуться на главную страницу</a>
    </div>
  </div>
</body>
</html>');
}
?>