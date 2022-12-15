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

/*
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
*/



$mailto = $email;
$file=$path;
$subject="Бронь комнаты в отеле";
$message=" Дата заселения: ". $checkIn . "\r\n".
         " Дата выселения: ". $checkOut . "\r\n".
        " Количество гостей отлея: ". $guests . "\r\n";
$r = sendMailAttachment ($mailto,$subject, $message, $file);
function sendMailAttachment($mailTo, $subject, $message, $file)
    {
        $separator = "---";
        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: multipart/mixed; boundary=\"$separator\"";

            $bodyMail = "--$separator\n"; // начало тела письма, выводим разделитель
            $bodyMail .= "Content-Type:text/html; charset=\"utf-8\"\n"; // кодировка письма
            $bodyMail .= "Content-Transfer-Encoding: 7bit\n\n"; // задаем конвертацию письма
            $bodyMail .= $message."\n"; // добавляем текст письма
            $bodyMail .= "--$separator\n";
            $fileRead = fopen($file, "r");
            $contentFile = fread($fileRead, filesize($file));
            fclose($fileRead);
            $bodyMail .= "Content-Type: application/octet-stream; name==?utf-8?B?".base64_encode(basename($file))."?=\n";
            $bodyMail .= "Content-Transfer-Encoding: base64\n"; // кодировка файла
            $bodyMail .= "Content-Disposition: attachment; filename==?utf-8?B?".base64_encode(basename($file))."?=\n\n";
            $bodyMail .= chunk_split(base64_encode($contentFile))."\n"; // кодируем и прикрепляем файл
            $bodyMail .= "--".$separator ."--\n";
            // письмо без вложения

        $result = mail($mailTo, $subject, $bodyMail, $headers); // отправка письма
        return $result;

    }
header("location:../index.php");












/*`
<html>
<head>
    <title>Бронирование комнаты в отеле Sona</title>
</head>
<body>
<img src="{$img}" alt=''>
</body>
</html>
`, $headers);
header("location:../index.php")
/*
 *
 * Дата заселения: {$checkIn}.
Дата выселения: .{$checkOut}.
Количество гостей отеля: .{$guests}.
Количество комнат: .{$room}.
Код бронирования:  <img src='{$path}' alt=''>*/