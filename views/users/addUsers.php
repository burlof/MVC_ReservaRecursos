<?php
    include_once ("models/resource.php");
    //$res = $data["resources"][0];

    //VARIABLES
    $ruta_Imagen_Recurso = "http://localhost/ReservaRecursos/assets/images/resources/";
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
    echo "<a href='index.php?controller=UsersControl&action=selectUsers'>Volver a Usuarios</a><br>";
    echo "<br><br>";

    echo "<h2>INSERCIÓN DE USUARIO</h2>
    
    <form action='index.php' method='GET'>
    <input type='hidden' name='controller' value='UsersControl'>
    <input type='hidden' name='action' value='insertUsers'>";

    //echo "<label> ID: </label><input type='text' name='idResource' placeholder='ID'><br>";

    echo "<label> Username: </label><input type='text' name='username' placeholder='Username'><br>

    <label> Password: </label><input type='text' name='password' placeholder='Contraseña'><br>

    <label> Realname: </label><input type='text' name='realname' placeholder='Nombre Real'><br>
    
    <button type='submit'>Aceptar</button>

    </form>";

    echo "<br><br><br>";
    echo "<a href='index.php?controller=UsersControl&action=showMenu'>Volver al Menú</a><br>";

?>