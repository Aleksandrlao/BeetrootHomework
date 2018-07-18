<?php

function cookieIsset($name) {
    return isset($_COOKIE[$name]) && '' !== $_COOKIE[$name];
}

// task 1
/* Домашнее задание
Задача 1: Время жизни cookie
Пользователь приходит на сайт. Используя cookie сделать так, что б впервые пришедший
пользователь видел фразу:
"Добро пожаловать, новичек!"
Если пользователь уже посещал сайт в течении последних 10-ти часов, выводить фразу:
"С возвращением, дружище!"
Подсказка: Используйте инструменты для разработчиков Вашего браузера для просмотра и
очистки текущих значений cookie. */
$userId = 'beetroot';

if( cookieIsset("userId") ) {
    echo 'С возвращением, дружище!';
} else {
    setcookie("userId", $userId, time()+36000);
    echo 'Добро пожаловать, новичек!';
}
echo '<br>=================================================<br>';


// task 2
/* Задача 2: Дата и время последнего посещения
Используя cookie реализовать вывод на страницу сообщения с датой и временем последнего визита. */
$date = date("Y-m-d H:i:s");
setcookie("lastVisit", $date, time()+360000);
if( cookieIsset("lastVisit") ) {
    echo 'В последний раз вы были:'.$_COOKIE["lastVisit"];
} else {
    setcookie("lastVisit", $date, time()+360000);
    echo 'Еще не заходили';
}

echo '<br>=================================================<br>';


// task 3
/* Задача 3: Счетчик посещений
Используя cookie реализовать вывод на страницу сообщения с количеством посещений страницы. */
$count = 1;
if( cookieIsset("countVisit") ) {
    setcookie("countVisit", (int) $_COOKIE["countVisit"] + 1 );
    $cookieCount = $_COOKIE["countVisit"];
    $cookieArray = [2, 3, 4];
    $cookieCountText = in_array($cookieCount, $cookieArray) ? ' раза' : ' раз';
    echo 'Вы на сайте: '.$cookieCount.$cookieCountText;
} else {
    setcookie("countVisit", $count);
    echo 'Вы впервые на сайте';
}

echo '<br>=================================================<br>';



