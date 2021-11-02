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

echo "<p>Este es el menú de la aplicación de reserva de recursos. 
Desde aquí puede acceder desde la <b>barra de navegación</b> a las distintas tablas del sistema de reservas.</p>";

echo "<p>Desde cada tabla podrá realizar las siguientes acciones: </p>";
echo "<p>- Añadir datos</p>";
echo "<p>- Modificar datos</p>";
echo "<p>- Borrar datos</p>";

echo "<br><p>Podrá encontrar todo el código fuente de la aplicación en la siguiente dirección: </p>";
echo "<a href='https://github.com/burlof/MVC_ReservaRecursos' >Github del autor</a>";

echo "<br><br><br><br><br><br><br><br><br>";


/*
foreach ($data['permissions'] as $permission) {
    echo "<a href='index.php?action=" . $permission['action'] . "'>" . $permission['description'] . "</a><br>";
}*/

echo "<br><br>";


?>