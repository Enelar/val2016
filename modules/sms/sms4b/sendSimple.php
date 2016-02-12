<?php
require_once(__DIR__.'/CSms4bBase.php');
$SMS4B = new Csms4bBase('YANA777','123456');
echo "Ваш логин - " . $SMS4B->getLogin(); // выводим логин для справки
echo "</br>";
echo "Доступные символьные имена: ";
echo '<pre>'; print_r($SMS4B->GetSender()); echo '</pre>';
echo "</br>";
echo "Баланс: ";
echo $SMS4B->arBalance["Rest"]; // выводим текущий баланс

echo "</br>";
echo "</br>";

$message = 'Тест';		// текст сообщения
$to = '79213243303';	// номер, на который отправляем

$result = $SMS4B->SendSMS($message,$to); // выполняем отправку

// выводим сообщение в зависимости от результата
if($result)
	echo "<span style='color:#00FF00;'>Сообщение было успешно отправлено!</span>";
else
	echo "<span style='color:#FF0000;'>Во время отправки произошли ошибки!</span>";

?>