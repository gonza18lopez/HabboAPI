Gonza18Lopez
==
Libreria PHP para obtener datos de Habbo Hotel.
Consulte el archivo `examples/example.php` para ver ejemplos de esta biblioteca.

### Instalación
1. Agregue el paquete de composer a su proyecto ejecutando `composer require gonza18lopez/habboapi`
2. Asegúrese de haber incluído el autoload de composer `require __DIR__ . '/vendor/autoload.php'`
3. Crear una nueva instancia de Gonza18Lopez/HabboAPI definiendo la extensión del hotel sobre el que trabajará.

### Cómo se usa
```php
<?php

/**
 * Composer Autoloader
 */
require __DIR__ . '/../vendor/autoload.php';

/**
 * Instancia de Gonza18Lopez\HabboAPI
 *
 * Estableciendo como único parametró en el constructor, la extensión del hotel.
 */
$api = new \Gonza18Lopez\HabboAPI\HabboAPI( 'es' );

/**
 * Obtener información del habbo "ImPower-"
 */
$habbo = $api->habbo( 'ImPower-' );
```

### Changelog
- Se creó del proyecto HabboAPI.

### Website
Visite [MundoFans](http://mundofans.es "MundoFans") para más información.
