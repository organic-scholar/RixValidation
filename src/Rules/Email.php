<?php

namespace Rix\Validation\Rules;

use Rix\Validation\AbstractRule;

class Email extends AbstractRule
{

    public function __construct($opts=[])
    {

    }
    public function validate($val, $key, $data)
    {
        if(empty($val)) return true;
        if(!filter_var($val, FILTER_VALIDATE_EMAIL)){
            return false;
        }
        return true;
    }
    public function message($key)
    {
        return "$key is not valid email address";
    }
}