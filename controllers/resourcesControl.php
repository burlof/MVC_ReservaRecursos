<?php

include_once ("view.php");
include_once ("models/security.php");
include_once ("models/resource.php");


class ResourcesControl{
    
    private $view;

    /**
     * Contructor del controlador de recursos
     */
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


    /**
     * Muestra el formulario del recurso seleccionado para ser modificado
     */
    public function edit() {
        $data['resources'] = Resource::get($_REQUEST['idResource']);
        $this->view->show("resources/updateResources", $data);

    }

    /**
     * Muestra una nueva vista para insertar recursos en la base de datos
     */
    public function showInsert()
    {
        $this->view->show("resources/addResources");
    }

    /**
     * Inserta un nuevo recurso en la base de datos
     */
    public function insertResources(){
        Resource::insert();
        $data['resources'] = Resource::getAll();
        $this->view->show("resources/showAllResources", $data);
    }

    /**
     * Actualiza/Modifica un recurso por su id de la base de datos
     */
    public function updateResources(){
        Resource::update();
        $data['resources'] = Resource::getAll();
        $this->view->show("resources/showAllResources", $data);
    }



}

?>