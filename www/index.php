<?php

require 'conf.inc.php';

use App\Core\Routing;
use App\Core\Container;

function myAutoloader($class)
{
    $prefix = 'App\\';
    $baseDir = __DIR__.'/src/';

    $prefixLength = strlen($prefix);
    if (0 !== strncmp($prefix, $class, $prefixLength)) {
        return;
    }

    $relativeClass = substr($class, $prefixLength);
    $file = $baseDir.str_replace('\\', '/', $relativeClass).'.php';

    if (file_exists($file)) {
        require $file;

        return;
    }
    throw new Exception('file not found');
}

// La fonction myAutoloader est lancé sur la classe appelée n'est pas trouvée
spl_autoload_register('myAutoloader');

// Récupération des paramètres dans l'url - Routing
$slug = explode('?', $_SERVER['REQUEST_URI'])[0];
$routes = Routing::getRoute($slug);
extract($routes);

// Vérifie l'existence du fichier et de la classe pour charger le controlleur
        $container = new Container();

        $cObject = $container->get($c);
        //vérifier que la méthode (l'action) existe
        if (method_exists($cObject, $a)) {
            //appel dynamique de la méthode
            $cObject->$a();
        } else {
            die('La methode '.$a." n'existe pas");
        }
