<?php

include_once("db.php");

    class Resource
    {

    /**
     * Recupera de la Base de Datos todos los datos de la tabla recursos
     */
    public static function getAll(){
        $result = DB::dataQuery("SELECT * FROM resources");
        return $result;
    }

    public static function get($idResource) {
        $resource = DB::dataQuery("SELECT * FROM resources WHERE idResource = '$idResource'");        
        return $resource;
    }

    /**
     * Elimina en la Base de Datos un recurso de la tabla recursos por su id
     */
    public static function deleteID(){
        $idResource = $_REQUEST["idResource"];
        //printf("Aqui viene el request: ".$_REQUEST["idResource"]."<br>");
        //printf("Aqui viene el recurso: ".$idResource);
        //echo "DELETE FROM resources WHERE idResource = '$idResource'";
        $result = DB::dataManipulation("DELETE FROM resources WHERE idResource = '$idResource'");
        return $result;
    }

    /**
     * Comprueba si un recurso pasado por la URL tiene reservas. Devuelve true en caso afirmativo o false si no las tiene
     */
    public static function hasReservations() {
        $idResource = $_REQUEST["idResource"];
        $result = DB::dataQuery("SELECT * FROM reservations WHERE idResource = '$idResource'");
        if($result != null && count($result)>0){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Inserta en la Base de Datos un recurso en la tabla recursos
     */
    public static function insert(){
        $idResource = $_REQUEST["idResource"];
        $name = $_REQUEST["name"];
        $description = $_REQUEST["description"];
        $location = $_REQUEST["location"];
        $image = $_REQUEST["image"];

        //printf("Aqui viene el request: ".$_REQUEST["idUser"]."<br>");
        //printf("Aqui viene el user: ".$idUser."<br>");
        echo "INSERT INTO resources 
        VALUES idResource='$idResource', name='$name', description='$description', location='$location', image='$image' ";
        
        $result = DB::dataManipulation("INSERT INTO resources 
        VALUES idResource='$idResource', name='$name', description='$description', location='$location', image='$image'");
        return $result;
    }


    /**
     * Actualiza en la Base de Datos un recurso de la tabla recursos por su id
     */
    public static function update(){
        $idResource = $_REQUEST["idResource"];
        $name = $_REQUEST["name"];
        $description = $_REQUEST["description"];
        $location = $_REQUEST["location"];
        $image = $_REQUEST["image"];

        $result = DB::dataManipulation("UPDATE resources 
        SET name='$name', description='$description', location='$location', image='$image'
        WHERE idResource = '$idResource'");
        return $result;
    }













}//END CLASS RESOURCES

?>