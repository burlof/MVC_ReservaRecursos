<?php

include_once("db.php");

class Reservation
{

    /**
     * Busca en la Base de Datos todos los datos de la tabla reservas
     */
    public static function getAll(){
        $result = DB::dataQuery("SELECT * FROM reservations");
        return $result;
    }

    /**
     * Elimina en la Base de Datos una reserva de la tabla reservas por su id
     */
    public static function deleteID(){
        $idReservation = $_REQUEST["idReservation"];

        $result = DB::dataManipulation("DELETE FROM reservations WHERE idReservation = '$idReservation'");
        return $result;
    }

    /**
     * Inserta en la Base de Datos una reserva en la tabla reservas
     * @param integer $idResource El id del recurso
     * @param integer $idUser El id del usuario
     * @param integer $idTimeSlot El id del horario
     * @param String $remarks Los comentarios de la reserva
     */
    public static function insert($idResource, $idUser, $idTimeSlot, $remarks){
        $date = date("Y-m-d H:i:s");
        
        $result = DB::dataManipulation("INSERT INTO reservations (idResource, idUser, idTimeSlot, date, remarks)
        VALUES ('$idResource','$idUser','$idTimeSlot','$date','$remarks')");
        return $result;
    }

    /**
     * Comprueba si existen reservas con los datos pasados por parámetro. Si ya existe la reserva se iguala a false y no permite hacerla,
     * si por el contrario no existe reserva con esos datos, se iguala a true y puedes hacer una reserva.
     * @param integer $idResource El id del recurso
     * @param integer $idTimeSlot El id del horario
     * @param integer $date La fecha de la reserva
     */
    public static function disponible($idResource, $idTimeSlot, $date){
        $result = DB::dataQuery("SELECT * FROM reservations WHERE idResource= '$idResource' AND idTimeSlot='$idTimeSlot' AND date='$date'");

        if(empty($result)){
            $disponible=true;
        }else{
            $disponible=false;
        }
        return $disponible;
    }



}//END CLASS RESOURCES

?>