<?php

namespace Rix\Validation\Rules;

use Rix\Validation\AbstractRule;

class NotNull extends AbstractRule
{
    static $message = '{key} is null';

    public function __construct($opts=[])
    {

    }
    public function validate($value, $key, $data)
    {
        return $value !== null;
    }
    public function message($key)
    {
        return $key.' is null';
    }
}