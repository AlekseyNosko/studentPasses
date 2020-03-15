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
    <title>Страница заполнения</title>
</head>
<body>
<?php include_once ('header.php'); ?>
<div class="content">
    <? if(isset($_SESSION['refer'])): ?>
        <a href="<?=$_SESSION['refer']?>">&#8592 Назад</a>
    <? endif; ?>
    <div class="block">
        <h1> таблица отсутствующих с <?=$date_start?> по <?=$date_end?></h1>
            <table>
                <tbody>
                <tr>
                    <th>№</th>
                    <th>ФИО</th>
                    <th>Группа</th>
                    <th>Дата отсутствия</th>
                </tr>
                <?  if(isset($rows)):  ?>
                    <? foreach($rows as $k => $item): ?>
                        <tr>
                            <td><?=$k+1 ?></td>
                            <td><?=$item['fio'] ?></td>
                            <td><?=$item['name'] ?></td>
                            <td><?=$item['date']?></td>
                        </tr>
                    <? endforeach; ?>
                <? endif; ?>
                </tbody>
            </table>
    </div>
</div>
</body>
</html>
