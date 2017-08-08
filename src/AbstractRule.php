<?php

namespace Rix\Validation;


abstract class AbstractRule
{

    abstract  public function validate($value, $key, $data);

    abstract public function message($key);
}