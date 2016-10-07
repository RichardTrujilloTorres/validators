<?php

namespace Almendra\Validators\Types;

use Almendra\Validators\Interfaces\TypeInterface;
use Almendra\Validators\Interfaces\ComparisonInterface;

/**
  * Abstracts a primitive type and the operations related to it.
  */
 abstract class PrimitiveType extends Type implements TypeInterface, ComparisonInterface
 {
     public function compare($limit, $operator, $modifier = null)
     {
         $result = $this->inArray(
            $this->getValue(),
            $limit,
            function ($value, $limit) use ($operator, $modifier) {
                if ($modifier) {
                    $value = $modifier($value);
                }

                if (eval("return ($value $operator $limit);")) {
                    return false;
                }

                return true;
            }, true);

         return $result;
     }

    /**
     * Is the value type the same of this object?
     *
     * @param mixed $value The value to check
     *
     * @return bool
     */
    public function checkType($value)
    {
        if (isset($this->name) && null !== $this->name) {
            $fn = 'is_'.$this->name;

            return $fn($value);
        }

        throw new \Exception('Invalid name or name not defined for primitive type.');
    }

     public function validate()
     {
         return $this->getValid();
     }
 }
