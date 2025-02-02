<?php

use FastRoute\RouteCollector;
use FastRoute\Dispatcher;

require_once __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . "/src");
$dotenv->load();

$dispatcher = FastRoute\simpleDispatcher(function (RouteCollector $r) {

    //Con addroute voy añadiendo rutas url por get o por post a las que responderemos
    //Las que no esten aquí darán fallo

    //Listado de entrenadores


    //LOGIN

    //La primera ruta, al hacer peticion GET se llama a redireccionar que ira a la web login
    $r->addRoute('GET', '/', ['Adrix\Proyecto\controlador\UsuarioController', 'redireccionar']);
    //Una vez se este en la localizacion /login, se llama a la funcion login, que la renderiza
    $r->addRoute('GET', '/login', ['Adrix\Proyecto\controlador\UsuarioController', 'login']);
    //Cuando el usuario hace una peticion POST en la ruta /login se llama a verficar login
    $r->addRoute('POST', '/login', ['Adrix\Proyecto\controlador\UsuarioController', 'VerificarLogin']);


    //REGISTRO

    $r->addRoute('GET', '/registro', ['Adrix\Proyecto\controlador\UsuarioController', 'RegistroUsuario']);
    $r->addRoute('POST', '/registro', ['Adrix\Proyecto\controlador\UsuarioController', 'RegistrarUsuario']);


    //INICIO

    $r->addRoute('GET', '/inicio', ['Adrix\Proyecto\controlador\UsuarioController', 'CargarInicio']);

    //Cuando en el inicio se envie el formulario, se llamará a cargarWeb, que redirigira a la vista correspondiente
    //y en esa vista, cuando se haga la peticion GET se renderiza

    $r->addRoute('POST', '/inicio', ['Adrix\Proyecto\controlador\UsuarioController', 'CargarWeb']);

    //GALAXIAS

    $r->addRoute('GET', '/galaxias', ['Adrix\Proyecto\controlador\GalaxiaController', 'MostrarGalaxias']);

    //TRIPULACIONES

    $r->addRoute('GET', '/tripulaciones', ['Adrix\Proyecto\controlador\TripulacionController', 'MostrarTripulaciones']);

    //DESCUBRIMIENTOS

    $r->addRoute('GET', '/descubrimientos', ['Adrix\Proyecto\controlador\DescubrimientoController', 'MostrarDescubrimientos']);


    //Planetas

    $r->addRoute('GET', '/planetas', ['Adrix\Proyecto\controlador\PlanetaController', 'MostrarPlanetas']);


    //En GET , la ruta inicio, muestra un menu de las opciones a realizar
    // $r->addRoute('GET','/planetas',['Adrix\Proyecto\controlador\PlanetaController', 'MostrarPlanetas']);


    //EXPEDICIONES

    //Obtener expediciones
    $r->addRoute('GET', '/expediciones', ['Adrix\Proyecto\controlador\ExpedicionController', 'MostrarExpediciones']);
    //Obtener expedicion
    $r->addRoute('GET', '/expediciones/{id:\d+}', ['Adrix\Proyecto\controlador\ExpedicionController', 'MostrarExpedicion']);
    //Eliminar Expedicion
    $r->addRoute('GET', '/expediciones/{id:\d+}/eliminar', ['Adrix\Proyecto\controlador\ExpedicionController', 'EliminarExpedicion']);

    //Insertar Expedicion
    $r->addRoute('GET', '/expediciones/insertarExpedicion', ['Adrix\Proyecto\controlador\ExpedicionController', 'DatosExpedicion']);
    $r->addRoute('POST', '/expediciones/insertarExpedicion', ['Adrix\Proyecto\controlador\ExpedicionController', 'InsertarExpedicion']);

    $r->addRoute('GET', '/expediciones/{id:\d+}/actualizar', ['Adrix\Proyecto\controlador\ExpedicionController', 'DatosUpdateExpedicion']);
    $r->addRoute('POST', '/expediciones/{id:\d+}/actualizar', ['Adrix\Proyecto\controlador\ExpedicionController', 'ActualizarExpedicion']);



});

//Dependiendo de la solicitud haremos una cosa u otra 
//recomemos la url y si ha sido get post o cual
// Obtener datos de la solicitud
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Eliminar parámetros de la consulta
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

// Despachar la ruta
$routeInfo = $dispatcher->dispatch($httpMethod, $uri);

switch ($routeInfo[0]) {
    case Dispatcher::NOT_FOUND:
        // Ruta no encontrada
        http_response_code(404);
        echo "404 - Página no encontrada<br>Intentalo de nuevo";
        break;

    case Dispatcher::METHOD_NOT_ALLOWED:
        // Método HTTP no permitido
        $allowedMethods = $routeInfo[1];
        http_response_code(405);
        echo "405 - Método no permitido. Métodos permitidos: " . implode(', ', $allowedMethods);
        break;

    case Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        //Asignacion doble de variables que se reciben desde un array seria igual a las dos siguientes lineas
        //$class=$handler[0];
        //$method=$handler[1];
        [$class, $method] = $handler;
        //Equivalente a $controller = new App\Controlador\EntrenadorController();
        $controller = new $class();
        //Llamamos a la funcion encargada de despachar la ruta
        $controller->$method($vars);
        break;
}
