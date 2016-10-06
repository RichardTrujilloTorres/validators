<?php

namespace Almendra\Validators\Types;

use Almendra\Validators\Interfaces\TypeInterface;
use Almendra\Validators\Traits\ArrayTrait;

/**
  * Abstracts a type.
  */
 abstract class Type implements TypeInterface
 {
     use ArrayTrait;

    /**
     * @var string The type's name
     */
    protected $name;

    /**
     * @var bool The type validity
     */
    protected $valid;

    /**
     * @var mixed The type's value
     */
    protected $value;

     public function __construct($value)
     {
         if (!$this->isValid($value)) {
             throw new \InvalidArgumentException('Type is not valid.');
         }

         $this->setValue($value);
     }

    /**
     * Is the value a valid one?
     *
     * @param array $values The values to be checked
     *
     * @return bool
     */
    public function isValid(array $values)
    {
        foreach ($values as $value) {
            if (!$this->checkType($value)) {
                return false;
            }
        }

        return true;
    }

    /**
     * Gets the value of value.
     *
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Sets the value of value.
     *
     * @param mixed $value the value
     *
     * @return self
     */
    protected function setValue($value)
    {
        if (!isset($this->value) || null === $this->value) {
            $this->value = $value;
        }

        return $this;
    }

    /**
     * Gets the value of name.
     *
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the value of name.
     *
     * @param mixed $name the name
     *
     * @return self
     */
    protected function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Gets the value of valid.
     *
     * @return mixed
     */
    public function getValid()
    {
        return $this->valid;
    }

    /**
     * Sets the value of valid.
     *
     * @param mixed $valid the valid
     *
     * @return self
     */
    protected function setValid($valid)
    {
        if (!isset($this->valid) || true === $this->valid) {
            $this->valid = $valid;
        }

        return $this;
    }
 }
