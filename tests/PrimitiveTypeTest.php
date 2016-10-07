<?php

namespace Test;

use Almendra\Validators\Types\Type;
use Almendra\Validators\Types\IntegerType;

abstract class PrimitiveTypeTest extends TypeTest
{
    
    /**
     * Get WRONG testing values for the specific type
     *
     * @return mixed
     */
    protected function getBadTestValues($howMany = 1, $min = 0, $max = 3)
    {
        for ($i = 0; $i < $howMany; $i++) {
            $testValues[] = $this -> getBadTestValue($min, $max);
        }

        return $testValues;
    }

    /**
     * Get testing values for the specific type
     *
     * @return mixed
     */
    protected function getTestValues($howMany = 1, $min = 0, $max = 3)
    {
        for ($i = 0; $i < $howMany; $i++) {
            $testValues[] = $this -> getTestValue($min, $max);
        }

        return $testValues;
    }


    protected function getBadTestValue($random)
    {
        throw new BadMethodCallException("Method 'getBadTestValue' must be implemented by the extending class");
    }

    /**
     * Get a single testing value for the specific type
     *
     * @return mixed
     */
    protected function getTestValue($min = 0, $max = 3)
    {
        throw new BadMethodCallException("Method 'getTestValue' must be implemented by the extending class");
    }
}
