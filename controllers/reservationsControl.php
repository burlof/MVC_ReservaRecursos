<?php

include_once ("view.php");
include_once ("models/security.php");
include_once ("models/reservation.php");


class ReservationsControl{
    
    private $view;

    public function __construct(){
        $this->view = new View(); // Vistas
        DB::createConnection(); 
    }

     /**
     * Muestra una lista de todos los recursos de la base de datos
     */
    public function selectReservations($text = null)
    {
        $data['reservations'] = Reservation::getAll();
        if ($text != null) $data['text'] = $text;
        $this->view->show("reservations/showAllReservations", $data);
    }


    /**
     * Elimina un recurso por su id de la base de datos
     */
    public function deleteReservations(){
        $hasReservations = Reservation::hasReservations();
        $text = "";
        if ($hasReservations) {
            $text = "No puedes borrar ese recurso porque tiene reservas. ";
        }
        $result = Reservation::deleteID();
        if ($result == 0) {
            $text = $text . "Ha fallado el borrado";
        } else {
            $text = $text . "Borrado con éxito";
        }
        $this->selectReservations($text);
    }

    /**
     * Actualiza/Modifica un recurso por su id de la base de datos
     */
    public function updateReservations(){

        $data['reservations'] = Reservation::getAll();
        $this->view->show("reservations/updateReservations", $data);
    }

    /**
     * Busca un recurso de la base de datos
     */
    public function searchReservations($text = null)
    {
        $data['reservations'] = Reservation::buscar();
        if ($text != null) $data['text'] = $text;
        $this->view->show("reservations/showAllReservations", $data);
    }





}

?>