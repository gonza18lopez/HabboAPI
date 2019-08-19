<?php

namespace Gonza18Lopez\HabboAPI\Core;

/**
 * La clase Parser se encargará de obtener la extensión
 * del dominio de habbo hotel, para luego obtener los datos
 * y manipularlos.
 *
 * @package Gonza18Lopez\HabboAPI\Core;
 * @license MIT License
 */

use GuzzleHttp\Client as HttpClient;

use Gonza18Lopez\HabboAPI\Entities\Habbo;
use Gonza18Lopez\HabboAPI\Exceptions\HabboNotFoundException;

class Parser
{
	/**
	 * Región de habbo hotel.
	 * Ésta indica la extensión del dominio del hotel
	 * para luego obtener los datos necesarios.
	 */
	protected $hotel;

	/**
	 * URL de la API de Habbo.
	 * Es de donde obtendremos toda la información :D
	 */
	private $http;

	/**
	 * Creamos una nueva instancia del analizador
	 *
	 * @param string $hotel
	 * @return Parser $this
	 */
	public function __construct( $hotel )
	{
		/**
		 * Región del hotel
		 */
		$this->hotel = $hotel;

		/**
		 * Establecer ruta de API
		 */
		$this->setApiPath();

		/**
		 * Retorna la instancia de Parser
		 */
		return $this;
	}

	/**
	 * Obtener información de un Habbo por el nombre de usuario
	 *
	 * @param string $habbo
	 * @return Gonza18Lopez\HabboAPI\Entities\Habbo $habbo
	 */
	public function getHabboFromUsername( $habbo )
	{
		/**
		 * Obtenemos la información del Habbo en un objeto
		 */
		$data = $this->request( "?name={$habbo}" );

		/**
		 * Retornamos la información en una entidad \Entities\Habbo
		 */
		return new Habbo( $data );
	}

	/**
	 * Solicitud a la ruta de la API para obtener los datos
	 * en formato de JSON.
	 *
	 * @param string $path
	 * @return mixed
	 */
	protected function request( $path ) : \stdClass
	{
		/**
		 * Enviamos una solicitud HTTP GET
		 */
		$request = $this->http->request( 'GET', $path );

		/**
		 * Verificamos el código de respuesta
		 */
		if ( $request->getStatusCode() === 404 )
			return new HabboNotFoundException( 'No podemos encontrar el Habbo que buscas' );

		return json_decode( $request->getBody() );
	}

	/**
	 * Establecemos una dirección URL desde la región
	 * obtenida para luego enviar las peticiones HTTP.
	 *
	 * @return void
	 */
	private function setApiPath()
	{
		/**
		 * Nueva instancia de HttpClient
		 */
		$this->http = new HttpClient([
			'base_uri' => "//www.habbo.{$this->hotel}/api/public/users",
			'verify' => false
		]);
	}
}