<?php

namespace Gonza18Lopez\HabboAPI\Interfaces;

/**
 * Interfaz de las entidades.
 * Todas las entidades deben tener un analizador
 * para convertir los Array en otra Entidad
 *
 * @license MIT
 * @package Gonza18Lopez\HabboAPI\Interfaces\Entity
 */

interface Entity
{
	/**
	 * Analizador convierte un Array en otra entidad
	 */
	public function parse();
}
