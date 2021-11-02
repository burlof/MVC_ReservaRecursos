<?php
    include_once ("models/resource.php");
    include_once ("models/user.php");
    include_once ("models/timeslot.php");
    //include_once ("models/reservations.php");


    //$reservations = $data["reservations"];
    $reservations = Reservation::getAll();

    //VARIABLES
    $ruta_Reservations_Control="index.php?controller=ReservationsControl&action=deleteReservations&idReservation=";
    $ruta_Reservations_Control_Update="index.php?controller=ReservationsControl&action=updateReservations&idResource=";
    $ruta_Reservations_Control_Insert="index.php?controller=ReservationsControl&action=showInsert";
    $ruta_Delete = "http://localhost/ReservaRecursos/assets/images/buttons/delete.png";
    $ruta_Editar = "http://localhost/ReservaRecursos/assets/images/buttons/edit.png";
    $ruta_Add = "http://localhost/ReservaRecursos/assets/images/buttons/add.png";
    $estilo_Recurso = "style=width:60px;height:60px;";
    $estilo_Button = "style=width:25px;height:25px;";
    
    if (isset($data['text'])) {
        echo "<div class='error'>".$data['text']."</div>";
    }

    /*BARRA DE NAVEGACIÓN */
    echo "<header>
    <nav>
    <ul class='ul'>";

    //echo "<img src='/assets/images/resources/logo.png' style=width:50px;height:50px;>";
    echo "<span class='subencabezado'>RESERVA DE RECURSOS</span></a>";
    echo "<li class='li'><a class='a-menu' href='index.php?controller=ResourcesControl&action=selectResources'>Recursos</a></li>";
    echo "<li class='li'><a class='a-menu' href='index.php?controller=TimeSlotsControl&action=selectTimeSlots'>Tramos Horarios</a></li>";
    echo "<li class='li'><a class='a-menu' href='index.php?controller=UsersControl&action=selectUsers'>Usuarios</a></li>";
    echo "<li class='li'><a class='a-menu' href='index.php?controller=ReservationsControl&action=selectReservations'>Reservas</a></li>";
    echo "<li class='li'><a class='a-menu'href='index.php?controller=UsersControl&action=closeSession'>Cerrar sesión</a></li>";

    echo "</ul>
    </nav>
    </header>";


    /*VOLVER AL MENÚ */
    echo "<a href='index.php?controller=UsersControl&action=showMenu'>Volver al Menú</a><br>";
    echo "<br><br>";

    /*AÑADIR RESERVAS */
    echo "<a href='".$ruta_Reservations_Control_Insert."'>  Añadir <img src='$ruta_Add'$estilo_Button></a><br>";

    /*TÍTULO VISTA */
    echo "<h1>VISTA DE TODAS LAS RESERVAS</h1>
    
    <table>
        <thead>
            <tr>
                <th>Recurso</th>
                <th>Usuario</th>
                <th>Día Semana</th>
                <th>Hora Inicio</th>
                <th>Hora Fin</th>
                <th>Fecha</th>
                <th>Remarks</th>
                <th>Editar</th>
                <th>Borrar</th>
            </tr>
        </thead>
        <tbody>
            ";

    foreach ($reservations as $res) {
        $idReservation = $res['idReservation'];
        $idResource = $res['idResource'];
        $idUser = $res['idUser'];
        $idTimeSlot = $res['idTimeSlot'];
        $date = $res['date'];
        $remarks = $res['remarks'];
                
        $resourceName = Resource::getName($idResource);
        $usernameUser = User::getName($idUser);
        $timeslotDay = TimeSlot::getDay($idTimeSlot);
        $timeslotStart = TimeSlot::getStart($idTimeSlot);
        $timeslotEnd = TimeSlot::getEnd($idTimeSlot);


        echo "<tr>
        <td>$resourceName</td>
        <td>$usernameUser</td>
        <td>$timeslotDay</td>
        <td>$timeslotStart</td>
        <td>$timeslotEnd</td>
        <td>$date</td>
        <td>$remarks</td>
        <td> <a href='#'> <img src='$ruta_Editar'$estilo_Button> </a> </td>
        <td> <a href='".$ruta_Reservations_Control."".$res['idReservation']."'> <img src='$ruta_Delete'$estilo_Button> </a></t d>
        </tr>";
    }
    echo "</table>";
    echo "<br><br><br>";
    echo "<a href='index.php?controller=UsersControl&action=showMenu'>Volver al Menú</a><br>";

?>