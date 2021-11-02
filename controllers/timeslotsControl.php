<?php

include_once ("view.php");
include_once ("models/security.php");
include_once ("models/timeslot.php");


class TimeSlotsControl{
    
    private $view;

    /**
     * Contructor del controlador de horarios
     */
    public function __construct(){
        $this->view = new View(); // Vistas
        DB::createConnection(); 
    }

     /**
     * Muestra una lista de todos los horarios de la base de datos
     */
    public function selectTimeSlots()
    {
        $data['timeslots'] = TimeSlot::getAll();
        $this->view->show("timeslots/showAllTimeSlots", $data);
    }

    /**
     * Elimina un horario por su id de la base de datos
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

    /**
     * Muestra el formulario del horario seleccionado para ser modificado
     */
    public function edit() {
        $data['timeslots'] = TimeSlot::get($_REQUEST['idTimeSlot']);
        $this->view->show("timeslots/updateTimeSlots", $data);

    }

    /**
     * Muestra una nueva vista para insertar horarios en la base de datos
     */
    public function showInsert()
    {
        $this->view->show("timeslots/addTimeSlots");
    }

    /**
     * Inserta un nuevo horario en la base de datos
     */
    public function insertTimeSlots(){
        TimeSlot::insert();
        $data['timeslots'] = TimeSlot::getAll();
        $this->view->show("timeslots/showAllTimeSlots", $data);
    }


    /**
     * Actualiza/Modifica un horario por su id de la base de datos
     */
    public function updateTimeSlots(){
        TimeSlot::update();
        $data['timeslots'] = TimeSlot::getAll();
        $this->view->show("timeslots/showAllTimeSlots", $data);
    }



}

?>