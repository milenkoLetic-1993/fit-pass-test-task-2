<?php

namespace FitPass\PasswordGenerator\PasswordGenerators;

use Exception;
use FitPass\PasswordGenerator\Contracts\PasswordGenerator;
use FitPass\PasswordGenerator\Enums\PasswordSymbol;

abstract class BasePasswordGenerator implements PasswordGenerator
{
    abstract public function generatePassword(int $length): string;

    /**
     * @throws Exception
     */
    protected function generateRandomString(string $symbols, int $length): string
    {
        $randomString = '';

        while (strlen($randomString) < $length) {
            $randomString .= $symbols[random_int(0, strlen($symbols) - 1)];
        }

        return $randomString;
    }

    /**
     * @throws Exception
     */
    protected function generateStrengthPassword(string $strength, int $length): string
    {
        $strengthRules = config('passwordgenerator.strength_rules.' . $strength);
        $password = '';

        foreach ($strengthRules as $rule) {
            $password .= $this->generateRandomString($rule['symbols'], $rule['length']);
        }

        $password .= $this->generateRandomString(PasswordSymbol::getAvailableSymbols(), $length - strlen($password));

        return str_shuffle($password);
    }
}
