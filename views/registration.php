<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="views/style/default.css">
    <link rel="stylesheet" href="views/style/registration.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <title>Регистрация</title>
</head>
<body>
<? include 'header.php' ?>
<div class="content">
<!--    <div class="back">-->
<!--        <a href="../index.php">Страница входа</a>-->
<!--    </div>-->
    <div class="registration">
        <h1>Регистрация</h1>
        <form method="post" action="../registrationController.php">
            <div class="li">
                <div class="gh">
                    <p>Ф.И.О.</p>
                </div>
                <div class="hg">
                    <p><input type="text" name="fio"></p>
                </div>
            </div>
            <div class="li">
                <div class="gh">
                    <p>Логин</p>
                </div>
                <div class="hg">
                    <p><input type="text" name="login"></p>
                </div>
            </div>
            <div class="li">
                <div class="gh">
                    <p>Пароль</p>
                </div>
                <div class="hg">
                    <p><input type="text" name="password"></p>
                </div>
            </div>
            <div class="li">
                <div class="gh">
                    <p>Группа</p>
                </div>
                <div class="hg">
                    <p><select name="group" id="group">
                            <option value="not">Не выбрана</option>
                            <?  if(isset($rows_groups)):  ?>
                                <? foreach($rows_groups as $iteam): ?>
                                    <option value="<?=$iteam['id']?>"><?=$iteam['name']?></option>
                                <? endforeach; ?>
                            <? endif; ?>
                        </select></p>
                </div>
            </div>
            <div class="li">
                <div class="gh">
                    <p>Роль</p>
                </div>
                <div class="hg">
                    <p><select name="role" id="role">
                            <?  if(isset($rows_roles)):  ?>
                            <? foreach($rows_roles as $iteam): ?>
                                    <option value="<?=$iteam['id']?>"><?=$iteam['desc']?></option>
                                <? endforeach; ?>
                            <? endif; ?>
                        </select></p>
                </div>
            </div>
            <p>
                <button type="submit" name="join2" value="true">Регистрация</button>
            </p>
    </div>
    <div class="errors">
        <? if(isset($_SESSION['errorReg'])){echo $_SESSION['errorReg'];unset($_SESSION['errorReg']); }else{echo '<br>';} session_write_close(); ?>
    </div>
</div>
</body>
</html>