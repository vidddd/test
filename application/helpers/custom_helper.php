<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function dateDiff($d1, $d2, $inclusiv = false) {
  return round(abs(strtotime($d1)-strtotime($d2))/86400) + (($inclusiv)?1:0);

}

function number2esp($number){
  return str_replace(".",",", $number);
}
function number2sql($number){
  return str_replace(",",".", $number);
}

function print_pre($obj) {
    echo '<pre>';
    print_r($obj);
    echo '</pre>';
}


function date2mysql($date) {
    $split = explode(" ", $date);
    return implode("-", array_reverse(explode("/", $split[0])));
}

function date2mysqlwithtime($date) {
    $split = explode(" ", $date);
    return implode("-", array_reverse(explode("/", $split[0]))). ' ' . $split[1];
}
function date2esp($date) {
    $split = explode(" ", $date);
    return implode("/", array_reverse(explode("-", $split[0])));
}
function getNameMonth($month) {
    $months = array(1 => 'Enero', 2 => 'Febrero', 3 => 'Marzo', 4 => 'Abril', 5 => 'Mayo', 6 => 'Junio', 7 => 'Julio', 8 => 'Agosto', 9 => 'Septiembre', 10 => 'Octubre', 11 => 'Noviembre', 12 => 'Diciembre');

    return $months[$month];
}

