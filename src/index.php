<?php

var_dump(1 + 1);
var_dump(1 - 2);
var_dump(2 * 2);
var_dump(1 / 2);
var_dump(3 % 2);
var_dump(3 ** 2);

echo('</br>');

var_dump(gettype(1));
var_dump(gettype(1.3));
var_dump(gettype('sdsds'));
var_dump(gettype(true));
var_dump(gettype([]));
var_dump(gettype(new \stdClass()));
var_dump(gettype(function () {}));


echo('</br>');

var_dump(('sdsds'));
var_dump(('sds\'ds'));
var_dump(("sdsds"));
var_dump(("sds\"ds"));
$variable = 'var';
var_dump(gettype("sdsds {$variable}"));

echo('</br>');

var_dump('Hello ' . $variable);
var_dump(1 . ' string');

echo('</br>');

var_dump(gettype((string) 1));
var_dump(((string) 1));
var_dump(((bool) 1));
var_dump(((bool) 0));
var_dump(((bool) []));
var_dump(((bool) null));
var_dump(((bool) '0'));
var_dump(((bool) $variable));

echo('</br>');

$someName = 1;
$someName2 = 'sdasdasda';
$someName2 = 2;

const PI = 3.14;

var_dump(PHP_INT_MAX);
var_dump(__FILE__);
var_dump(__LINE__);

echo('</br>');
echo('</br>');

$count = 3;
if ($count === 1) {
    echo 'COUNT 1';
} else if ($count === 2) {
    echo 'COUNT 2';
} elseif ($count === 3) {
    echo 'COUNT 3';
} else {
    echo 'COUNT is not 1';
}

echo('</br>');
echo('</br>');

$count = 4;
echo($count === 3 ? '3' : 'not 3');
echo('</br>');

$var1 = null;
$var2 = 'zfdsfsdfsd';

echo($var1 ?: $var2);
echo($var1 ?? $var2);


echo('</br>');
echo('</br>');

$i = 1;
while ($i < 12) {
    if ($i === 1) {
        $i += 2;
        continue;
    }

    if ($i === 7) {
        break;
    }

    echo $i;
    $i += 2;
}

echo('</br>');
echo('</br>');

for ($i = 1; $i<=10; $i++) {
    echo $i;
}

echo('</br>');
echo('</br>');

$array = [1, 2, 4, 5];

foreach ($array as $value) {
//    var_dump($value);
//    echo '</br>';
}

foreach ($array as $key => $value) {
//    echo($key . ' ' . $value);
//    echo '</br>';
}

echo('</br>');
echo('</br>');

$array = [1, 2, 4, 5];
$associativeArray = [
    'name' => 'Evgenii',
    'surname' => 'Tarasenko',
    'contacts' => [
        'phone' => '231231231',
        'email' => 'dasdsa@sdfds.sdfasd'
    ],
];

foreach ($associativeArray as $key => $value) {
    if (is_array($value)) {
        foreach ($value as $key1 => $value1) {
//            echo($key1 . ': ' . $value1);
//            echo '</br>';
        }

        continue;
    }

    echo($key . ': ' . $value);
    echo '</br>';
}


echo('</br>');
echo('</br>');


$varNew = 1;
//echo $varNew;


/**
 * Function description
 *
 * @param string $name
 * @param ?array $recipients
 * @return array|null
 */
function sayHello(string $name = 'Test', ?array $recipients = []): ?array
{
    echo 'Hello ' . $name . '</br>';

    if (rand(1, 2) == 1) {
        return null;
    }

    return [];
}

//var_dump(sayHello());
sayHello('Evgenii', [1, 2, 3, 4]);
sayHello(1);
