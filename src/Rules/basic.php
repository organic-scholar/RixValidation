<?php

namespace Rix\Validation\Rules;

function notBlank(){
    return function($val, $key){
        if($val === '' || $val === null){
            return "{$key} is required";
        }
    };
}

function notNull(){
    return function($val, $key){
        if($val === null){
            return "${key} cannot be null";
        }
    };
}


function isFalse(){
    return function($val){
        if($val !== false){
            return "is not a false value";
        }
    };
}

