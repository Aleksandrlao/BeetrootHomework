<?php

// task 1
/* Дана строка 'HelloWorld'. Сделайте из нее строку 'HELLOWORLD'. */
$helloLovercase = 'HelloWorld';
echo $helloUppercase = mb_strtoupper($helloLovercase);

echo '<br>=================================================<br>';


// task 2
/* в переменной $date лежит дата в формате '23-11-2035'. Преобразуйте эту дату в формат '2035.11.'. */
$date = '23-11-2035';
echo date("Y.m.", strtotime($date));

echo '<br>=================================================<br>';


// task 3
/* Дана строка 'html css php'. Вырежьте из нее и выведите на экран слово 'html', слово 'css' и слово 'php'. */
$langProgString = 'html css php';
$langProgArr = explode(" ", $langProgString);
foreach($langProgArr as $langProgItem) {
    echo $langProgItem.'<br>';
}

echo '<br>=================================================<br>';


// task 4
/* Дана строка '30.11.2016'. Замените все точки на дефисы */
$date = '30.11.2016';
echo date("d-m-Y", strtotime($date));

echo '<br>=================================================<br>';


// task 5
/* Дана строка 'слова слова слова.'. В конце этой строки может быть точка, а может и не быть.
    Сделайте так, чтобы в конце этой строки гарантировано стояла точка.
    То есть: если этой точки нет - ее надо добавить, а если есть - ничего не делать.
    Задачу решите без всяких ифов. */
$deleteDot = 'слова слова слова.';
$deleteDot = rtrim($deleteDot, '.');
echo $deleteDot.'.';

echo '<br>=================================================<br>';


// task 6
/* Создайте массив, заполненный числами от 1 до 100. Найдите сумму элементов данного массива.
    (Повторяю использовать функции) */
$numberArr = range(1, 100);
function countAllArray($numberArr) {
    foreach($numberArr as $numberArrItem) {
        $numberCount += $numberArrItem;
    }
    return $numberCount;
}
echo countAllArray($numberArr);

echo '<br>=================================================<br>';


// task 7
/* Дан массив с числами. Проверьте, что в нем есть элемент со значением 3. */
$numArr = [1, 2, 88, 3, 4, 6, 33, 83];
if (in_array(3, $numArr, true)) {
    $key = array_search('3', $numArr);
    echo "Да, элемент 3 найден под номером: " . ($key+1);
} else {
    echo "Нет, элемент 3 не найден";
}

echo '<br>=================================================<br>';

// task 8
/* Даны два массива: первый с элементами 1, 2, 3, второй с элементами 'a', 'b', 'c'.
    Сделайте из них массив с элементами 1, 2, 3, 'a', 'b', 'c'. */
$numArr = [1, 2, 3];
$wordArr = ['a', 'b', 'c'];
var_dump($resultArr = array_merge($numArr, $wordArr) );

echo '<br>=================================================<br>';


// task 9
/* Дан массив 'a'=>1, 'b'=>2, 'c'=>3'.
    Запишите в массив $keys ключи из этого массива, а в $values – значения. */
$banana = ['a'=>1, 'b'=>2, 'c'=>3];
foreach($banana as $key => $value) {
    $keys[] = $key;
    $vals[] = $value;
}
var_dump( $keys );
var_dump( $vals );

echo '<br>=================================================<br>';


// task 10
/* Дан массив с элементами 'a', 'b', 'c', 'b', 'a'.
    Удалите из него повторяющиеся элементы. */
$doubleOhNo = ['a', 'b', 1, 'c', 'b', 1, 2, 'a'];
var_dump($doubleGood = array_unique($doubleOhNo));

echo '<br>=================================================<br>';


