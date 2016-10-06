<?php

namespace Almendra\Validators\Types;

use Almendra\Validators\Interfaces\TypeInterface;

/**
  * Abstracts a file.
  */
 class FileType extends Type implements TypeInterface
 {
     /**
     * @var string Default size unit
     */
    protected $unit = 'b';

    /**
     * @var string File permissions
     */
    protected $permissions;

    /**
     * @var numerical File size
     */
    protected $size;

    /**
     * @var array Unit names in bytes
     */
    protected $unitInBytes = [
        'b' => 1,
        'mb' => 1000,
        'gb' => 1000000,
        ];

     public function __construct($value)
     {
         parent::__construct($value);

         $this->setSize(filesize($this->getValue()[0]));
         $this->setValid(true);
     }

     public function checkType($value)
     {
         return is_file($value);
     }

     protected function toUnit($size, $unit = null)
     {
         if (!$unit) {
             $unit = $this->getUnit();
         }

         return $size = $size * ($this->unitInBytes[$unit]);
     }

     public function minSize($size, $unit = null)
     {
         $size = $this->toUnit($size, $unit);

         if ($this->getSize() < $size) {
             $this->setValid(false);
         }

         return $this;
     }

     public function maxSize($size, $unit = null)
     {
         $size = $this->toUnit($size, $unit);

         if ($this->getSize() > $size) {
             $this->setValid(false);
         }

         return $this;
     }

     public function validate()
     {
         return $this->getValid();
     }

    /**
     * Gets the value of unit.
     *
     * @return mixed
     */
    public function getUnit()
    {
        return $this->unit;
    }

    /**
     * Sets the value of unit.
     *
     * @param mixed $unit the unit
     *
     * @return self
     */
    protected function setUnit($unit)
    {
        $this->unit = $unit;

        return $this;
    }

    /**
     * Gets the value of permissions.
     *
     * @return mixed
     */
    public function getPermissions()
    {
        return $this->permissions;
    }

    /**
     * Sets the value of permissions.
     *
     * @param mixed $permissions the permissions
     *
     * @return self
     */
    protected function setPermissions($permissions)
    {
        $this->permissions = $permissions;

        return $this;
    }

    /**
     * Gets the value of size.
     *
     * @return mixed
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * Sets the value of size.
     *
     * @param mixed $size the size
     *
     * @return self
     */
    protected function setSize($size)
    {
        $this->size = $this->toUnit($size);

        return $this;
    }
 }
