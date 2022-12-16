<?php
$db = require $_SERVER['DOCUMENT_ROOT'] . '/common/db.php'; // подключаем БД
$checkIn=date('Y-m-d',strtotime($_POST['checkIn'])); // Получаем дату въезда из формы бронирования
$checkOut=date('Y-m-d',strtotime($_POST['checkOut'])); // Получаем дату выезда
$guests=$_POST['guests']; // Получаем количество гостей
$room=$_POST['room']; // Получем комнату
$email=$_POST['email']; // Получаем почту на которую будет отправленно письмо
$bokking_code=uniqid(); // Генирируем уникальный код для QRcode
$qr=file_get_contents("https://api.qrserver.com/v1/create-qr-code/?size=300x300&data={$bokking_code}"); // Генирируем QRcode
$path = $_SERVER['DOCUMENT_ROOT'] . "/img/{$bokking_code}.png"; // Путь сохранения QRcode
$img=file_put_contents($path, $qr); // Сохраняем QRcode
$db->query("INSERT INTO form(CheckIn,CheckOut,guests, room_id,Email,bokking_code ) VALUES ('{$checkIn}','{$checkOut}','{$guests}','{$room}','{$email}','{$bokking_code}')"); // Кладём в таблицу данные
$mailto = $email; // Почта на которую отправленно сообщение
$file=$path; // Изображение отправки на почту
$subject="Бронь комнаты в отеле"; // Заголовок сообщения
$message=" Дата заселения: ". $checkIn . "\r\n". // Само сообщение
         " Дата выселения: ". $checkOut . "\r\n". // Само сообщение
        " Количество гостей отлея: ". $guests . "\r\n"; // Само сообщение
$r = sendMailAttachment ($mailto,$subject, $message, $file); // Хранение данных
function sendMailAttachment($mailTo, $subject, $message, $file){ // Функция отправки сообщения
        $separator = "---"; // Разделитель
        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: multipart/mixed; boundary=\"$separator\"";
            $bodyMail = "--$separator\n"; // начало тела письма, выводим разделитель
            $bodyMail .= "Content-Type:text/html; charset=\"utf-8\"\n"; // кодировка письма
            $bodyMail .= "Content-Transfer-Encoding: 7bit\n\n"; // задаем конвертацию письма
            $bodyMail .= $message."\n"; // добавляем текст письма
            $bodyMail .= "--$separator\n";
            $fileRead = fopen($file, "r"); // открываем файл
            $contentFile = fread($fileRead, filesize($file)); // читаем файл
            fclose($fileRead); // закрываем файл
            $bodyMail .= "Content-Type: application/octet-stream; name==?utf-8?B?".base64_encode(basename($file))."?=\n";
            $bodyMail .= "Content-Transfer-Encoding: base64\n"; // кодировка файла
            $bodyMail .= "Content-Disposition: attachment; filename==?utf-8?B?".base64_encode(basename($file))."?=\n\n";
            $bodyMail .= chunk_split(base64_encode($contentFile))."\n"; // кодируем и прикрепляем файл
            $bodyMail .= "--".$separator ."--\n";
        $result = mail($mailTo, $subject, $bodyMail, $headers); // отправка письма
        return $result;
    }
header("location:../index.php");
