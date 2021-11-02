<?php

include_once("db.php");

class TimeSlot
{

    /**
     * Busca en la base de datos la lista de todos los horarios
     */
    public static function getAll(){
        $result = DB::dataQuery("SELECT * FROM timeslots");
        return $result;
    }

    /**
     * Busca en la base de datos la lista de todos los horarios que coincidan con el id del horario pasado por parámetros
     * @param integer $idTimeSlot El id del horario
     */
    public static function get($idTimeSlot){
        $result = DB::dataQuery("SELECT * FROM timeslots where idTimeSlot=$idTimeSlot");
        return $result;
    }

    /**
     * Busca en la base de datos la lista de todos los horarios recorriendo un array
     */
    public static function getAllTimeSlots(){
        $result = DB::dataQuery("SELECT * FROM timeslots");
        foreach ($result as $timeslot) {
            echo "<option value=".$timeslot['idTimeSlot']."> Dia: ".$timeslot['dayOfWeek']. " De ". $timeslot['startTime'] ." a ". $timeslot['endTime']."</option>";
        }
    }

    /**
     * Busca en la base de datos la lista de días de todos los horarios recorriendo un array
     * @param integer $idTimeSlot El id del horario
     */
    public static function getDay($idTimeSlot){
        $result = DB::dataQuery("SELECT dayOfWeek FROM timeslots where idTimeSlot=$idTimeSlot");
        foreach ($result as $dayOfWeek) {
            return $dayOfWeek["dayOfWeek"];
        }
    }

    /**
     * Busca en la base de datos la lista de fecha inicio de todos los horarios recorriendo un array
     * @param integer $idTimeSlot El id del horario
     */
    public static function getStart($idTimeSlot){
        $result = DB::dataQuery("SELECT startTime FROM timeslots where idTimeSlot=$idTimeSlot");
        foreach ($result as $startTime) {
            return $startTime["startTime"];
        }
    }

    /**
     * Busca en la base de datos la lista de fecha fin de todos los horarios recorriendo un array
     * @param integer $idTimeSlot El id del horario
     */
    public static function getEnd($idTimeSlot){
        $result = DB::dataQuery("SELECT endTime FROM timeslots where idTimeSlot=$idTimeSlot");
        foreach ($result as $endTime) {
            return $endTime["endTime"];
        }
    }

    /**
     * Borra en la base de datos el horario que contenga el valor pasado en $idTimeSlot
     */
    public static function deleteID(){
        $idTimeSlot = $_REQUEST["idTimeSlot"];

        $result = DB::dataManipulation("DELETE FROM timeslots WHERE idTimeSlot = '$idTimeSlot'");
        return $result;
    }
    

    /**
     *Comprueba si un horario pasado por la URL tiene reservas. Devuelve true en caso afirmativo o false si no las tiene
     */
    public static function hasReservationsTimeSlots() {
        $idTimeSlot = $_REQUEST["idTimeSlot"];
        $result = DB::dataQuery("SELECT * FROM timeslots WHERE idTimeSlot = '$idTimeSlot'");
        if($result != null && count($result)>0){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Inserta en la Base de Datos un horario en la tabla timeslots
     */
    public static function insert(){
        $dayOfWeek = $_REQUEST["dayOfWeek"];
        $startTime = $_REQUEST["startTime"];
        $endTime = $_REQUEST["endTime"];
        
        $result = DB::dataManipulation("INSERT INTO timeslots (dayOfWeek, startTime, endTime)
        VALUES ('$dayOfWeek','$startTime','$endTime')");
        return $result;
    }

    /**
     * Actualiza en la Base de Datos un horario de la tabla timeslots por su id
     */
    public static function update(){
        $idTimeSlot = $_REQUEST["idTimeSlot"];
        $dayOfWeek = $_REQUEST["dayOfWeek"];
        $startTime = $_REQUEST["startTime"];
        $endTime = $_REQUEST["endTime"];

        $result = DB::dataManipulation("UPDATE timeslots 
        SET dayOfWeek='$dayOfWeek', startTime='$startTime', endTime='$endTime'
        WHERE idTimeSlot = '$idTimeSlot'");
        return $result;
    }



}//END CLASS RESOURCES

?>