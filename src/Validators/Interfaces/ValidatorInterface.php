<?php

namespace Almendra\Validators\Interfaces;

/**
 * The validator interface.
 *
 * @package Almendra\Validators	
 */
interface ValidatorInterface {
	public function integer($value);

	public function string($value);

	public function min($value);

	public function max($value);

	public function range($left, $right);
}