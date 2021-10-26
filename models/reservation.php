<?php

include_once("db.php");

    class Reservation
    {

    public static function getAll(){
        $result = DB::dataQuery("SELECT * FROM reservations");
        return $result;
    }














    }//END CLASS RESOURCES

?>