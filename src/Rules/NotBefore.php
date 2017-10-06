<?php

namespace Rix\Validation\Rules;


use DateTime;
use Rix\Validation\AbstractRule;

class NotBefore extends AbstractRule
{
    protected $format;
    /**
     * @var
     */
    private $before;

    public function __construct($before, $format='Y-m-d')
    {
        $this->format = $format;
        $this->before = $before;
    }
    public function validate($value, $key, $data)
    {
        if(!empty($val) && !isset($this->before)) return true;
        $date = DateTime::createFromFormat($this->format, $value);
        $otherDate = DateTime::createFromFormat($this->format, $this->before);
        return $date < $otherDate ? false : true;
    }
    public function message($key)
    {
        return "${key} must be before";

    }
}