<?php

namespace App\Validators;

use Auth;

/**
 * Class InstituteValidator
 */
class InstituteValidator
{
    function manageable($attribute, $value, $parameters, $validator)
    {
        if(access()->allow('manage-institutes')) {
            return true;
        }

        return $value == acess()->user()->institute_id;
    }
}
