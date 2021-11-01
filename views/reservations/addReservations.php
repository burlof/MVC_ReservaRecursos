<?php
    include_once ("models/reservation.php");
    //$res = $data["resources"][0];

    //VARIABLES
    $ruta_Imagen_Recurso = "http://localhost/ReservaRecursos/assets/images/resources/";
    $estilo_Recurso = "style=width:60px;height:60px;";
    $estilo_Button = "style=width:25px;height:25px;";
    
    if (isset($data['text'])) {
        echo "<div class='error'>".$data['text']."</div>";
    }


    echo "<a href='index.php?controller=UsersControl&action=showMenu'>Volver al Menú</a><br>";
    echo "<br><br>";
    echo "<a href='index.php?controller=ResourcesControl&action=selectResources'>Volver a Recursos</a><br>";
    echo "<br><br>";

    echo "<h2>INSERCIÓN DE RESERVAS</h2>
    
    <form action='index.php' method='POST'>
    <input type='hidden' name='controller' value='ReservationsControl'>
    <input type='hidden' name='action' value='insertReservations'>";

    //echo "<label> ID: </label><input type='text' name='idResource' placeholder='ID'><br>";

    echo "<br>";

    echo "<label> Usuario: </label> <select id='idUser' name='idUser' placerholder='Usuario'>
    <option disabled selected> Escoge tu usuario </option>";
    User::getAllUsers();
    echo "</select> <br>";

    echo "<br><br>";

    echo "<label> Recurso: </label> <select id='idResource' name='idResource' placerholder='Recurso'>
    <option disabled selected> Escoge el recurso </option>";
    Resource::getAllResources();
    echo "</select> <br>";

    echo "<br><br>";
    

    echo "<label> Horario: </label> <select id='idTimeSlot' name='idTimeSlot' placerholder='Horario'>
    <option disabled selected> Escoge la hora </option>";
    TimeSlot::getAllTimeSlots();
    echo "</select> <br>";

    echo "<br><br>";

    echo "<label> Comentarios: </label><input type='text' name='remarks' placeholder='Deja tus Comentarios'><br>";
    
    
    echo "<button type='submit'>Aceptar</button>

    </form>";

    echo "<br><br><br>";
    echo "<a href='index.php?controller=UsersControl&action=showMenu'>Volver al Menú</a><br>";

?>