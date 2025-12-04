<?php
echo "<h2>PHP Basics Demonstration</h2>";
$length = 10;
$width = 5;

$area = $length * $width;
$perimeter = 2 * ($length + $width);

echo "Area of Rectangle = $area<br>";
echo "Perimeter of Rectangle = $perimeter<br>";

$amount = 2000;

$vat = $amount * 0.15;

echo "VAT = $vat<br>";

$num = 17;

if($num % 2 == 0){
    echo "$num is Even";
} else {
    echo "$num is Odd";
}

$a = 20;
$b = 55;
$c = 32;

if($a >= $b && $a >= $c){
    echo "$a is the largest";
}
elseif($b >= $a && $b >= $c){
    echo "$b is the largest";
}
else{
    echo "$c is the largest";
}

for($i = 10; $i <= 100; $i++){
    if($i % 2 != 0){
        echo $i . " ";
    }
}

$arr = array(5, 12, 25, 7, 30);
$search = 25;
$found = false;

for($i = 0; $i < count($arr); $i++){
    if($arr[$i] == $search){
        echo "Element $search found at index $i";
        $found = true;
        break;
    }
}

if(!$found){
    echo "Element not found";
}

for($i = 1; $i <= 3; $i++){
    for($j = 1; $j <= $i; $j++){
        echo "* ";
    }
    echo "<br>";
}

for($i = 3; $i >= 1; $i--){
    for($j = 1; $j <= $i; $j++){
        echo $j . " ";
    }
    echo "<br>";
}

$ch = 'A';

for($i = 1; $i <= 3; $i++){
    for($j = 1; $j <= $i; $j++){
        echo $ch . " ";
        $ch++;
    }
    echo "<br>";
}
?>
