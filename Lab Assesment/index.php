<?php
echo"<h2>Area and Perimeter of a Rectangle</h2>";
$length = 15;
$width = 5;
$area =  $length * $width;
$perimeter = 2*($length + $width);
 
echo "Length:$length<br>";
echo "Width:$width<br>";
echo "Area of Rectangle:$area<br>";
echo "Perimeter of Rectangle:$perimeter<br>";
 
echo "<h2>VAT Calculation(15%)</h2>";
$amount = 15000;
$vat = 0.15*$amount;
$total = $amount+$vat;
 
echo "Amount:$amount<br>";
echo "VAT(15%):$vat<br>";
echo "Total Amount(with VAT):$total<br>";
 
echo "<h2> Odd or Even Number check</h2>";
$num=15;
if($num % 2 == 0){
    echo "$num is Even";
}
else{
    echo"$num is Odd";
}
 
echo "<h2> Largest among three numbers</h2>";
$a = 12;
$b = 25;
$c = 9;
 
if ($a >= $b && $a >= $c) {
    echo "$a is the largest";
} elseif ($b >= $a && $b >= $c) {
    echo "$b is the largest";
} else {
    echo "$c is the largest";
}
 
echo"<Print Odd numbers between 10 and 100</h2>";
for ($i = 10; $i <= 100; $i++) {
    if ($i % 2 != 0) {
        echo $i . " ";
    }
}
echo"<br><br>";
 
 
echo "<Search an element in an array</h2>";
$numbers = array(10, 25, 30, 45, 50);
$search = 30;
$found = false;
 
for ($i = 0; $i < count($numbers); $i++) {
    if ($numbers[$i] == $search) {
        $found = true;
        break;
    }
}
 
if ($found) {
    echo "$search found in the array<br>";
} else {
    echo "$search not found in the array<br>";
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
