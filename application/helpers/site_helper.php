<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * SITE HELPERS
 * *
 * @package    CodeIgniter
 * @author    Cristian Triviño
 * @since    Version 1.0.0
 */

/**
 * print_pre function
 *
 * @access    public
 * @arr    arr
 * Muestra array con tabulaciones.
 */
if ( ! function_exists('print_pre'))
{
    function print_pre($arr)
    {
        echo "<pre>";
        print_r($arr);
        echo "</pre>";
    }
}

/**
 * date2mysql function
 *
 * @access    public
 * @date    date string
 * Convierte una fecha de formato ES a MySQL
 */
if ( ! function_exists('date2mysql'))
{
    function date2mysql($date) {
        $split = explode(" ", $date);
        return implode("-", array_reverse(explode("/", $split[0])));
    }
}

/**
 * date2mysqlwithtime function
 *
 * @access    public
 * @date    date string
 * Convierte una fecha de formato ES a MySQL añadiendo la hora
 */
if ( ! function_exists('date2mysqlwithtime'))
{
    function date2mysqlwithtime($date) {
        $split = explode(" ", $date);
        return implode("-", array_reverse(explode("/", $split[0]))). ' ' . $split[1];
    }
}

/**
 * date2esp function
 *
 * @access    public
 * @date    date string
 * Convierte una fecha de MySQL a ES
 */
if ( ! function_exists('date2esp'))
{
    function date2esp($date) {
        $split = explode(" ", $date);
        return implode("/", array_reverse(explode("-", $split[0])));
    }
}

/**
 * dateDiff function
 *
 * @access    public
 * @date    date string
 * @date    date string
 * Devuelve la diferencia de dias entre dos fechas
 */
if ( ! function_exists('dateDiff'))
{
    function dateDiff($d1, $d2) {
        return round(abs(strtotime($d1)-strtotime($d2))/86400);
    }
}

/**
 * number2esp function
 *
 * @access    public
 * @number    number
 * Convierte un numero de formato EN a ES
 */
if ( ! function_exists('number2esp'))
{
    function number2esp($number){
        return str_replace(".",",", $number);
    }
}

/**
 * number2sql function
 *
 * @access    public
 * @number    number
 * Convierte un numero de formato ES a EN
 */
if ( ! function_exists('number2sql'))
{
    function number2sql($number){
        return str_replace(",",".", $number);
    }
}

/**
 * format_price function
 *
 * @access    public
 * @number    number
 * Convierte un numero a formato ES con simbolo de €
 */
if ( ! function_exists('format_price'))
{
    function format_price($number) {
        return number_format($number, DIGITS_NUMBER, ',', '.').' €';
    }
}

/**
 * format_number function
 *
 * @access    public
 * @number    number
 * Convierte un numero a formato ES
 */
if ( ! function_exists('format_number'))
{
    function format_number($number) {
        return number_format($number, DIGITS_NUMBER, ',', '.');
    }
}