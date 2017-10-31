<?php

namespace Rix\Validation\Rules;

use Rix\Validation\AbstractRule;

class FileSize extends AbstractRule
{
    protected $size;

    public function __construct($size)
    {
        $this->size = 1048576 * $size;
    }
    public function validate($val, $key, $data)
    {
        if(empty($val)) return true;
        $size = $this->getSize($val);
        if($size > $this->size){
            return false;
        }
        return true;
    }
    public function getSize($val)
    {
        if(is_array($val) && isset($val['tmp_name']))
        {
            return $val['size'];
        }
        elseif (is_object($val) && method_exists($val, 'path')){
            return $val->getSize();
        }
        return null;
    }
    public function message($key)
    {
        return 'file size is too large';
    }
}