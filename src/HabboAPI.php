<?php

namespace Gonza18Lopez\HabboAPI;

/**
 * Ésta clase es la entrada principal de HabboAPI.
 * Con ella interactuaremos todo el tiempo.
 *
 * @package Gonza18Lopez\HabboAPI
 * @license MIT
 */

use Gonza18Lopez\HabboAPI\Core\Parser;
use Gonza18Lopez\HabboAPI\Entities\Habbo;

final class HabboAPI extends Parser
{
	/**
	 * Región de habbo hotel.
	 * Ésta indica la extensión del dominio del hotel
	 * para luego obtener los datos necesarios.
	 */
	private $parser;

	/**
	 * Crear una nueva instancia
	 *
	 * @var $hotel Ésta indica la extensión del dominio del hotel
	 * para luego obtener los datos necesarios.
	 *
	 * @return void
	 */
	public function __construct( $hotel )
	{
		/**
		 * Pasamos la región del hotel al analizador para
		 * obtener los datos necesarios en modo de objeto
		 */
		$this->parser = parent::__construct( $hotel );
	}

	/**
	 * Obtener información de un habbo
	 *
	 * @param string $habbo
	 * @return Gonza18Lopez\HabboAPI\Entities\Habbo
	 */
	public function habbo( $habbo )
	{
		return $this->parser->getHabboFromUsername( $habbo );
	}

	/**
	 * Obtener perfil completo de un habbo
	 *
	 * @param Entities\Habbo $habbo
	 * @return Gonza18Lopez\HabboAPI\Entities\Profile
	 */
	public function profile( Habbo $habbo )
	{
		return $this->parser->getFullProfile( $habbo );
	}
}