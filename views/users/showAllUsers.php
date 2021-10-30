<?php

    $users = $data["users"];

    //VARIABLES
    $ruta_Users_Control="index.php?controller=UsersControl&action=deleteUsers&idUser=";
    $ruta_Users_Control_Update="index.php?controller=UsersControl&action=edit&idUser=";
    $ruta_Users_Control_Insert="index.php?controller=UsersControl&action=showInsert";
    $ruta_Delete = "http://localhost/ReservaRecursos/assets/images/buttons/delete.png";
    $ruta_Editar = "http://localhost/ReservaRecursos/assets/images/buttons/edit.png";
    $ruta_Add = "http://localhost/ReservaRecursos/assets/images/buttons/add.png";
    $estilo_Button = "style=width:25px;height:25px;";

    if (isset($data['text'])) {
        echo "<div class='error'>".$data['text']."</div>";
    }


    echo "<a href='index.php?action=showMenu'>Volver al Menú</a><br>";
    echo "<br><br>";

    /*AÑADIR USUARIOS */
    echo "<a href='".$ruta_Users_Control_Insert."'>  Añadir <img src='$ruta_Add'$estilo_Button></a><br>";

    echo "<h1>VISTA DE TODOS LOS USUARIOS</h1>

    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>UserName</th>
                <th>Password</th>
                <th>Nombre</th>
                <th>Editar</th>
                <th>Borrar</th>
            </tr>
        </thead>
        <tbody>
            ";
    foreach ($users as $res) {
                echo "<tr>
                <td>".$res['idUser']."</td>
                <td>".$res['username']."</td>
                <td>".$res['password']."</td>
                <td>".$res['realname']."</td>
                <td> <a href='".$ruta_Users_Control_Update."".$res['idUser']."'> <img src='$ruta_Editar'$estilo_Button> </a> </td>
                <td> <a href='".$ruta_Users_Control."".$res['idUser']."'> <img src='$ruta_Delete'$estilo_Button> </a></t d>
                </tr>";
    }
    echo "</table>";
    echo "<br><br><br>";
    echo "<a href='index.php?action=showMenu'>Volver al Menú</a><br>";

    ?>