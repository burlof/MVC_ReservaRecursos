<?php
    include_once ("models/user.php");
    $res = $data["users"][0];

    //VARIABLES
    $ruta_Editar = "/assets/images/buttons/edit.png";
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
    echo "<a href='index.php?controller=UsersControl&action=selectUsers'>Volver a Usuarios</a><br>";
    echo "<br><br>";

    echo "<h2>MODIFICACIÓN DE USUARIO</h2>
    
    <form action='index.php' method='GET'>
    <input type='hidden' name='controller' value='UsersControl'>
    <input type='hidden' name='action' value='updateUsers'>";

    echo "<input type='hidden' name='idUser' value='".$res['idUser']."'><br>

    <label> UserName: </label><input type='text' name='username' value='".$res['username']."'><br>

    <label> Password: </label><input type='text' name='password' value='".$res['password']."'><br>

    <label> RealName: </label><input type='text' name='realname' value='".$res['realname']."'><br>
    
    <button type='submit'>Aceptar</button>

    </form>";
    
    echo "<br><br><br>";
    echo "<a href='index.php?controller=UsersControl&action=showMenu'>Volver al Menú</a><br>";

?>