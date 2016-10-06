<?php

namespace Almendra\Validators\Interfaces;

/**
 * The Type contract.
 */
interface TypeInterface
{
    public function isValid(array $value);

    public function checkType($value);

    public function validate();
}
