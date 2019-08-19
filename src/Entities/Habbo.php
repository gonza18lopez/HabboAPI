<?php

namespace Gonza18Lopez\HabboAPI\Entities;

/**
 * Ésta clase se encargará de obtener y manipular
 * la información obtenida un de Habbo en un objeto.
 *
 * @license MIT
 * @package Gonza18Lopez\HabboAPI\Entities\Habbo
 */

use Carbon\Carbon;
use Gonza18Lopez\HabboAPI\Interfaces\Entity;

final class Habbo implements Entity
{
	/**
	 * Información del habbo
	 */
	private $habbo;

	/**
	 * Placas
	 */
	private $badges;

	/**
	 * Crea una instancia de Entities\Habbo
	 *
	 * @param object $habbo
	 * @return void
	 */
	public function __construct( $habbo )
	{
		$this->habbo = $habbo;

		/**
		 * Analizar
		 */
		$this->parse();
	}

	/**
	 * ID única
	 *
	 * @return string
	 */
	public function id() : String
	{
		return $this->habbo->uniqueId;
	}

	/**
	 * Nombre del Habbo
	 *
	 * @return string
	 */
	public function name() : String
	{
		return $this->habbo->name;
	}

	/**
	 * Look
	 *
	 * @return string
	 */
	public function look() : String
	{
		return $this->habbo->figureString;
	}

	/**
	 * Misión
	 *
	 * @return string
	 */
	public function motto() : String
	{
		return $this->habbo->motto;
	}

	/**
	 * Fecha de registro
	 *
	 * @return string
	 */
	public function memberSince() : Carbon
	{
		return Carbon::parse( $this->habbo->memberSince );
	}

	/**
	 * ¿Perfil visible?
	 *
	 * @return boolean
	 */
	public function profileVisible() : Bool
	{
		return $this->habbo->profileVisible;
	}

	/**
	 * Obtener placas
	 *
	 * @param boolean $selected (default: false)(false para devolver todas las placas.
	 * true para devolver solo las seleccionadas)
	 *
	 * @return array
	 */
	public function badges( $selected = false ) : Array
	{
		/**
		 * Placas seleccionadas
		 */
		if ( $selected )
			return $this->badges[ 'selected' ];

		/**
		 * Todas las placas
		 */
		return $this->badges;
	}

	/**
	 * Añadir placa seleccionada como Entidad
	 *
	 * @return void
	 */
	private function addSelectedBadge( Badge $badge )
	{
		$this->badges[ 'selected' ][] = $badge;
	}

	/**
	 * Analiza y manipula los datos necesarios para
	 * convertirlos en una Entidad
	 *
	 * @return void
	 */
	public function parse()
	{
		/**
		 * Analizar placas seleccionadas
		 */
		$this->parseSelectedBadges();
	}

	/**
	 * Analiza y convierte las placas seleccionadas
	 * a una entidad \Entities\Badge
	 *
	 * @return void
	 */
	private function parseSelectedBadges()
	{
		/**
		 * Obtener las placas seleccionadas
		 */
		$badges = $this->habbo->selectedBadges;

		/**
		 * Convertirlas a entidad
		 */
		foreach( $badges as $badge )
			$this->addSelectedBadge( new Badge( $badge ) );
	}
}
