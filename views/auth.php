<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="views/style/default.css">
    <link rel="stylesheet" href="views/style/login.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <title>Вход в реестр</title>
</head>
<body>
<?php include_once ('header.php')?>
<div class="content">
    <div class="login">
        <h1>Авторизация</h1>
        <form method="post" action="../loginController.php">
            <!-- post -важные данные передать(невидемо) а гет не важные передавать -->
            <!-- action - куда передать данные с поля -->
            <p> Логин:
                <input type="text" name="login">
            </p>
            <p> Пароль:
                <input type="password" name="password">
            </p>
            <p>
                <button type="submit" name="send" value="true">Войти</button>
            </p>
            <p><h5>
                <?  if(isset($_SESSION['errorAuth'])){
                    echo $_SESSION['errorAuth'];unset($_SESSION['errorAuth']);
                }
                else {
                    echo '<br>';
                }
                ?>
            </h5></p>
        </form>
    </div>
</div>
</body>
</html>