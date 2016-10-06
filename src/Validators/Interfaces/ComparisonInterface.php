<?php

namespace Almendra\Validators\Interfaces;

/**
 * The comparison interface.
 */
interface ComparisonInterface
{
    public function compare($limit, $operation, $modifier = null);
}
