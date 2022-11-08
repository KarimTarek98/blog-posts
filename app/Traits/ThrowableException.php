<?php

namespace App\Traits;
use Illuminate\Validation\ValidationException;
trait ThrowableException
{
    public function throwValidationException($msg)
    {
        throw ValidationException::withMessages([
            'email' => $msg
        ]);
    }
}
