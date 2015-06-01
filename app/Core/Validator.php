<?php namespace App\Core;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Validator as LaravelValidator;

class Validator extends LaravelValidator {

    public function validateCurrentPassword($attribute, $value, $parameters)
    {
    	/**
    	 * regla de validación para comprobar que la clave actual del usuario es correcta
    	 *
    	 * validation rule for check that the password's user is ...
    	 */
        return Hash::check($value, Auth::user()->clave);
    }

}