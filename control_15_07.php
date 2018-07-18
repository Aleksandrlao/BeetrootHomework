<?php

/* Написать функцию которая будет выводить четные и нечетные элементы массива.
 * ПО умолчанию четные */

$numberArr = ['1', '2', '3', '4', '5', '6', '7'];
function numberKeys($number) {
    if( is_array($number) ) {
        foreach ($number as $item) {
            if( is_numeric($item) && !($item % 2) ) {
                $two[] = $item;
            } else {
                $one[] = $item;
            }
        }
        return $all = array_merge( $two, $one);
    } else {
        if( is_numeric($number) && !($number % 2) ) {
            return $number;
        } else {
            return $number = 'Ни одно условие не сработало!';
        }
    }
}
echo '<pre>';
print_r( numberKeys($numberArr) );
echo '<br>=================================================<br>';
print_r( numberKeys(2) );
echo '<br>=================================================<br>';
print_r( numberKeys(5) );
echo '</pre>';



// Филип
function checkOddAll( $array, $param = true ) {
    foreach ($array as $value) {
        if( $param && !($value % 2 ) ) {
            echo $value . '<br>';
        } elseif ( !$param && $value % 2 ) {
            echo $value . '<br>';
        }
    }
}
checkOddAll($numberArr);




