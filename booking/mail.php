<?php
$db = require $_SERVER['DOCUMENT_ROOT'] . '/common/db.php';
$checkIn=date('Y-m-d',strtotime($_POST['checkIn']));
$checkOut=date('Y-m-d',strtotime($_POST['checkOut']));
$guests=$_POST['guests'];
$room=$_POST['room'];
$email=$_POST['email'];
$bokking_code=uniqid();
$qr=file_get_contents("https://api.qrserver.com/v1/create-qr-code/?size=300x300&data={$bokking_code}");
$path = $_SERVER['DOCUMENT_ROOT'] . "/img/{$bokking_code}.png";
$img=file_put_contents($path, $qr);
$db->query("INSERT INTO form(CheckIn,CheckOut,guests, room_id,Email,bokking_code ) VALUES ('{$checkIn}','{$checkOut}','{$guests}','{$room}','{$email}','{$bokking_code}')");

$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";

mail("{$email}", "Бронирование комнаты в отеле Sona",
`
<html>
<head>
    <title>Бронирование комнаты в отеле Sona</title>
</head>
<body>
<img src="{$path}" alt=''>
</body>
</html>
`, $headers);
header("location:../index.php");
/*
 *
 * Дата заселения: {$checkIn}.
Дата выселения: .{$checkOut}.
Количество гостей отеля: .{$guests}.
Количество комнат: .{$room}.
Код бронирования:  <img src='{$path}' alt=''>*/