<?php

/**
 * Composer Autoloader
 */
require __DIR__ . '/../vendor/autoload.php';

/**
 * Instancia de Gonza18Lopez\HabboAPI
 */
$api = new \Gonza18Lopez\HabboAPI\HabboAPI( 'es' );

/**
 * Obtener información del habbo "ImPower-"
 */
$habbo = $api->habbo( 'ImPower-' );
