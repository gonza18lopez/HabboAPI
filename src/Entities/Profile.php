<?php

namespace Gonza18Lopez\HabboAPI\Entities;

/**
 * Ésta clase se encargará de obtener y manipular
 * la información obtenida un de Habbo en un objeto.
 *
 * @license MIT
 * @package Gonza18Lopez\HabboAPI\Entities\Habbo
 */

use Gonza18Lopez\HabboAPI\Interfaces\Entity;

final class Profile implements Entity
{
	/**
	 * Información del Habbo
	 */
	private $habbo;

	/**
	 * Grupos
	 */
	public $groups = [];

	/**
	 * Placas
	 */
	public $badges = [];

	/**
	 * Crea una instancia de Entities\Profile
	 *
	 * @param stdClass $habbo
	 * @return void
	 */
	public function __construct( $data )
	{
		$this->habbo = $data;

		/**
		 * Analizar
		 */
		$this->parse();
	}

	/**
	 * Analiza y manipula los datos necesarios para
	 * convertirlos en una Entidad
	 *
	 * @return void
	 */
	public function parse()
	{
		$this->parseGroups();
		$this->parseBadges();
	}

	/**
	 * Añadir un grupo como Entidad
	 *
	 * @return void
	 */
	private function addGroup( Group $group )
	{
		$this->groups[] = $group;
	}

	/**
	 * Añadir una placa como Entidad
	 *
	 * @return void
	 */
	private function addBadge( Badge $badge )
	{
		$this->badges[] = $badge;
	}

	/**
	 * Obtiene los grupos y los devuelve como una entidad
	 *
	 * @return void
	 */
	private function parseGroups()
	{
		/**
		 * Grupos
		 */
		$groups = $this->habbo->groups;

		/**
		 * Convertirlos a Entity
		 */
		foreach( $groups as $group )
			$this->addGroup( new Group( $group ) );
	}

	/**
	 * Analiza y convierte las placas
	 * a una entidad \Entities\Badge
	 *
	 * @return void
	 */
	private function parseBadges()
	{
		/**
		 * Obtener las placas seleccionadas
		 */
		$badges = $this->habbo->badges;

		/**
		 * Convertirlas a entidad
		 */
		foreach( $badges as $badge )
			$this->addBadge( new Badge( $badge ) );
	}
}
