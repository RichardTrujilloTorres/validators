<?php

namespace Test;

use Almendra\Validators\Types\Type;
use Almendra\Validators\Types\IntegerType;

class IntegerTypeTest extends PrimitiveTypeTest
{
 
    /** @test  */
    public function it_accepts_only_integers()
    {
        $type = $this -> make('Almendra\Validators\Types\IntegerType', $this -> getBadTestValues(1));

        $this -> assertEquals($type, false);
    }

    /** @test  */
    public function type_checking_matches()
    {
        $type = $this -> make('Almendra\Validators\Types\IntegerType', $this -> getTestValues(1));

        // fails
        $this -> assertEquals($type -> checkType('string type'), false);

        // passes
        $this -> assertEquals($type -> checkType($this -> getTestValue(1)), true);
    }

    /** @test  */
    public function min_limit_works()
    {
        $dummyValue = $this -> getTestValue(1);
        $offset = 100; // random excess
        $type = $this -> make('Almendra\Validators\Types\IntegerType', [$dummyValue]);

        $invalid = $type -> min($dummyValue + $offset) -> getValid();

        // fails
        $this -> assertEquals($invalid, false);
    }

    /** @test  */
    public function max_limit_works()
    {
        $dummyValue = $this -> getTestValue(1);
        $offset = 100; // random excess
        $type = $this -> make('Almendra\Validators\Types\IntegerType', [$dummyValue]);

        $invalid = $type -> max($dummyValue - $offset) -> getValid();

        // fails
        $this -> assertEquals($invalid, false);
    }

    /**
     * Get a single WRONG testing value for the specific type
     *
     * @return mixed
     */
    protected function getBadTestValue($min = 0, $max = 3)
    {
        // here you can play with what you want to pass
        return $this -> getBadValue(random_int($min, $max));
    }

    /**
     * Get a single testing value for the specific type
     *
     * @return mixed
     */
    protected function getTestValue($min = 0, $max = 3)
    {
        // here you can play with what you want to pass
        return random_int($min, $max);
    }

    protected function getBadValue($random)
    {
        return $this -> getStub()[$random];
    }

    protected function getStub()
    {
        return [
            'string',
            12.23, // double
            12.1, // float
            'string',
            12.23, // double
            12.1, // float
            'string',
            12.23, // double
            12.1, // float
            'string',
            12.23, // double
            12.1, // float
            ];
    }
}
