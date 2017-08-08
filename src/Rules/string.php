<?php

namespace Rix\Validation\Rules;

use Rix\Validation\Validator;

function length($min, $max){
    return function($val, $key, $data) use ($min, $max) {
        if($val == '' || $val == null) return null;
        if(isset($min) && strlen($val) < $min){
            return $key.' is too short use at least '.$min.' characters.';
        }
        if(isset($max) && strlen($val) > $max){
            return $key.' too long '.$max.' characters allowed';
        }
    };
}

function email(){
    return function($val, $key){
        if($val === '' || $val === null) return null;
        if(!filter_var($val, FILTER_VALIDATE_EMAIL)){
            return 'This is not valid email address';
        }
    };
}
