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













    }//END CLASS RESOURCES

?>