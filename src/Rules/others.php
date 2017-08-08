<?php

namespace Rix\Validation\Rules;

use Rix\Validation\Validator;

function callback(callable $func){
    return $func();
};
