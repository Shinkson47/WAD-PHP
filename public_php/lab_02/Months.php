<?php

$months = [
    "January",
    "Febuary",
    "March",
    "April",
    "May",
    "June",
    "July",
    "August",
    "September",
    "October",
    "November",
    "December"
    ];

foreach($months as &$month){
    echo $month;
}

$months = [
    'January' => "January",
    'February' => "February",
    'March' => "March",
    'April' => "April",
    'May' => "May",
    'June' => "June",
    'July' => "July",
    'August' => "August",
    'September' => "September",
    'October' => "October",
    'November' => "November",
    'December' => "December"
];

$array = array_values($months);
array_pop($array);      // remove last element from array.
array_shift($array);    // remove first element from array.
foreach($array as $month){
    echo $month;
}
