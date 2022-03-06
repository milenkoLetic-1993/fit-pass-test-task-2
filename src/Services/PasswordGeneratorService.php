<?php

namespace FitPass\PasswordGenerator\Services;

use FitPass\PasswordGenerator\Enums\PasswordStrength;
use FitPass\PasswordGenerator\Factories\PasswordGeneratorFactory;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Exception;

class PasswordGeneratorService
{
    public function __construct(protected PasswordGeneratorFactory $factory) {}

    /**
     * @throws ValidationException
     * @throws Exception
     */
    public function generate(int $strength, int $length = 6): string
    {
        $this->validate(get_defined_vars());

        return $this->factory->getPasswordGenerator($strength)->generatePassword($length);
    }

    /**
     * @throws ValidationException
     */
    protected function validate(array $data)
    {
        Validator::make($data, [
            'strength' => ['required', 'int', Rule::in(array_keys(PasswordStrength::STRENGTH_MAPPER))],
            'length' => ['required', 'int', 'min:6']
        ])->validate();
    }
}
