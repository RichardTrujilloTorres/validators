<?php


namespace Almendra\Validators\Traits;

use Exception;

/**
 * A group of helpers.
 *
 * @param type name 		description
 * @return type 				description
 */
trait Helpers {

	/**
	 * Returns the instance of \Almendra\Validators\Type
	 *
	 * @return \Almendra\Validators\Type
	 * @throws \Exception				
	 */
	public function type() {
		if (isset($this -> type) && null !== $this -> type) {
			return $this -> type;
		}	

		throw new Exception("No Type instance is defined.");
		
	}

	/**
	 * Returns the instance of \Almendra\Validators\Check
	 *
	 * @return \Almendra\Validators\Check
	 * @throws \Exception				
	 */
	public function check() {
		if (isset($this -> check) && null !== $this -> check) {
			return $this -> check;
		}	

		throw new Exception("No Check instance is defined.");	
	}

	/**
	 * Is the given value defined?
	 *
	 * @param mixed $value 		The value to be checked
	 * @return boolean 				
	 */
	public function defined($value) {
		if (isset($value) && null !== $value) {
			return true;
		}

		return false;
	}
}