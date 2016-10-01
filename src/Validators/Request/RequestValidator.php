<?php

namespace Almendra\Validators\Request;

// use Almendra\Validators\Psr\Messages\Response;
// use Almendra\Validators\Psr\Messages\Request;
// use Almendra\Validators\Psr\Messages\Stream;

use Almendra\Validators\Interfaces\ValidatorInterface;
use Almendra\Validators\Validator;



/**
 * Represents a request validator.
 *
 * @package Almendra\Validators	
 */
class RequestValidator extends Validator implements ValidatorInterface {

	public function test() {
		return true;		
	}	
}