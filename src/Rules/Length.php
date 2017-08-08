<?php

namespace Rix\Validation;

use Rix\Validation\AbstractRule;

class Length extends AbstractRule
{
    protected $error;

    public $min;

    public $max;

    public function __construct($min, $max)
    {
        $this->min = $min;
        $this->max = $max;
    }
    public function validate($val, $key, $data)
    {
        if(empty($val)) return true;
        if(isset($this->min) && strlen($val) < $this->min){
            $this->error = 'min';
            return false;
        }
        if(isset($this->max) && strlen($val) > $this->max){
            return false;
        }
        return true;
    }
    public function message($key)
    {
        if($this->error === 'min'){
            return $key.' is too short use at least '.$this->min.' characters.';
        }
        return $key.' too long '.$this->max.' characters allowed';
    }

}