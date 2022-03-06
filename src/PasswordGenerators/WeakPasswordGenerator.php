<?php

namespace FitPass\PasswordGenerator\PasswordGenerators;

use FitPass\PasswordGenerator\Enums\PasswordStrength;
use FitPass\PasswordGenerator\Contracts\PasswordGenerator;
use Exception;

class WeakPasswordGenerator extends BasePasswordGenerator implements PasswordGenerator
{
    /**
     * @throws Exception
     */
    public function generatePassword(int $length): string
    {
        return $this->generateStrengthPassword(PasswordStrength::WEAK, $length);
    }
}
