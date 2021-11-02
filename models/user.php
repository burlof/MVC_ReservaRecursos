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

    public static function getAll(){
        $result = DB::dataQuery("SELECT * FROM users");
        return $result;
    }

    public static function get($idUser) {
        $result = DB::dataQuery("SELECT * FROM users WHERE idUser = '$idUser'");        
        return $user;
    }

    public static function getName($idUser) {
        $result = DB::dataQuery("SELECT username FROM users WHERE idUser = '$idUser'");
        foreach ($result as $username) {
            return $username["username"];
        }
    }

    public static function getAllUsers(){
        $result = DB::dataQuery("SELECT * FROM users");
        foreach ($result as $user) {
            echo "<option value='".$user['idUser']."'>".$user['username']."</option>";
        }
    }

    public static function deleteID(){
        $idUser = $_REQUEST["idUser"];
        //printf("Aqui viene el request: ".$_REQUEST["idUser"]."<br>");
        //printf("Aqui viene el user: ".$idUser);
        //echo "DELETE FROM users WHERE idUser = '$idUser'";
        $result = DB::dataManipulation("DELETE FROM users WHERE idUser = '$idUser'");
        return $result;
    }


    // Mira si un recurso pasado por la URL tiene reservas. Devuelve true en caso afirmativo o false si no las tiene
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
     * Inserta en la Base de Datos un recurso en la tabla recursos
     */
    public static function insert(){
        $username = $_REQUEST["username"];
        $password = $_REQUEST["password"];
        $realname = $_REQUEST["realname"];

        //printf("Aqui viene el request: ".$_REQUEST["idUser"]."<br>");
        //printf("Aqui viene el user: ".$idUser."<br>");
        echo "INSERT INTO users (username, password, realname)
        VALUES (username='$username', password='$password', realname='$realname'')";
        
        $result = DB::dataManipulation("INSERT INTO users (username, password, realname)
        VALUES ('$username','$password','$realname')");
        return $result;
    }

    /**
     * Actualiza en la Base de Datos un recurso de la tabla recursos por su id
     */
    public static function update(){
        $idUser = $_REQUEST["idUser"];
        $username = $_REQUEST["username"];
        $password = $_REQUEST["password"];
        $realname = $_REQUEST["realname"];

        printf("Aqui viene el request: ".$_REQUEST["idUser"]."<br>");
        printf("Aqui viene el user: ".$idUser."<br>");
        echo "UPDATE users 
        SET username='$username', password='$password', realname='$realname'
        WHERE idUser = '$idUser'";

        $result = DB::dataManipulation("UPDATE users 
        SET username='$username', password='$password', realname='$realname'
        WHERE idUser = '$idUser'");
        return $result;
    }








    


}//END CLASS USERS
?>