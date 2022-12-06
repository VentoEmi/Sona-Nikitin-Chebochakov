<?php
$db = require $_SERVER['DOCUMENT_ROOT'] . '/common/db.php';
$id=$_POST['id'];
$name=$_POST['name'];
$text=$_POST['text'];
$date= date("Y-m-d");
$db->query("INSERT INTO reviews( name, date,text, room_id) VALUES ('{$name}','{$date}','{$text}','{$id}')");
header("location: /room-details.php?id=".$id);