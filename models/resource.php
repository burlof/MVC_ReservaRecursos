<?php

include_once("db.php");

    class Resource
    {

    /*
        public function getAll(){
            $resultArray = array();
            $result = DB::dataQuery("SELECT * FROM resources");
            if (count($result) > 0)
                return $result;
            else
                return null;
        }
    */

    public static function getAll(){
        $result = DB::dataQuery("SELECT * FROM resources");
        return $result;
    }

    public static function deleteID(){
        $idResource = $_REQUEST["idResource"];
        printf("Aqui viene el request: ".$_REQUEST["idResource"]."<br>");
        printf("Aqui viene el recurso: ".$idResource);
        echo "DELETE FROM resources WHERE idResource = '$idResource'";
        $result = DB::dataManipulation("DELETE FROM resources WHERE idResource = '$idResource'");
        return $result;

        /*
        if ($result::affected_rows == 0) {
            echo "Ha ocurrido un error al borrar la película. Por favor, inténtelo de nuevo";
        } else {
            echo "Película borrada con éxito";
        }*/
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













}//END CLASS RESOURCES

?>