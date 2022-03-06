<?php

namespace FitPass\PasswordGenerator\Facades;

use Illuminate\Support\Facades\Facade;

class PasswordGenerator extends Facade
{
    /**
     * Get the binding in the IoC container.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'password-generator';
    }
}
