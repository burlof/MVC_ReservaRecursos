<?php
    $resources = $data["reservations"];

    //VARIABLES
    $ruta_Resources_Control="index.php?controller=ReservationsControl&action=deleteResources&idResource=";
    $ruta_Resources_Control_Update="index.php?controller=ReservationsControl&action=updateResources&idResource=";
    $ruta_Imagen_Recurso = "http://localhost/ReservaRecursos/assets/images/resources/";
    $ruta_Delete = "http://localhost/ReservaRecursos/assets/images/buttons/delete.png";
    $ruta_Editar = "http://localhost/ReservaRecursos/assets/images/buttons/edit.png";
    $ruta_Add = "http://localhost/ReservaRecursos/assets/images/buttons/add.png";
    $estilo_Recurso = "style=width:60px;height:60px;";
    $estilo_Button = "style=width:25px;height:25px;";
    
    if (isset($data['text'])) {
        echo "<div class='error'>".$data['text']."</div>";
    }


    /*VOLVER AL MENÚ */
    echo "<a href='index.php?controller=UsersControl&action=showMenu'>Volver al Menú</a><br>";
    echo "<br><br>";

    /*AÑADIR RECURSOS */
    echo "<a href='index.php?action=showMenu'> <img src='$ruta_Add'$estilo_Button> </a><br>";

    /*TÍTULO VISTA */
    echo "<h1>VISTA DE TODAS LAS RESERVAS</h1>
    
    <table>
        <thead>
            <tr>
                <th>idResource</th>
                <th>idUser</th>
                <th>idTimeSlot</th>
                <th>Date</th>
                <th>Remarks</th>
                <th>Editar</th>
                <th>Borrar</th>
            </tr>
        </thead>
        <tbody>
            ";
    foreach ($resources as $res) {
                echo "<tr>
                <td>".$res['idResource']."</td>
                <td>".$res['idUser']."</td>
                <td>".$res['idTimeSlot']."</td>
                <td>".$res['date']."</td>
                <td>".$res['remarks']."</td>
                <td> <a href='".$ruta_Resources_Control_Update."".$res['idResource']."'> <img src='$ruta_Editar'$estilo_Button> </a> </td>
                <td> <a href='".$ruta_Resources_Control."".$res['idResource']."'> <img src='$ruta_Delete'$estilo_Button> </a></t d>
                </tr>";
    }
    echo "</table>";
    echo "<br><br><br>";
    echo "<a href='index.php?controller=UsersControl&action=showMenu'>Volver al Menú</a><br>";

?>