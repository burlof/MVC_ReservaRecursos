<?php

include_once ("view.php");
include_once ("models/security.php");
include_once ("models/user.php");


class UsersControl{
    
    private $view;

    public function __construct(){
        $this->view = new View(); // Vistas
        DB::createConnection(); 
    }

    /**
     * Muestra el menú de opciones del usuario
     */
    public function showMenu()
    {
        $this->view->show("mainMenu");
    }


     /**
     * Muestra una lista de todos los recursos de la base de datos
     */
    public function selectUsers()
    {
        $data['users'] = User::getAll();
        $this->view->show("users/showAllUsers", $data);
        echo "Hola, estoy pasando por selectUsers";
    }

    /**
     * Elimina un usuario por su id de la base de datos
     */
    public function deleteUsers(){
        $hasReservations = User::hasReservationsUsers();
        $text = "";
        if ($hasReservations) {
            $text = "No puedes borrar ese usuario porque tiene reservas. ";
        }
        $result = User::deleteID();
        if ($result == 0) {
            $text = $text . "Ha fallado el borrado";
        } else {
            $text = $text . "Borrado con éxito";
        }
        $this->selectUsers($text);
    }





}

?>