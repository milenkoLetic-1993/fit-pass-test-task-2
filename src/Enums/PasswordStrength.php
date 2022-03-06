<?php

namespace FitPass\PasswordGenerator\Enums;

enum PasswordStrength
{
    const WEAK = 'weak';
    const MEDIUM = 'medium';
    const STRONG = 'strong';

    const STRENGTH_MAPPER = [
        1 => self::WEAK,
        2 => self::MEDIUM,
        3 => self::STRONG
    ];

    public static function getStrengthMapper(int $strength): string
    {
        return self::STRENGTH_MAPPER[$strength];
    }
}
