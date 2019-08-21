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

final class Group implements Entity
{
	/**
	 * Información del grupo
	 */
	private $group;

	/**
	 * Crea una nueva instancia de Entity\Group
	 *
	 * @param stdClass $group
	 * @return void
	 */
	public function __construct( $group )
	{
		$this->group = $group;

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
		return $this->group->id;
	}

	/**
	 * Nombre del grupo
	 *
	 * @return string
	 */
	public function name() : String
	{
		return $this->group->name;
	}

	/**
	 * Descripción del grupo
	 *
	 * @return string
	 */
	public function description() : String
	{
		return $this->group->description;
	}

	/**
	 * Exclusividad del grupo
	 * Determina si el grupo es abierto o exclusivo.
	 *
	 * @return boolean
	 */
	public function exclusive() : Bool
	{
		return $this->group->type === 'EXCLUSIVE';
	}

	/**
	 * ID de la sala del grupo
	 *
	 * @return string
	 */
	public function roomId() : String
	{
		return $this->group->roomId;
	}

	/**
	 * Código de placa del gurpo
	 *
	 * @return string
	 */
	public function badgeCode() : String
	{
		return $this->group->badgeCode;
	}

	/**
	 * Colores del grupo
	 *
	 * @return array
	 */
	public function colors() : Array
	{
		return [
			'primary' => $this->group->primaryColour,
			'secondary' => $this->group->secondaryColour
		];
	}

	/**
	 * Determina si el usuario es administrador del gurpo
	 *
	 * @return boolean
	 */
	public function isAdmin() : Bool
	{
		return $this->group->isAdmin;
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
