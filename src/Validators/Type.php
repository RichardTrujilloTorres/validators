<?php


namespace Almendra\Validators;

/**
 * Abstracts a type (integer, string).
 *
 * @package Almendra\Validators	
 */
class Type {

	/**
	 * @var array A listing of the supported types
	 */
	protected $supported = [
		'integer',
		'string',
		// 'float',
		];

	/**
	 * @var string Defines which type is it 
	 */
	protected $which;


	/**
	 * Constructor.		
	 *
	 * @param string $which 		The name of the type
	 * @return type 				description
	 */
	public function __construct($which = 'integer') {
		$this -> which = $which;
	}

	/**
	 * Returns the name of the type as a string.
	 *
	 * @return string 				
	 */
	public function __toString() {
		return $this -> which;	
	}


	/**
	 * Checks which type is it.
	 *
	 * @param string $which 		The name to be compared to the type's name
	 * @return boolean 				
	 */
	public function is($which) {
		if (is_string($which)) {
			return $this -> which === $which;
		}

		throw new \InvalidArgumentException("Comparison type must be a string.");	
	}

	/**
	 * Checks if a given type is supported.
	 *
	 * @param string $which 		The name of the type
	 * @return boolean 				
	 */
	public function isSupported($which) {
		return in_array($which, $this -> supported);
	}

	/**
	 * Sets the type.
	 *
	 * @param string $which 		The name of the type to be set
	 * @return void 				
	 */
	public function set($which) {
		if (!$this -> isSupported($which)) {
			throw new \InvalidArgumentException("Type is not supported.");
		}

		$this -> which = $which;
	}

	/**
	 * Returns the name of the current type.
	 *
	 * @return string 				
	 */
	public function get() {
		return $this -> which;
	}

	/**
	 * Returns a listing of the supported types by name.
	 *
	 * @return array 				
	 */
	public function getSupported() {
		return $this -> supported;	
	}

	/**
	 * Checks if a given value matches the a given type.
	 *
	 * @param mixed $value 		The value to be checked
	 * @param string $type 		The name of the type to be compared to
	 * @return boolean 				
	 */
	public function sameOf($value, $type) {
		switch ($type) {
			case 'integer':
				return (is_integer($value));
				break;

			case 'string':
				return (is_string($value));
				break;
				
			//
			
			default:
				throw new \InvalidArgumentException("Type definition is not supported.", 1);
				
				break;
		}
	}
}