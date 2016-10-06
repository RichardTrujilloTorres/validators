<?php

namespace Almendra\Validators\Interfaces;

/**
 * The validator interface.
 */
interface ValidatorInterface
{
    public function register();

    public function getSupportedTypes();
}
