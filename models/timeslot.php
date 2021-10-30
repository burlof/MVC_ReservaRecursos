<?php

include_once("db.php");

    class TimeSlot
    {

    /**
     * Constructor de la clase.
     * Crea una conexión con la base de datos y la asigna a la variable $this->db
     */
    /*
    public function __construct()
    {
       DB::createConnection(); 
    }
    */

    /*
    public function getAll(){
        $resultArray = array();
        $result = DB::dataQuery("SELECT * FROM timeslots");
        if (count($result) > 0)
            return $result;
        else
            return null;
    }
    */

    public static function getAll(){
        $result = DB::dataQuery("SELECT * FROM timeslots");
        return $result;
    }

    public static function get($idTimeSlot){
        $result = DB::dataQuery("SELECT * FROM timeslots where idTimeSlot=$idTimeSlot");
        return $result;
    }

    public static function getDay($idTimeSlot){
        $result = DB::dataQuery("SELECT dayOfWeek FROM timeslots where idTimeSlot=$idTimeSlot");
        foreach ($result as $dayOfWeek) {
            return $dayOfWeek["dayOfWeek"];
        }
    }

    public static function getStart($idTimeSlot){
        $result = DB::dataQuery("SELECT startTime FROM timeslots where idTimeSlot=$idTimeSlot");
        foreach ($result as $startTime) {
            return $startTime["startTime"];
        }
    }

    public static function getEnd($idTimeSlot){
        $result = DB::dataQuery("SELECT endTime FROM timeslots where idTimeSlot=$idTimeSlot");
        foreach ($result as $endTime) {
            return $endTime["endTime"];
        }
    }

    public static function deleteID(){
        $idTimeSlot = $_REQUEST["idTimeSlot"];
        //printf("Aqui viene el request: ".$_REQUEST["idTimeSlot"]."<br>");
        //printf("Aqui viene el timeslot: ".$idTimeSlot);
        //echo "DELETE FROM timeslots WHERE idTimeSlot = '$idTimeSlot'";
        $result = DB::dataManipulation("DELETE FROM timeslots WHERE idTimeSlot = '$idTimeSlot'");
        return $result;
    }
    

    // Mira si un recurso pasado por la URL tiene reservas. Devuelve true en caso afirmativo o false si no las tiene
    public static function hasReservationsTimeSlots() {
        $idTimeSlot = $_REQUEST["idTimeSlot"];
        $result = DB::dataQuery("SELECT * FROM timeslots WHERE idTimeSlot = '$idTimeSlot'");
        if($result != null && count($result)>0){
            return true;
        }else{
            return false;
        }
    }














    }//END CLASS RESOURCES

?>