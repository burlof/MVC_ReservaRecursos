<?php
    include_once ("models/user.php");
    $res = $data["users"][0];

    //VARIABLES
    $ruta_Editar = "http://localhost/ReservaRecursos/assets/images/buttons/edit.png";
    $ruta_Imagen_Recurso = "http://localhost/ReservaRecursos/assets/images/resources/";
    $estilo_Recurso = "style=width:60px;height:60px;";
    $estilo_Button = "style=width:25px;height:25px;";
    
    if (isset($data['text'])) {
        echo "<div class='error'>".$data['text']."</div>";
    }


    echo "<a href='index.php?controller=UsersControl&action=showMenu'>Volver al Menú</a><br>";
    echo "<br><br>";
    echo "<a href='index.php?controller=UsersControl&action=selectUsers'>Volver a Usuarios</a><br>";
    echo "<br><br>";

    echo "<h2>MODIFICACIÓN DE USUARIO</h2>
    
    <form action='index.php' method='GET'>
    <input type='hidden' name='controller' value='UsersControl'>
    <input type='hidden' name='action' value='updateUsers'>";

    echo "<input type='hidden' name='idUser' value='".$res['idUser']."'><br>

    <label> UserName: </label><input type='text' name='username' value='".$res['username']."'><br>

    <label> Password: </label><input type='text' name='password' value='".$res['password']."'><br>

    <label> RealName: </label><input type='text' name='realname' value='".$res['realname']."'><br>
    
    <button type='submit'>Aceptar</button>

    </form>";
    
    echo "<br><br><br>";
    echo "<a href='index.php?controller=UsersControl&action=showMenu'>Volver al Menú</a><br>";

?>