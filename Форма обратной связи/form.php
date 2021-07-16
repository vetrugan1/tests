<?php


// Устанавливает временную зону по умолчанию для всех функций даты/времени в скрипте
date_default_timezone_set('UTC');


// если не будет ошибки, то - инициализации 
$fullname = $email = $commentary = $address = $tel = '';

// хранилище для ошибок
$errors = array('fullname'=>'', 'tel'=>'', 'stop_email'=>'');

// stop email - для запрета определённой почты
$email_stop = "@gmail.com";

$message = ''; // файловая система оповещания

// если ФИО и телефон не заполнены и есть зап. почта, то заполняться массив сообщениями об ошибках
if(isset($_POST['submit'])){
    // проверка ФИО
    if(empty($_POST['fullname'])){
        $errors['fullname'] = 'Требуется ФИО';
    }else{
        $fullname = $_POST['fullname'];
    }

    // проверка email
    if(preg_match("/($email_stop)/iu", $_POST['email'])){
        $errors['stop_email'] = 'Регистрация пользователей с таким почтовым адресом' . $email_stop . ' невозможна';
    }else{
        $email = $_POST['email'];
    }

    // проверка tel
    if(empty($_POST['tel'])){
        $errors['tel'] = 'Требуется телефон';
    }else{
        $tel = $_POST['tel'];
    }

    $address = $_POST['address'];  
    $commentary = $_POST['commentary'];

    

}



?>


<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Form</title>
</head>
<html>
    <body>
        <form method="POST" enctype="multipart/form-data" style="padding: 10px; padding-bottom: 20px; margin-top: 25px; margin-left: 450px; margin-right: 450px; text-align: center;">
                <label for="commentary">Комментарий: </label>
                <p><textarea id="commentary" rows="10" cols="45" name="commentary"></textarea></p>
            
                <label for="fullname">ФИО: </label>
                <input id="fullname" name="fullname" type="text" required/><br/>
                <div><?php echo $errors['fullname']; ?></div>
                <br/>

                <label for="address">Адрес: </label>
                <input id="address" name="address" type="text" /><br/>

                <label for="email">Email: </label><br/>
                <input id="email" name="email" type="email" />
                <div class="error"><?php echo $errors['stop_email']; ?></div>
                <br/>

                <label for="tel">Моб.телефон: </label><br/>
                <input id="tel" type="tel" name="tel" required>
                <div class="error"><?php echo $errors['tel']; ?></div>
                <br/>

                <label for="file">Файл: </label><br/>
                <input id="file" type="file" name="file">
                <div><?php echo $message; ?></div>
                <br/>

                <button type="submit" name="submit">Отправить</button>
        </form>
    </body>
</html>

