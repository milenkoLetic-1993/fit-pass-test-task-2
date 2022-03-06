<?php

namespace FitPass\PasswordGenerator\Enums;

enum PasswordSymbol
{
    const UPPERCASE_LETTERS = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    const LOWERCASE_LETTERS = 'abcdefghijklmnopqrstuvwxyz';
    const RANDOM_NUMBERS = 2345;
    const SPECIAL_CHARACTERS = '!#$%&(){}[]=';

    const UPPERCASE_LETTERS_LENGTH = 2;
    const LOWERCASE_LETTERS_LENGTH = 1;
    const RANDOM_NUMBERS_LENGTH = 1;
    const SPECIAL_CHARACTERS_LENGTH = 1;

    public static function getAvailableSymbols(): string
    {
        return self::UPPERCASE_LETTERS . self::LOWERCASE_LETTERS . self::RANDOM_NUMBERS . self::SPECIAL_CHARACTERS;
    }
}
