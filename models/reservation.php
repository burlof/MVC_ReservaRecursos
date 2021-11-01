<?php

include_once("db.php");

    class Reservation
    {

    public static function getAll(){
        $result = DB::dataQuery("SELECT * FROM reservations");
        return $result;
    }

    /**
     * Elimina en la Base de Datos un recurso de la tabla recursos por su id
     */
    public static function deleteID(){
        $idReservation = $_REQUEST["idReservation"];
        //printf("Aqui viene el request: ".$_REQUEST["idResource"]."<br>");
        //printf("Aqui viene el recurso: ".$idResource);
        //echo "DELETE FROM resources WHERE idResource = '$idResource'";
        $result = DB::dataManipulation("DELETE FROM reservations WHERE idReservation = '$idReservation'");
        return $result;
    }

    /**
     * Inserta en la Base de Datos un recurso en la tabla recursos
     */
    public static function insert($idResource, $idUser, $idTimeSlot, $remarks){
        //$idResource = $_REQUEST["idResource"];
        //$idUser = $_REQUEST["idUser"];
        //$idTimeSlot = $_REQUEST["idTimeSlot"];
        //$remarks = $_REQUEST["remarks"];
        $date = date("Y-m-d H:i:s");
        
        $result = DB::dataManipulation("INSERT INTO reservations (idResource, idUser, idTimeSlot, date, remarks)
        VALUES ('$idResource','$idUser','$idTimeSlot','$date','$remarks')");
        return $result;
    }

    public static function disponible($idResource, $idTimeSlot){
        $result = DB::dataQuery("SELECT * FROM reservations WHERE idResource= '$idResource' AND idTimeSlot='$idTimeSlot'");

        if(empty($result)){
            $disponible=true;
        }else{
            $disponible=false;
        }
        return $disponible;
    }














    }//END CLASS RESOURCES

?>