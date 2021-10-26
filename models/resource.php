<?php

include_once("db.php");

    class Resource
    {

    public static function getAll(){
        $result = DB::dataQuery("SELECT * FROM resources");
        return $result;
    }

    public static function deleteID(){
        $idResource = $_REQUEST["idResource"];
        //printf("Aqui viene el request: ".$_REQUEST["idResource"]."<br>");
        //printf("Aqui viene el recurso: ".$idResource);
        //echo "DELETE FROM resources WHERE idResource = '$idResource'";
        $result = DB::dataManipulation("DELETE FROM resources WHERE idResource = '$idResource'");
        return $result;
    }

    // Mira si un recurso pasado por la URL tiene reservas. Devuelve true en caso afirmativo o false si no las tiene
    public static function hasReservations() {
        $idResource = $_REQUEST["idResource"];
        $result = DB::dataQuery("SELECT * FROM reservations WHERE idResource = '$idResource'");
        if($result != null && count($result)>0){
            return true;
        }else{
            return false;
        }
    }

    public static function updateID(){
        $idResource = $_REQUEST["idResource"];
        //printf("Aqui viene el request: ".$_REQUEST["idResource"]."<br>");
        //printf("Aqui viene el recurso: ".$idResource);
        //echo "DELETE FROM resources WHERE idResource = '$idResource'";
        $result = DB::dataManipulation("UPDATE FROM resources WHERE idResource = '$idResource'");
        return $result;
    }

    public static function buscar(/*$textoBusqueda/*-->Pasar aquí parámetro*/){
        $result = DB::dataQuery("SELECT * FROM resources WHERE idResource LIKE '%$textoBusqueda%' 
                                                            OR name LIKE '%$textoBusqueda%'
                                                            OR description LIKE '%$textoBusqueda%'
                                                            OR location LIKE '%$textoBusqueda%'");
        return $result;
    }












}//END CLASS RESOURCES

?>