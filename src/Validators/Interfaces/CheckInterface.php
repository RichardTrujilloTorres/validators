<?php

namespace Almendra\Validators\Interfaces;

use Almendra\Validators\Type;

/**
 * The validator interface.
 *
 * @package Almendra\Validators	
 */
interface CheckInterface {
	public function setType(Type $type);

	public function getType();

	public function min(array $values, $reference);

	public function max(array $values, $reference);

	public function equals(array $values, $reference);
}