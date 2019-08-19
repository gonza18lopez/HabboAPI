<?php

namespace Gonza18Lopez\HabboAPI\Exceptions;

/**
 * Manejador de errores cuando no se encuentre
 * el Habbo específicado en dicho hotel.
 *
 * @license MIT
 * @package Gonza18Lopez\HabboAPI\Exceptions\HabboNotFoundException
 */

use Exception;

class HabboNotFoundException extends Exception
{
	public function __construct( $message, $code = 0, Exception $previous = null )
	{
		parent::__construct( $message, $code, $previous );
	}
}