<?php

namespace Gonza18Lopez\HabboAPI;

/**
 * Contenedor de servicios para integrear HabboAPI a Laravel
 */

use Illuminate\Support\ServiceProvider;

class HabboServiceProvider extends ServiceProvider
{
	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->loadRoutesFrom( __DIR__ . '/Http/routes/web.php' );
	}

	/**
	 * Register bindings in the container.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}
}
