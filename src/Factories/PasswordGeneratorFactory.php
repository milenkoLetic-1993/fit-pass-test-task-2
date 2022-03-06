<?php

namespace FitPass\PasswordGenerator\Factories;

use FitPass\PasswordGenerator\Enums\PasswordStrength;
use FitPass\PasswordGenerator\Contracts\PasswordGenerator;
use FitPass\PasswordGenerator\PasswordGenerators\NullPasswordGenerator;

class PasswordGeneratorFactory
{
    CONST NAMESPACE = 'FitPass\\PasswordGenerator\\PasswordGenerators\\';

    public function getPasswordGenerator(int $strength): PasswordGenerator
    {
        $passwordSymbolGenerator = $this->getClass(PasswordStrength::getStrengthMapper($strength));

        if (class_exists($passwordSymbolGenerator)) {
            return new $passwordSymbolGenerator();
        }

        return new NullPasswordGenerator();
    }

    protected function getClass(string $strength): string
    {
        return self::NAMESPACE . ucfirst($strength) . 'PasswordGenerator';
    }
}
