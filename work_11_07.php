<?php

// task 1
$goodsCart = [
  ['name' => 'Honda', 'price' => '3500', 'quantity' => 1],
  ['name' => 'Mazda', 'price' => '5500', 'quantity' => 1],
  ['name' => 'Zaporozhets', 'price' => '500', 'quantity' => 4],
  ['name' => 'Lada Kalina', 'price' => '1200', 'quantity' => 2]
];

function cartCount( $goodsCart ) {
    $cartTotalCount = ['price' => 0, 'quantity' => 0];
    foreach ($goodsCart as $goodsCartItem) {
        $cartTotalCount['price'] += (int) $goodsCartItem['price'] * (int) $goodsCartItem['quantity'];
        $cartTotalCount['quantity'] += (int) $goodsCartItem['quantity'];
    }
    return $cartTotalCount;
}
$cartTotal = cartCount( $goodsCart );
echo 'Общая цена: ' . $cartTotal['price'] . 'у.е.<br>';
echo 'Кол-во: ' . $cartTotal['quantity'] . 'шт.<br>';


// task 2
//a * x^2 + b * x - 10 = 0
function discriminantis($a, $b, $c) {
    $discr = pow($b, 2) - 4 * ($a * $c);
    $disctArr = array();
    if( $discr > 0 ) {
        return $disctArr = $discr;
    } elseif( $discr === 0 ) {
        return $disctArr = $discr;
    } else {
        return $disctArr = $discr;
    }
}
echo 'Дискриминант: ' . discriminantis(2, 5, 5);


// task3
$digits = array(2, -10, -2, 4, 5, 1, 6, -200, 200, 1.6, 95);
function deleteNegative( $digits ) {
    foreach ($digits as $number) {
        if( $number > 0 ) {
            $digitsItem[] = array($number);
        }
    }
    return $digitsItem;
}
echo '<pre>';
print_r(deleteNegative( $digits ));
echo '</pre>';

// task 4
function deleteNegativeSecond( &$digits ) {
    foreach ($digits as $key => $number) {
        if( $number < 0 ) {
            unset($digits[$key]);
        }
    }
    return $digits;
}
$digitsSecond = array(2, -10, -2, -4, -5, -1, -6, -200, 200, 95);
echo '<pre>====================================================<br>';
print_r(deleteNegativeSecond( $digitsSecond ) );
print_r($digitsSecond);
echo '</pre>';