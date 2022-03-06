<?php

use FitPass\PasswordGenerator\Enums\PasswordStrength;
use FitPass\PasswordGenerator\Enums\PasswordSymbol;

return [
    'strength_rules' => [
        PasswordStrength::WEAK => [
            [
                'symbols' => PasswordSymbol::UPPERCASE_LETTERS,
                'length' => PasswordSymbol::UPPERCASE_LETTERS_LENGTH
            ],
            [
                'symbols' => PasswordSymbol::LOWERCASE_LETTERS,
                'length' => PasswordSymbol::LOWERCASE_LETTERS_LENGTH
            ]
        ],
        PasswordStrength::MEDIUM => [
            [
                'symbols' => PasswordSymbol::UPPERCASE_LETTERS,
                'length' => PasswordSymbol::UPPERCASE_LETTERS_LENGTH
            ],
            [
                'symbols' => PasswordSymbol::LOWERCASE_LETTERS,
                'length' => PasswordSymbol::LOWERCASE_LETTERS_LENGTH
            ],
            [
                'symbols' => PasswordSymbol::RANDOM_NUMBERS,
                'length' => PasswordSymbol::RANDOM_NUMBERS_LENGTH
            ]
        ],
        PasswordStrength::STRONG => [
            [
                'symbols' => PasswordSymbol::SPECIAL_CHARACTERS,
                'length' => PasswordSymbol::SPECIAL_CHARACTERS_LENGTH
            ]
        ],
    ]
];
