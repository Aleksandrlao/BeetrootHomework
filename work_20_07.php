<?php

function cookieIsset($name) {
    return isset($_COOKIE[$name]) && '' !== $_COOKIE[$name];
}

// task 6
/* Использую куки выводите информацию о количестве посещений и дате последнего посещения. */
$date = date("Y-m-d H:i:s");
if( cookieIsset("lastVisit") ) {
    setcookie("lastVisit", $date, time()+360000);
    setcookie("countVisit", ++$_COOKIE["countVisit"] );
    echo 'В последний раз вы были: '.$_COOKIE["lastVisit"].', а всего заходили: '.$_COOKIE["countVisit"];
} else {
    setcookie("lastVisit", $date, time()+360000);
    setcookie("countVisit", 1);
    echo 'Вы у нас впервые';
}

echo '<br>=================================================<br>';


// task 7
/* Создайте в сессии массив для хранения всех посещенных страниц.
 Выведите в цикле список всех посещенных страниц. */
//include "work_20_07_task7.php";
session_start();
$_SESSION["pages"][] = $_SERVER['PHP_SELF'];
var_dump($_SESSION);


echo '<br>=================================================<br>';

// task 1
/* Задача 1:
 Создайте переменную $name и присвойте ей строковое значение содержащее ваше имя
 Создайте переменную $age и присвойте ей числовое значение
 Выведите: Меня зовут: "ваше имя"
 Выведите: Мой "ваш возраст" лет

 P.S. Каждая фраза должна начинаться с новой строки */
$name = "Александр";
$age = 28;
echo 'Меня зовут ' . $name . ',<br> мой возраст: ' . $age . 'лет';
echo '<br>=================================================<br>';


// task 2
/*  Задача 2:
 Создайте константу и присвойте ей значение
 Проверьте существует ли константа.
 Выведите значение константы
 Попытайтесь изменить ее значение. */
const HELLO = 'Привет';
const HELLO = 'Здрасти';
echo HELLO;

echo '<br>=================================================<br>';


// task 3
/* Задача 3:
 Создайте переменную $age и присвойте ей значение
 - Напишите конструкцию if, которая выводит фразу:
 "Вам еще работать и работать" при условии что $age попадает в диапазон чисел от 18 до 59 (включительно)
 - Расширьте конструкцию if, выводя фразу: "Вам пора на пенсию" при условии, что $age больше 59
 - Если $age от 1 до 17 то выводите вам еще рано работать */
$age = rand(5, 65);
echo $age . '<br>';
if($age >= 18 && $age <=59) {
    echo 'Вам еще работать и работать';
} elseif($age < 18) {
    echo 'Вам еще рано работать';
} else {
    echo 'Вам пора на пенсию';
}

echo '<br>=================================================<br>';

// task 4
/* Создайте переменную $day и присвойте ей числовое значение
 С помощью конструкции switch выведите фразу "Это рабочий день если $day от 1-5
 Если 6-7 "Это выходной день"
 Если переменная $day не попадает в диапазон выводить неизвестный день */
$day = rand(1, 9);
echo $day . '<br>';
switch (true) {
    case $day >= 1 && $day <= 5:
        echo "Это рабочий день";
        break;
    case $day == 6 || $day == 7:
        echo "Это выходной день";
        break;
    default;
        echo "неизвестный день";
        break;
}
echo '<br>=================================================<br>';



// task 4
/* Вывести все числа, меньшие 10000, у которых есть хотя бы одна цифра 3 и которые не делятся на 5 */
$numberArr = range(1, 12000);

function numbersHasTree( $array, callable $callback = NULL ) {
    $result = [];

    foreach ( $array as $value ) {
        if( ( $value <= 10000 ) && ( preg_match('/3/', $value) ) ) {
            $result[] = $value;
        }
    }

    // проверяем наличие функции обратного вызова
    if($callback) {
        $result = call_user_func($callback, $result);
    }
    return $result;
}

//var_dump(numbersHasTree($numberArr));

$numbersDegFive = numbersHasTree($numberArr, function($items) {
    $total = [];
    foreach ( $items as $item ) {
        if( $item % 5 != 0 ) {
            $total[] = $item;
        }
    }
    return $total;
});
echo '<pre>';
//print_r($numbersDegFive);
print_r(count($numbersDegFive));
echo '</pre>';
echo '<br>=================================================<br>';



// task 8
/*  Создайте файл 'test.txt' и запишите в него массив ['name' => 'Your name', 'age' => 'Your age'].
 Считайте данные из файла 'test.txt' и выведите их на экран. */

$testArrayItem = [
    'name' => 'Your name',
    'age' => 'Your age'
];
$testArray[] = $testArrayItem;
$filePath = 'test.txt';
$fp = fopen($filePath, 'a');
$create = fwrite( $fp, serialize($testArray) );
$result = file_get_contents($filePath);
fclose($fp);

echo '<pre>';
var_dump( unserialize($result) );
echo '</pre>';


echo '<br>=================================================<br>';


// task 9
/*  Даны два упорядоченных по возрастанию массива.
Образовать из этих двух массивов единый упорядоченный по возрастанию массив. */

$oneArray = range(1, 20);
$twoArray = range(70, 90);

$totalArray = array_merge($twoArray, $oneArray);
var_dump($totalArray);
echo '<br>';
$resultArray = asort($totalArray);
var_dump($totalArray);



echo '<br>=================================================<br>';


// task 10
/* Написать функцию сортировки пузырьком, с возможностью доп. фильтрации результатов с помощью callback функции */
$numbers = array(1, 12, 0, -6, 30, 9, 6, 4, 21, 5, 2, -16, 3, -44, 8, 7); // исходный массив


function sortBubble( $array, callable $callback = NULL ) {
    for ($j = 0; $j < count($array) - 1; $j++){
        for ($i = 0; $i < count($array) - $j - 1; $i++){
            if ($array[$i] > $array[$i + 1]){
                $tmp_var = $array[$i + 1];
                $array[$i + 1] = $array[$i];
                $array[$i] = $tmp_var;
            }
        }
    }

    // проверяем наличие функции обратного вызова
    if($callback) {
        $array = call_user_func($callback, $array);
    }
    return $array;
}

//var_dump(numbersHasTree($numberArr));

$sortBubblePositive = sortBubble($numbers, function($items) {
    $total = [];
    foreach ( $items as $item ) {
        if( $item > 0 ) {
            $total[] = $item;
        }
    }
    return $total;
});
$sortBubbleEven = sortBubble($numbers, function($items) {
    $total = [];
    foreach ( $items as $item ) {
        if( !($item % 2) ) {
            $total[] = $item;
        }
    }
    return $total;
});
$sortBubblePlus = sortBubble($numbers, function($items) {
    $total = [];
    foreach ( $items as $item ) {
        $total[] = $item * rand(10, 20);
    }
    return $total;
});
$sortBubbleSum = sortBubble($numbers, function($items) {
    $total = [];
    foreach ( $items as $item ) {
        $total =+ $item;
    }
    return $total;
});

echo '<pre>';
var_dump($sortBubblePositive);
echo '<br>';
var_dump($sortBubbleEven);
echo '<br>';
var_dump($sortBubblePlus);
echo '<br>';
var_dump($sortBubbleSum);
echo '</pre>';
echo '<br>=================================================<br>';


