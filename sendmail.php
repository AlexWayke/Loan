<?php
    use PHPMapler\PHPMapler\PHPMapler;
    use PHPMapler\PHPMapler\Exeption;

    require 'phpmailer/src/Exception.php';
    require 'phpmailer/src/PHPMapler.php';

    $mail = new PHPMapler(true);
    $mail->CharSet = 'UTF-8';
    $mail->setLanguage('ru', 'phpmailer/language/');
    $mail->IsHTML(true);

    $mail->Host = "smtp.yandex.ru";
    $mail->Username = 'yuhcha2';
    $mail->Password   = 'nhdlxlwrhhzmyrwe';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    $mail->setFrom('yuhcha2@yandex.ru', 'Отправитель');
    $mail->addAddress('yuhcha2@yandex.ru');
    $mail->Subject = "Заявка формы.";

    $body = '<h1>Заявка на одобрение</h2>';
    $body.='<p><strong>Имя:</strong> '.$_POST['name'].'</p>';
    $body.='<p><strong>Телефон:</strong> '.$_POST['tel'].'</p>';
    $body.='<p><strong>Город:</strong> '.$_POST['city'].'</p>';
    $body.='<p><strong>Сумма:</strong> '.$_POST['summ'].'</p>';
    $body.='<p><strong>Период:</strong> '.$_POST['period'].'</p>';
    $body.='<p><strong>Тип займа:</strong> '.$_POST['type'].'</p>';
    $body.='<p><strong>Объект залога:</strong> '.$_POST['object'].'</p>';
    $body.='<p><strong>Контакт через:</strong> '.$_POST['contact'].'</p>';

    $mail->Body = $body;

    if (!$mail->send()) {
        $message = 'Ошибка';
    } else {
        $message = 'Успешно'
    }

    $response = ['message' => $message];

    header('Content-type: application/json');
    echo json_encode($respobse);
?>
