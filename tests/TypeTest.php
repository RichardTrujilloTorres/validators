<?php

namespace Test;

use Almendra\Validators\Types\Type;

abstract class TypeTest extends \PHPUnit_Framework_TestCase
{
    
    /**
     * Attempts to build an specific type
     *
     * @param mixed $type
     * @return boolean
     */
    public function make($type, $args = [])
    {
        try {
            $result = new $type($args);
        } catch (\InvalidArgumentException $e) {
            return false;
        }

        return $result;
    }
    
    /**
     * Get testing values for the specific type
     *
     * @return mixed
     */
    protected function getTestValues()
    {
        throw new \BadMethodCallException("Method 'getTestValues' should be implemented by the extending class");
    }

    /**
     * Get a single testing value for the specific type
     *
     * @return mixed
     */
    protected function getTestValue($min = 0, $max = 100)
    {
        throw new \BadMethodCallException("Method 'getTestValue' should be implemented by the extending class");
    }
}
