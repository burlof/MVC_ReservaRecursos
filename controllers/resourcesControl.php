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
    public function selectResources($text = null)
    {
        $data['resources'] = Resource::getAll();
        if ($text != null) $data['text'] = $text;
        $this->view->show("resources/showAllResources", $data);
    }


    /**
     * Elimina un recurso por su id de la base de datos
     */
    public function deleteResources(){
        $hasReservations = Resource::hasReservations();
        $text = "";
        if ($hasReservations) {
            $text = "No puedes borrar ese recurso porque tiene reservas. ";
        }
        $result = Resource::deleteID();
        if ($result == 0) {
            $text = $text . "Ha fallado el borrado";
        } else {
            $text = $text . "Borrado con éxito";
        }
        $this->selectResources($text);
    }





}

?>