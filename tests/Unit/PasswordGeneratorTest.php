<?php

use FitPass\PasswordGenerator\Tests\TestCase;
use FitPass\PasswordGenerator\Facades\PasswordGenerator;
use FitPass\PasswordGenerator\Enums\PasswordSymbol;

class PasswordGeneratorTest extends TestCase
{
    private int $upperCaseLettersCounter = 0;
    private int $lowerCaseLettersCounter = 0;
    private int $specialCharactersCounter = 0;
    private int $randomNumbersCounter = 0;

    const LENGTH = 15;

    public function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub

        $this->upperCaseLettersCounter = 0;
        $this->lowerCaseLettersCounter = 0;
        $this->specialCharactersCounter = 0;
        $this->randomNumbersCounter = 0;
    }

    public function testGenerateWeakPassword()
    {
        $password = PasswordGenerator::generate(1, self::LENGTH);

        $this->checkIfPasswordIsGeneratedCorrectly($password);

        $this->assertTrue($this->upperCaseLettersCounter >= PasswordSymbol::UPPERCASE_LETTERS_LENGTH);
        $this->assertTrue($this->lowerCaseLettersCounter >= PasswordSymbol::LOWERCASE_LETTERS_LENGTH);
        $this->assertTrue($this->randomNumbersCounter >= 0);
        $this->assertTrue($this->specialCharactersCounter >= 0);
        $this->assertEquals(self::LENGTH, strlen($password));
    }

    public function testGenerateMediumPassword()
    {
        $password = PasswordGenerator::generate(2, self::LENGTH);

        $this->checkIfPasswordIsGeneratedCorrectly($password);

        $this->assertTrue($this->upperCaseLettersCounter >= PasswordSymbol::UPPERCASE_LETTERS_LENGTH);
        $this->assertTrue($this->lowerCaseLettersCounter >= PasswordSymbol::LOWERCASE_LETTERS_LENGTH);
        $this->assertTrue($this->randomNumbersCounter >= PasswordSymbol::RANDOM_NUMBERS_LENGTH);
        $this->assertTrue($this->specialCharactersCounter >= 0);
        $this->assertEquals(self::LENGTH, strlen($password));
    }

    public function testGenerateStrongPassword()
    {
        $password = PasswordGenerator::generate(3, self::LENGTH);

        $this->checkIfPasswordIsGeneratedCorrectly($password);

        $this->assertTrue($this->upperCaseLettersCounter >= 0);
        $this->assertTrue($this->lowerCaseLettersCounter >= 0);
        $this->assertTrue($this->randomNumbersCounter >= 0);
        $this->assertTrue($this->specialCharactersCounter >= PasswordSymbol::SPECIAL_CHARACTERS_LENGTH);
        $this->assertEquals(self::LENGTH, strlen($password));
    }

    private function checkIfPasswordIsGeneratedCorrectly(string $password)
    {
        for ($i = 0; $i < strlen($password); $i++) {
            if ($password[$i] === strtoupper($password[$i])) {
                $this->upperCaseLettersCounter++;
            }

            if ($password[$i] === strtolower($password[$i])) {
                $this->lowerCaseLettersCounter++;
            }

            if (in_array($password[$i], str_split(PasswordSymbol::RANDOM_NUMBERS))) {
                $this->randomNumbersCounter++;
            }

            if (in_array($password[$i], str_split(PasswordSymbol::SPECIAL_CHARACTERS))) {
                $this->specialCharactersCounter++;
            }
        }
    }
}
