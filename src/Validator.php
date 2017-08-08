<?php

namespace Rix\Validation;

function validate($data, $rules){
    return Validator::validate($data, $rules);
}

class Validator
{
    protected static $validators = [];

    public static function validate($data , $rules)
    {
        $errors = [];
        foreach ($rules as $key => $r){
            $val = isset($data[$key]) ? $data[$key] : null;
            foreach ($r as $rule){
                $result = $rule($val, $key, $data);
                if(!is_null($result)){
                    $errors[$key][] = $result;
                }
            }
        }
        if(count($errors))
            throw new ValidationException($errors);
        return true;
    }
    public static function only()
    {

    }
}
