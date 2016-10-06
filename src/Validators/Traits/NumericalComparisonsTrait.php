<?php

namespace Almendra\Validators\Traits;

/**
 * Comparisons common to all numeric types.
 */
trait NumericalComparisonsTrait
{
    /**
     * Sets the minimum limit.
     *
     * @param numerical $limit The limit
     *
     * @return $self
     */
    public function min($limit)
    {
        $result = $this->compare($limit, '<');
        $this->setValid($result);

        return $this;
    }

    /**
     * Sets the maximum limit.
     *
     * @param numerical $limit The limit
     *
     * @return $self
     */
    public function max($limit)
    {
        $result = $this->compare($limit, '>');
        $this->setValid($result);

        return $this;
    }

    /**
     * Sets the limits at once.
     *
     * @param numerical $left  The bottom limit
     * @param numerical $right The upper limit
     *
     * @return $self
     */
    public function range($left, $right)
    {
        return $this->min($left)->max($right);
    }
}
