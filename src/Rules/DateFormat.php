<?php

namespace Rix\Validation\Rules;


use DateTime;
use Rix\Validation\AbstractRule;

class DateFormat extends AbstractRule
{
    protected $format;

    public function __construct($format='Y-m-d')
    {
        $this->format = $format;
    }
    public function validate($val, $key, $data)
    {
        $d = DateTime::createFromFormat($this->format, $val);
        if($d && $d->format($this->format) != $val){
            return false;
        }
        return true;
    }
    public function message($key)
    {
        return 'invalid date format';
    }
}