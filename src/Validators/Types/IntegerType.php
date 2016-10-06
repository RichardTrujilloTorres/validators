<?php

namespace Almendra\Validators\Types;

use Almendra\Validators\Interfaces\TypeInterface;
use Almendra\Validators\Interfaces\ComparisonInterface;
use Almendra\Validators\Traits\NumericalComparisonsTrait;

/**
  * Abstracts an integer type.
  */
 class IntegerType extends PrimitiveType implements TypeInterface, ComparisonInterface
 {
     use NumericalComparisonsTrait;

     protected $name = 'integer';
 }
