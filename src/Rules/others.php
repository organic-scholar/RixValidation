<?php

namespace Rix\Validation\Rules;

use DateTime;
use Rix\Validation\Validator;

function callback(callable $func){
    return $func();
};
function date($format='Y-m-d')
{
    return function($val, $key, $data) use ($format) {
        $d = DateTime::createFromFormat($format, $val);
        if($d && $d->format($format) != $val){
            return 'invalid date format';
        }
    };
}

function notBefore($otherVal=null, $format)
{
    return function($val, $key, $data) use ($otherVal, $format) {
        if(!empty($val) && !isset($otherVal)) return;
        $date = DateTime::createFromFormat($format, $val);
        $otherDate = DateTime::createFromFormat($format, $otherVal);
        if($date < $otherDate){
            return "${key} must be before";
        }
    };
}
