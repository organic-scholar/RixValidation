<?php

namespace Rix\Validation;


class Validator
{

    public static function validate($data , $rules)
    {
        $errors = [];
        foreach ($rules as $key => $r){
            $val = isset($data[$key]) ? $data[$key] : null;
            foreach ($r as $rule){
                $result = null;
                if(is_callable($rule)){
                    $result = $rule($val, $key, $data);
                }
                else if($rule instanceof AbstractRule) {
                    if(false === $rule->validate($val, $key, $data)){
                        $result = $rule->message($key);
                    }
                }
                else {
                    throw new \Exception("Invalid validation rule ${rule}");
                }
                if(!is_null($result)){
                    $errors[$key][] = $result;
                }
            }
        }
        if(count($errors)){
            throw new ValidationException($errors);
        }
    }
    public static function only()
    {

    }
}
