<?php

namespace Rix\Validation\Rules;

use Rix\Validation\AbstractRule;

class AlphaNum extends AbstractRule
{

    public function __construct($opts=[])
    {

    }
    public function validate($val, $key, $data)
    {
        if(empty($val)) return true;
        if(ctype_alnum($val)) return true;
        return false;
    }
    public function message($key)
    {
        return "$key contains invalid characters";
    }
}