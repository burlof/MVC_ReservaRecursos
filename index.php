<?php
//include("controller.php");
include_once("controllers/resourcesControl.php");
include_once("controllers/usersControl.php");
include_once("controllers/timeslotsControl.php");
include_once("controllers/reservationsControl.php");

session_start();

if (!isset($_REQUEST['controller'])) {
    $controllerName = "UsersControl";
} else {
    $controllerName = $_REQUEST['controller'];
}


// Miramos a ver si hay alguna acción pendiente de realizar
if (!isset($_REQUEST['action'])) {
// No la hay. Usamos la acción por defecto (mostrar el formulario de login)
    $action = "showLoginForm";
} else {
// Si la hay. La recuperamos.
    $action = $_REQUEST['action'];
}

$controller = new $controllerName();

// Ejecutamos el método del controlador que se llame como la acción
$controller->$action();
