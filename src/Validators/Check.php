<?php

namespace Almendra\Validators;

use Almendra\Validators\Interfaces\CheckInterface;
use Almendra\Validators\Type;


/**
 * Performs different types of checks to a Type
 *
 * @package Almendra\Validators	
 */
class Check implements CheckInterface {
	/**
	 * @var \Almendra\Validators\Type 
	 */
	protected $type;


	/**
	 * Sets the checking type
	 *
	 * @param \Almendra\Validators\Type $type 		The type
	 * @return void 				
	 */
	public function setType(Type $type) {
		$this -> type = $type;
	}

	/**
	 * Returns the checking type
	 *
	 * @return \Almendra\Validators\Type				
	 */
	public function getType() {
		return $this -> type;	
	}

	/**
	 * Minimum value check
	 *
	 * @param array $values 		The values to be checked
	 * @param mixed $reference 		The value to be compared to
	 * @return boolean 				
	 */
	public function min(array $values, $reference) {
		if (!isset($this -> type) || null === $this -> type) {
			throw new \Exception("Can't perform operation. Type must be defined.", 1);		
		}


		foreach ($values as $key => $value) {
			if ($this -> isMoreOrEqualThan($value, $reference)) {
				continue;
			}

			return false;
		}

		return true;
	}

	/**
	 * Maximum value check
	 *
	 * @param array $values 		The values to be checked
	 * @param mixed $reference 		The value to be compared to
	 * @return boolean 				
	 */
	public function max(array $values, $reference) {
		if (!isset($this -> type) || null === $this -> type) {
			throw new \Exception("Can't perform operation. Type must be defined.", 1);		
		}

		foreach ($values as $key => $value) {
			if ($this -> isLessOrEqualThan($value, $reference)) {
				continue;
			}
			return false;
		}
		return true;
	}

	/**
	 * Are each of the values equal to the reference?
	 *
	 * @param array $values 		The values to be compared
	 * @param mixed $reference 		The value to be compared to
	 * @return boolean 				
	 */
	public function equals(array $values, $reference) {
		if (!isset($this -> type) || null === $this -> type) {
			throw new \Exception("Can't perform operation. Type must be defined.", 1);		
		}

		foreach ($values as $key => $value) {
			if ($this -> equalsTo($value, $reference)) {
				continue;
			}
			return false;
		}
		return true;
	}


	/**
	 * Is less than?
	 *
	 * @param string|int $value 		The value to be compared
	 * @param int $reference 		The value to be compared to
	 * @return boolean 				
	 */
	protected function isLessThan($value, $reference) {
		switch ($this -> type) {
			case 'integer':
				return ($value < $reference);
				break;

			case 'string':
				return (strlen($value) < $reference);
				break;

			//		
				
			default:
				throw new \Exception("Invalid Type or Type not defined.");				
				break;
		}
	}

	/**
	 * Is more than?
	 *
	 * @param string|int $value 		The value to be compared
	 * @param int $reference 		The value to be compared to
	 * @return boolean 				
	 */
	protected function isMoreThan($value, $reference) {
		switch ($this -> type) {
			case 'integer':
				return ($value > $reference);
				break;

			case 'string':
				return (strlen($value) > $reference);
				break;

			//
			
			default:
				throw new \Exception("Invalid Type or Type not defined.");
				break;
		}
	}

	/**
	 * Is less or equal than?
	 *
	 * @param string|int $value 		The value to be compared
	 * @param int $reference 		The value to be compared to
	 * @return boolean 				
	 */
	protected function isLessOrEqualThan($value, $reference) {
		switch ($this -> type) {
			case 'integer':
				return ($value <= $reference);
				break;

			case 'string':
				return (strlen($value) <= $reference);
				break;

			//
			
			default:
				throw new \Exception("Invalid Type or Type not defined.");
				break;
		}
	}

	/**
	 * Is more or equal than?
	 *
	 * @param string|int $value 		The value to be compared
	 * @param int $reference 		The value to be compared to
	 * @return boolean 				
	 */
	protected function isMoreOrEqualThan($value, $reference) {
		switch ($this -> type) {
			case 'integer':
				return ($value >= $reference);
				break;

			case 'string':
				return (strlen($value) >= $reference);
				break;

			//
			
			default:
				throw new \Exception("Invalid Type or Type not defined.");			
				break;
		}
	}

	/**
	 * Is equal to?
	 *
	 * @param string|int $value 		The value to be compared
	 * @param int $reference 		The value to be compared to
	 * @return boolean 				
	 */
	protected function equalsTo($value, $reference) {
		switch ($this -> type) {
			case 'integer':
				return ($value === $reference);
				break;

			case 'string':
				return (strlen($value) === $reference);
				break;

			//
			
			default:
				throw new \Exception("Invalid Type or Type not defined.");	
				break;
		}
	}
}