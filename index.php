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
    

//$controller = new Controller();
//$controller = new ResourcesControl();
$controller = new $controllerName();
//$controller = new TimeSlotsControl();


// Miramos a ver si hay alguna acción pendiente de realizar
if (!isset($_REQUEST['action'])) {
// No la hay. Usamos la acción por defecto (mostrar el formulario de login)
    //$action = "selectResources";
    //$action = "selectTimeSlots";
    //$action = "selectUsers";
    $action = "showMenu";
} else {
// Si la hay. La recuperamos.
    $action = $_REQUEST['action'];
}

// Ejecutamos el método del controlador que se llame como la acción
$controller->$action();
