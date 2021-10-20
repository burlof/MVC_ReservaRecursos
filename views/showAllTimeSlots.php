<?php

    $timeslots = $data["timeslots"];

    echo "<h1>VISTA DE TODOS LOS HORARIOS</h1>

    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>Dia de la Semana</th>
                <th>Fecha Inicio</th>
                <th>Fecha Fin</th>
                <th>Acción 1</th>
                <th>Acción 2</th>
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
                </tr>";
    }
    echo "</table>";
    echo "<br><br><br>";
    echo "<a href='index.php?action=showMenu'>Volver al Menú</a><br>";



?>