<?php

include_once ("view.php");
include_once ("models/security.php");
include_once ("models/timeslot.php");


class TimeSlotsControl{
    
    private $view;

    public function __construct(){
        $this->view = new View(); // Vistas
        DB::createConnection(); 
    }

     /**
     * Muestra una lista de todos los recursos de la base de datos
     */
    public function selectTimeSlots()
    {
        $data['timeslots'] = TimeSlot::getAll();
        $this->view->show("timeslots/showAllTimeSlots", $data);
    }

    /**
     * Elimina un timeslot por su id de la base de datos
     */
    public function deleteTimeSlots(){
        $hasReservations = TimeSlot::hasReservationsTimeSlots();
        $text = "";
        if ($hasReservations) {
            $text = "No puedes borrar esa fecha porque tiene reservas. ";
        }
        $result = TimeSlot::deleteID();
        if ($result == 0) {
            $text = $text . "Ha fallado el borrado";
        } else {
            $text = $text . "Borrado con éxito";
        }
        $this->selectTimeSlots($text);
    }





}

?>