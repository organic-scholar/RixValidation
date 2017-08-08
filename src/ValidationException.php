<?php
/**
 * Created by PhpStorm.
 * User: nauman
 * Date: 3/14/17
 * Time: 4:00 PM
 */

namespace Rix\Validation;


use Exception;

class ValidationException extends \Exception
{
    public $errors = [];

    public function __construct(array $errors)
    {
        $this->errors = $errors;
        parent::__construct('The given data failed to pass validation.');
    }

}