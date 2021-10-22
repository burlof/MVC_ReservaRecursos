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





}

?>