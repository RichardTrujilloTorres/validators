<?php

namespace Almendra\Validators;

use Almendra\Validators\Interfaces\ValidatorInterface;
use Almendra\Validators\Traits\ArrayTrait;

/**
 * The validator.
 */
class Validator implements ValidatorInterface
{
    use ArrayTrait;

    public function getSupportedTypes()
    {
        return $this->register();
    }

    public function register()
    {
        return [
            \Almendra\Validators\Types\IntegerType::class => 'integer',
            \Almendra\Validators\Types\StringType::class => 'string',
            \Almendra\Validators\Types\FloatType::class => 'float',
            \Almendra\Validators\Types\DoubleType::class => 'double',
            \Almendra\Validators\Types\FileType::class => 'file',
        ];
    }

    public function __call($name, $values)
    {
        foreach ($this->register() as $type => $alias) {
            if ($alias == $name) {
                // call that method
                return $this->type = new $type(
                    $this->toArray($values)
                    );
            }
        }

        throw new \Exception('The called method is not defined or unsupported');
    }
}
