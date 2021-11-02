<?php
    include_once ("models/reservation.php");
    //$res = $data["resources"][0];

    //VARIABLES
    $ruta_Imagen_Recurso = "/assets/images/resources/";
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


    echo "<a href='index.php?controller=UsersControl&action=showMenu'>Volver al Menú</a><br>";
    echo "<br><br>";
    echo "<a href='index.php?controller=ResourcesControl&action=selectResources'>Volver a Recursos</a><br>";
    echo "<br><br>";


    
    echo "<h2>INSERCIÓN DE RESERVAS</h2>";

    if($data){
        $error = "Ya existe una reserva con estos datos";
        echo "<p style='color:#FF0000';>$error</p>";
    }

    
    echo "<form action='index.php' method='POST'>
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

    echo "<label> Fecha: </label><input type='date' format='yyyy-mm-dd' name='date' placeholder='Fecha'><br>";

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