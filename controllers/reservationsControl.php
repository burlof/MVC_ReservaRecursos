<?php

include_once ("view.php");
include_once ("models/security.php");
include_once ("models/reservation.php");


class ReservationsControl{
    
    private $view;

    public function __construct(){
        $this->view = new View(); // Vistas
        $this->reservation = new Reservation(); //Reservas
        DB::createConnection(); 
    }

    /**
     * Muestra una lista de todos los recursos de la base de datos
     */
    public function selectReservations()
    {
        $data['reservations'] = Reservation::getAll();
        $this->view->show("reservations/showAllReservations", $data);
    }


    /**
     * Elimina un recurso por su id de la base de datos
     */
    public function deleteReservations(){
        $result = Reservation::deleteID();
        $this->selectReservations();
    }


    /**
     * Elimina un recurso por su id de la base de datos
     */
    public function deleteReservationes(){
        $idReservation = $_REQUEST['idReservation'];
        $this->reservation->deleteID($idReservation);
        $this->view->show("reservations/showAllReservations");
    }

    /**
     * Actualiza/Modifica un recurso por su id de la base de datos
     */
    /*
    public function updateReservations(){

        $data['reservations'] = Reservation::getAll();
        $this->view->show("reservations/updateReservations", $data);
    }*/

    /**
     * Muestra una nueva vista para insertar recursos en la base de datos
     */
    public function showInsert()
    {
        $this->view->show("reservations/addReservations");
    }

    /**
     * Inserta un nuevo recurso en la base de datos
     */
    public function insertReservations(){
        $idResource = $_REQUEST["idResource"];
        $idUser = $_REQUEST["idUser"];
        $idTimeSlot = $_REQUEST["idTimeSlot"];
        $date = $_REQUEST["date"];
        $remarks = $_REQUEST["remarks"];

        $disponible = Reservation::disponible($idResource, $idTimeSlot, $date);
        if($disponible){
            $this->reservation->insert($idResource, $idUser, $idTimeSlot, $date, $remarks);
            $this->view->show("reservations/showAllReservations");
        }else{
            $data['errorMsg'] = "Ya existe una reserva con este recurso a la misma hora";
            $this->view->show("reservations/addReservations", $data);
        }
        
    }




}

?>