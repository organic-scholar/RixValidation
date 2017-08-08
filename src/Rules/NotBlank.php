<?php

namespace Rix\Validation\Rules;

use Rix\Validation\AbstractRule;

class NotBlank extends AbstractRule
{

    public function __construct($opts=[])
    {

    }
    public function validate($value, $key, $data)
    {
        return !empty($value);
    }
    public function message($key)
    {
        return $key." is required";
    }
}