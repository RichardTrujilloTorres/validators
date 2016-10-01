<?php

namespace Almendra\Validators;

use Almendra\Validators\Interfaces\ValidatorInterface;
use Almendra\Validators\Check;
use Almendra\Validators\Traits\Helpers;


/**
 * Represents a validator.
 *
 * @package Almendra\Validators	
 */
class Validator implements ValidatorInterface {

	use Helpers;


	/**
	 * @var mixed The value(s) to be checked 
	 */
	protected $values = [];

	/**
	 * @var \Almendra\Validator\Type 
	 */
	protected $type;

	/**
	 * @var \Almendra\Validators\Check 
	 */
	protected $check;

	/**
	 * @var boolean The result of the validation 
	 */
	protected $valid = true;

	/**
	 * Creates a Type and a Check instances, both required
	 *
	 * @param Check $check 		The check instance to be operated with
	 * @return void 				
	 */
	public function __construct(Check $check = null) {
		$this -> check = $this -> defined($check) ? $check : new Check;
	}

	protected function setValues($value) {
		if (is_array($value)) {
			$this -> values = $value;
			// array_replace($values, $value);
		} else {
			$this -> values[] = $value;
		}

		return $this;
	}

	public function getValues() {
		return $this -> values;
	}	

	/**
	 * Checks whatever a value is integer.
	 *
	 * @param $string $value 		The value to be checked
	 * @return \Almendra\Validators\Validator
	 */
	public function integer($value) {
		if (isset($this -> type)) {
			throw new \InvalidArgumentException("Type has been already set.");
		}

		$this -> type = new Type('integer');
		$this -> check() -> setType($this -> type);
		if (!$this -> checkValues($value, 'integer')) {
			throw new \InvalidArgumentException("Type must be an integer.");		
		}

		$this -> setValues($value);

		return $this;
	}

	/** 
	 * Checks whatever a value is a string.
	 *
	 * @param $string $value 		The value to be checked
	 * @return \Almendra\Validators\Validator
	 * @throws \InvalidArgumentException
	 */
	public function string($value) {
		if (isset($this -> type)) {
			throw new \InvalidArgumentException("Type has been already set.");
		}

		$this -> type = new Type('string');
		$this -> check() -> setType($this -> type);
		if (!$this -> checkValues($value, 'string')) {
			throw new \InvalidArgumentException("Type must be an string.");		
		}

		$this -> setValues($value);

		return $this;
	}

	/**
	 * Checks that the given values comform to a given type.
	 *
	 * @param mixed $value 		The value.
	 * @param mixed $type 		The type (string, integer, float)
	 * @return boolean 				
	 */
	protected function checkValues($values, $type) {
		$arrayValues = [];
		if (!is_array($values)) {
			$arrayValues[] = $values;
		} else {
			$arrayValues = $values;
		}

		foreach ($arrayValues as $key => $single) {
			if (!$this -> checkType($single, $type)) {
				return false;		
			}
		}

		return true;
	}

	/**
	 * Checks whatether the type is supported and the equivalent.		 
	 *
	 * @param mixed $value 		The value to be checked
	 * @param string $type 		The type specifier
	 * @return boolean 				
	 */
	protected function checkType($value, $type = 'string') {
		if (!$this -> type() -> isSupported($type) ||
			!$this -> type() -> sameOf($value, $type)) {
			return false;
		}

		return true;
	}

	/**
	 * Sets the minimum value check.
	 *
	 * @param mixed $value 		The minimum value to be set
	 * @return \Almendra\Validators\Validator 				
	 */
	public function min($reference) {
		if (!$this -> check() -> min($this -> values, $reference)) {
			$this -> valid = false;
		}

		return $this;
	}

	/**
	 * Sets the maximum value check.
	 *
	 * @param mixed $value 		The maximum value to be set
	 * @return \Almendra\Validators\Validator 				
	 */
	public function max($reference) {
		if (!$this -> check() -> max($this -> values, $reference)) {
			$this -> valid = false;
		}

		return $this;
	}

	/**
	 * Sets the range value check.
	 *
	 * @param mixed $value 		The range value to be set
	 * @return \Almendra\Validators\Validator 				
	 */
	public function range($left, $right) {
		return $this -> min($left) -> max($right);
	}	

	/**
	 * Performs all the validating operations.
	 *
	 * @return boolean 				true if success
	 */
	public function validate() {
		return $this -> valid;
	}
}