<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="views/style/default.css">
    <link rel="stylesheet" href="views/style/home.css">
    <link rel="stylesheet" href="views/style/datepicker.min.css">
    <script src="views/js/jquery-3.4.1.min.js"></script>
    <script src="views/js/datepicker.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Главная страница Реестра</title>
</head>
<body>
<?php include_once ('header.php'); ?>
<div class="content">
    <div class="success">
        <?  if(isset($_SESSION['success'])):  ?>
            <hr>
            <h1><?echo $_SESSION['success'];unset($_SESSION['success']); session_write_close(); ?></h1>
            <hr>
        <? endif; ?>
    </div>
    <div class="block">
        <h1>Введите промежуток даты для просмотра пропусков</h1>
        <form method="post" action="../total.php">
            <div class="li">
                <div class="gh">
                    <p> От:<input type='text' name="date_ot" class='datepicker-here' /></p>
                </div>
                <div class="hg">
                    <p> До:<input type='text' name="date_do" class='datepicker-here' /></p>
                </div>
            </div>
            <? if($user_role == 'Director' || $user_role == 'Starosta' ||$user_role == 'Admin'): ?>
                <div class="li">
                    <div class="gh">
                        <p>Группа</p>
                    </div>
                    <div class="hg">
                        <p><select name="group" id="group">
                                <?  if(isset($rows_groups)):  ?>
                                    <? foreach($rows_groups as $iteam): ?>
                                        <option value="<?=$iteam['id']?>"><?=$iteam['name']?></option>
                                    <? endforeach; ?>
                                    <? if($user_role == 'Director' || $user_role == 'Admin'): ?>
                                        <option value="all">Все группы</option>
                                    <? endif; ?>
                                <? endif; ?>
                            </select></p>
                    </div>
                </div>
            <? else: ?>
                <input type="hidden" name="group" value="<?=$rows_groups[0]['id'] ?>">
            <? endif; ?>
            <p>
                <button type="submit" name="total" value="true">Просмотр</button>
            </p>
        </form>
    </div>
    <? if($user_role == 'Starosta' || $user_role == 'Admin'): ?>
    <hr>
    <div class="block">
        <h1>Введите день для заполнения пропусков</h1>
        <form method="post" action="../table.php">
            <div class="li">
                    <p> <input type='text' name="date_table" class='datepicker-here' /></p>
            </div>
            <div class="li">
                <div class="gh">
                    <p>Группа</p>
                </div>
                <div class="hg">
                    <p><select name="group" id="group">
                                <?  if(isset($rows_groups)):  ?>
                                    <? foreach($rows_groups as $iteam): ?>
                                        <option value="<?=$iteam['id']?>"><?=$iteam['name']?></option>
                                    <? endforeach; ?>
                                <? endif; ?>
                        </select></p>
                </div>
            </div>
            <p>
                <button type="submit" name="table" value="true">Заполнить таблицу</button>
            </p>
        </form>
    </div>
        <hr>
    <? endif; ?>
    <? if($user_role == 'Admin'): ?>
    <div class="block">
        <h1>Регистрация пользователей</h1>
        <p><button><a href="../registration.php">Регистрация</a></button></p>
    </div>
    <? endif; ?>
</div>
</body>
</html>
