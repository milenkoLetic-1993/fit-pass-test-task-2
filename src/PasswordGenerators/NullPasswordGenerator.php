<?php

namespace FitPass\PasswordGenerator\PasswordGenerators;

use FitPass\PasswordGenerator\Contracts\PasswordGenerator;

class NullPasswordGenerator extends BasePasswordGenerator implements PasswordGenerator
{

    public function generatePassword(int $length): string
    {
        // handle error
        logger()->error('Generator for selected strength is missing.');

        return '';
    }
}
