<?php
    include_once ("models/timeslot.php");
    //$res = $data["timeslots"][0];

    //VARIABLES
    $ruta_Imagen_Recurso = "http://localhost/ReservaRecursos/assets/images/resources/";
    $estilo_Recurso = "style=width:60px;height:60px;";
    $estilo_Button = "style=width:25px;height:25px;";
    
    if (isset($data['text'])) {
        echo "<div class='error'>".$data['text']."</div>";
    }


    echo "<a href='index.php?controller=UsersControl&action=showMenu'>Volver al Menú</a><br>";
    echo "<br><br>";
    echo "<a href='index.php?controller=TimeSlotsControl&action=selectTimeSlots'>Volver a TimeSlots</a><br>";
    echo "<br><br>";

    echo "<h2>INSERCIÓN DE HORARIOS</h2>
    
    <form action='index.php' method='GET'>
    <input type='hidden' name='controller' value='TimeSlotsControl'>
    <input type='hidden' name='action' value='insertTimeSlots'>";

    //echo "<input type='hidden' name='idTimeSlot'><br>";

    echo "<label> Día: </label><input type='text' name='dayOfWeek' placeholder='Día de la Semana'><br>

    <label> Fecha Inicio: </label><input type='text' name='startTime' placeholder='Fecha Inicio'><br>

    <label> Fecha Fin: </label><input type='text' name='endTime' placeholder='Fecha Fin'><br>
    
    <button type='submit'>Aceptar</button>

    </form>";

    echo "<br><br><br>";
    echo "<a href='index.php?controller=UsersControl&action=showMenu'>Volver al Menú</a><br>";

?>