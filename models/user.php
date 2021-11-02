<?php

include_once("db.php");

class User
{

    /**
     * Comprueba si un email y una password pertenecen a algún usuario de la base  de datos.
     * @param String $email El email del usuario que se quiere comprobar
     * @param String $pass La contraseña del usuario que se quiere comprobar
     * @return User $usuario Si el usuario existe, devuelve un array con todos los campos del usuario en su interior. Si no, devuelve un objeto null
     */
    public function checkLogin($username, $password)
    {
       $result = DB::dataQuery("SELECT * FROM users WHERE username = '$username' AND password = '$password'");
       if (count($result) > 0){
           Security::createSession($result[0]['idUser']);
           return $result[0];
       }else{
           return null;
       }
    }

    /**
     * Busca en la base de datos la lista de roles de un usuario
     * @param integer $idUser El id del usuario
     * @return array $resultArray Un array con todos los roles del usuario, o null si el usuario no existe o no tiene roles asignados
     */
    public function getUserRoles($idUser)
    {
        $resultArray = array();
        $result = DB::dataQuery("SELECT roles.* FROM roles
                                            INNER JOIN `roles-users` ON roles.id = `roles-users`.idRol
                                            WHERE `roles-users`.idUser = '$idUser'");
        if (count($result) > 0)
              return $result;
        else
              return null;
    }

    /**
     * Busca en la base de datos la lista de todos los usuarios
     */
    public static function getAll(){
        $result = DB::dataQuery("SELECT * FROM users");
        return $result;
    }

    /**
     * Busca en la base de datos la lista de todos los usuarios que coincidan con el usuario pasado por parámetros
     * @param integer $idUser El id del usuario
     */
    public static function get($idUser) {
        $result = DB::dataQuery("SELECT * FROM users WHERE idUser = '$idUser'");        
        return $result;
    }

    /**
     * Busca en la base de datos la lista de username de todos los usuarios que coincidan con el usuario pasado por parámetros
     * @param integer $idUser El id del usuario
     */
    public static function getName($idUser) {
        $result = DB::dataQuery("SELECT username FROM users WHERE idUser = '$idUser'");
        foreach ($result as $username) {
            return $username["username"];
        }
    }

    /**
     * Busca en la base de datos la lista de username de todos los usuarios recorriendo un array
     */
    public static function getAllUsers(){
        $result = DB::dataQuery("SELECT * FROM users");
        foreach ($result as $user) {
            echo "<option value='".$user['idUser']."'>".$user['username']."</option>";
        }
    }

    /**
     * Borra en la base de datos el usuario que contenga el valor pasado en $idUser 
     */
    public static function deleteID(){
        $idUser = $_REQUEST["idUser"];
        $result = DB::dataManipulation("DELETE FROM users WHERE idUser = '$idUser'");
        return $result;
    }


    /**
     *Comprueba si un usuario pasado por la URL tiene reservas. Devuelve true en caso afirmativo o false si no las tiene
     */
    public static function hasReservationsUsers() {
        $idUser = $_REQUEST["idUser"];
        $result = DB::dataQuery("SELECT * FROM reservations WHERE idUser = '$idUser'");
        if($result != null && count($result)>0){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Inserta en la Base de Datos un usuario en la tabla usuarios
     */
    public static function insert(){
        $username = $_REQUEST["username"];
        $password = $_REQUEST["password"];
        $realname = $_REQUEST["realname"];
        
        $result = DB::dataManipulation("INSERT INTO users (username, password, realname)
        VALUES ('$username','$password','$realname')");
        return $result;
    }

    /**
     * Actualiza en la Base de Datos un usuario de la tabla usuarios por su id
     */
    public static function update(){
        $idUser = $_REQUEST["idUser"];
        $username = $_REQUEST["username"];
        $password = $_REQUEST["password"];
        $realname = $_REQUEST["realname"];

        $result = DB::dataManipulation("UPDATE users 
        SET username='$username', password='$password', realname='$realname'
        WHERE idUser = '$idUser'");
        return $result;
    }




}//END CLASS USERS
?>