<?php

namespace Almendra\Validators\Types;

use Almendra\Validators\Interfaces\TypeInterface;
use Almendra\Validators\Interfaces\ComparisonInterface;

/**
  * Abstracts a string type.
  */
 class StringType extends PrimitiveType implements TypeInterface, ComparisonInterface
 {
     protected $name = 'string';

     public function min($limit)
     {
         $result = $this->compare($limit, '<', 'strlen');
         $this->setValid($result);

         return $this;
     }

     public function max($limit)
     {
         $result = $this->compare($limit, '>', 'strlen');
         $this->setValid($result);

         return $this;
     }

     public function range($left, $right)
     {
         return $this->min($left)->max($right);
     }
 }
