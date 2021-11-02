<?php

    $timeslots = $data["timeslots"];

    //VARIABLES
    $ruta_TimeSlots_Control="index.php?controller=TimeSlotsControl&action=deleteTimeSlots&idTimeSlot=";
    $ruta_TimeSlots_Control_Update="index.php?controller=TimeSlotsControl&action=edit&idTimeSlot=";
    $ruta_TimeSlots_Control_Insert="index.php?controller=TimeSlotsControl&action=showInsert";
    $ruta_Delete = "/assets/images/buttons/delete.png";
    $ruta_Editar = "/assets/images/buttons/edit.png";
    $ruta_Add = "/assets/images/buttons/add.png";
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
    echo "<a href='index.php?action=showMenu'>Volver al Menú</a><br>";
    echo "<br><br>";

    /*AÑADIR RECURSOS */
    echo "<a href='".$ruta_TimeSlots_Control_Insert."'>  Añadir <img src='$ruta_Add'$estilo_Button></a><br>";

    /*TÍTULO VISTA */
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
                <td> <a href='".$ruta_TimeSlots_Control_Update."".$res['idTimeSlot']."'> <img src='$ruta_Editar'$estilo_Button> </a> </td>
                <td> <a href='".$ruta_TimeSlots_Control."".$res['idTimeSlot']."'> <img src='$ruta_Delete'$estilo_Button> </a></t d>
                </tr>";
    }
    echo "</table>";
    echo "<br><br><br>";
    echo "<a href='index.php?action=showMenu'>Volver al Menú</a><br>";



?>