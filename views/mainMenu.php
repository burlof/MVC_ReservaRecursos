<?php

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


echo "<br><b><u>Menú principal</u></b><br>";
echo "<br>";
echo "Bienvenido, ";
    if (Security::thereIsSession()) {
        echo "Usuario ".Security::getUserId()."<br>";
    }
echo "<br><br><br>";
//echo "<b>MENÚ DE OPCIONES:</b><br>";
echo "<br>";
echo "<br><br><br><br><br><br><br><br><br>";


/*
foreach ($data['permissions'] as $permission) {
    echo "<a href='index.php?action=" . $permission['action'] . "'>" . $permission['description'] . "</a><br>";
}*/

echo "<br><br>";


?>