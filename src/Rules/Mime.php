<?php

namespace Rix\Rules;


use Rix\Validation\AbstractRule;

class Mime extends AbstractRule
{
    protected $types;

    public function __construct(array $types)
    {
        $this->types = $types;
    }
    public function validate($val, $key, $data)
    {
        if(empty($val) || empty($this->types)) return true;
        $path = $this->getFilePath($val);
        if(empty($path)) return false;
        $type = mime_content_type($path);
        if(in_array($type, $this->types)) return true;
        return false;
    }
    public function getFilePath($val){
        if(is_array($val) && isset($val['tmp_name']))
        {
            return $val['tmp_name'];
        }
        elseif (is_object($val) && method_exists($val, 'path')){
            return $val->path();
        }
        return null;
    }
    public function message($key)
    {
        return 'invalid file type';
    }

}