<?php

namespace Gonza18Lopez\HabboAPI\Entities;

/**
 * Ésta clase manipula una por una las placas
 * que tiene el habbo manipulado.
 *
 * @license MIT
 * @package Gonza18Lopez\HabboAPI\Entities\Habbo
 */

use Gonza18Lopez\HabboAPI\Interfaces\Entity;

final class Badge implements Entity
{
	/**
	 * Información de la placa
	 */
	private $badge;

	/**
	 * Crea una instancia de Entities\Badge
	 *
	 * @param object $badge
	 * @return void
	 */
	public function __construct( $badge )
	{
		$this->badge = $badge;
	}

	/**
	 * Index de la placa
	 */
	public function index() : Int
	{
		return $this->badge->badgeIndex;
	}

	/**
	 * Index de la placa
	 */
	public function code() : String
	{
		return $this->badge->code;
	}

	/**
	 * Index de la placa
	 */
	public function name() : String
	{
		return $this->badge->name;
	}

	/**
	 * Index de la placa
	 */
	public function description() : String
	{
		return $this->badge->description;
	}

	/**
	 * Analiza y manipula los datos necesarios para
	 * convertirlos en una Entidad
	 *
	 * @return void
	 */
	public function parse()
	{
		//
	}
}