<?php

include_once("db.php");

class Resource
{

    /**
     * Busca en la Base de Datos todos los datos de la tabla recursos
     */
    public static function getAll(){
        $result = DB::dataQuery("SELECT * FROM resources");
        return $result;
    }

    /**
     * Busca en la base de datos la lista de todos los recursos que coincidan con el id del recurso pasado por parámetros
     * @param integer $idResource El id del recurso
     */
    public static function get($idResource) {
        $resource = DB::dataQuery("SELECT * FROM resources WHERE idResource = '$idResource'");        
        return $resource;
    }

    /**
     * Busca en la base de datos la lista de nombres de todos los recursos que coincidan con el id del recurso pasado por parámetros
     * @param integer $idResource El id del recurso
     */
    public static function getName($idResource) {
        $resource = DB::dataQuery("SELECT name FROM resources WHERE idResource = '$idResource'");     
        foreach ($resource as $name) {
            return $name["name"];
        }
    }

    /**
     * Busca en la base de datos la lista de todos los recursos recorriendo un array
     */
    public static function getAllResources(){
        $result = DB::dataQuery("SELECT * FROM resources");
        foreach ($result as $resource) {
            echo "<option value=".$resource['idResource'].">".$resource['name']."</option>";
        }
    }

    /**
     * Elimina en la Base de Datos un recurso de la tabla recursos por su id
     */
    public static function deleteID(){
        $idResource = $_REQUEST["idResource"];

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
        $name = $_REQUEST["name"];
        $description = $_REQUEST["description"];
        $location = $_REQUEST["location"];
        $image = $_REQUEST["image"];

        $result = DB::dataManipulation("INSERT INTO resources (name, description, location, image)
        VALUES ('$name','$description','$location','$image')");
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