<?php

    $timeslots = $data["timeslots"];

    //VARIABLES
    $ruta_TimeSlots_Control="index.php?controller=TimeSlotsControl&action=deleteTimeSlots&idTimeSlot=";
    $ruta_Delete = "http://localhost/ReservaRecursos/assets/images/buttons/delete.png";
    $ruta_Editar = "http://localhost/ReservaRecursos/assets/images/buttons/edit.png";
    $ruta_Search = "http://localhost/ReservaRecursos/assets/images/buttons/search.png";
    $estilo_Button = "style=width:25px;height:25px;";

    if (isset($data['text'])) {
        echo "<div class='error'>".$data['text']."</div>";
    }


    echo "<a href='index.php?action=showMenu'>Volver al Menú</a><br>";
    echo "<br><br>";
    echo "<a href='index.php?action=showMenu'> <img src='$ruta_Search'$estilo_Button> </a><br>";

    echo "<h1>VISTA DE TODOS LOS HORARIOS</h1>

    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>Dia de la Semana</th>
                <th>Fecha Inicio</th>
                <th>Fecha Fin</th>
                <th>Editar</th>
                <th>Borrar</th>
            </tr>
        </thead>
        <tbody>
            ";
    foreach ($timeslots as $res) {
                echo "<tr>
                <td>".$res['idTimeSlot']."</td>
                <td>".$res['dayOfWeek']."</td>
                <td>".$res['startTime']."</td>
                <td>".$res['endTime']."</td>
                <td> <a > <img src='$ruta_Editar'$estilo_Button> </a> </td>
                <td> <a href='".$ruta_TimeSlots_Control."".$res['idTimeSlot']."'> <img src='$ruta_Delete'$estilo_Button> </a></t d>
                </tr>";
    }
    echo "</table>";
    echo "<br><br><br>";
    echo "<a href='index.php?action=showMenu'>Volver al Menú</a><br>";



?>