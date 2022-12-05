<?php
$db = require $_SERVER['DOCUMENT_ROOT'] . '/common/db.php';
$checkIn=$_POST['checkIn'];
$checkOut=$_POST['checkOut'];
$guests=$_POST['guests'];
$room=$_POST['room'];
$email=$_POST['email'];
$db->query("INSERT INTO form(CheckIn,CheckOut,guests, room_id,Email ) VALUES ('{$checkIn}','{$checkOut}','{$guests}','{$room})','{$email}')");
mail("{$email}", "Бронирование комнаты в отеле Sona",
"Дата заселения: ".$checkIn. "\r\n".
"Дата выселения: ".$checkOut. "\r\n".
"Количество гостей отеля: ".$guests. "\r\n".
"Количество комнат: ".$room. "\r\n");
header("location:../index.php");