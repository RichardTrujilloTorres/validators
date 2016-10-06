<?php

namespace Almendra\Validators\Traits;

/**
 * A group of helpers.
 *
 * @param type name 		description
 *
 * @return type description
 */
trait ArrayTrait
{
    /**
     * Performs an operation in a given array.
     * It stops if 'strict' is set to true and the result of the operation is false.
     *
     * @param array    $values The array
     * @param mixed    $args   The arguments to pass to the operation
     * @param callable $do     The operation
     *
     * @return bool
     */
    public function inArray($values, $args, $do, $strict = false)
    {
        if (!is_callable($do)) {
            throw new \InvalidArgumentException('Third argument must be a callable');
        }

        foreach ($values as $single) {
            $result = $do($single, $args);
            if ($strict && !$result) {
                break;
            }
        }

        return $result;
    }

    /**
     * Eliminate nested array when passing parameters.
     *
     * @param array $value The array to eliminate layer up
     *
     * @return array
     */
    protected function toArray($value)
    {
        if (is_array($value[0])) {
            $value = $value[0];
        }

        return $value;
    }
}
