<?php

include_once ("view.php");
include_once ("models/security.php");
include_once ("models/resource.php");


class ResourcesControl{
    
    private $view;

    public function __construct(){
        $this->view = new View(); // Vistas
        DB::createConnection(); 
    }

     /**
     * Muestra una lista de todos los recursos de la base de datos
     */
    public function selectResources()
    {
        $data['resources'] = Resource::getAll();
        $this->view->show("resources/showAllResources", $data);
    }





}

?>