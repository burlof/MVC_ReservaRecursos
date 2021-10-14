<?php

include_once("db.php");

    class Reservation
    {

    /**
     * Constructor de la clase.
     * Crea una conexión con la base de datos y la asigna a la variable $this->db
     */
    public function __construct()
    {
       DB::createConnection(); 
    }

    public function getAll(){
        $resultArray = array();
        $result = DB::dataQuery("SELECT * FROM reservations");
        if (count($result) > 0)
            return $result;
        else
            return null;
    }














    }//END CLASS RESOURCES

?>