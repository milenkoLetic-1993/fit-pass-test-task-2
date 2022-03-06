<?php

namespace FitPass\PasswordGenerator\Contracts;

interface PasswordGenerator
{
    public function generatePassword(int $length): string;
}
