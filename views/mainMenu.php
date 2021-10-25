<?php
echo "<br><b><u>Menú principal</u></b><br>";
echo "<br>";
echo "Bienvenido, @nombre de usuario<br>";
echo "<br><br><br>";
echo "<b>MENÚ DE OPCIONES:</b><br>";
echo "<br>";
echo "<a href='index.php?controller=ResourcesControl&action=selectResources'>Mantenimiento de recursos</a><br><br>";
echo "<a href='index.php?controller=TimeSlotsControl&action=selectTimeSlots'>Mantenimiento de tramos horarios</a><br><br>";
echo "<a href='index.php?controller=UsersControl&action=selectUsers'>Mantenimiento de usuarios</a><br><br>";


/*
foreach ($data['permissions'] as $permission) {
    echo "<a href='index.php?action=" . $permission['action'] . "'>" . $permission['description'] . "</a><br>";
}*/

echo "<br><br>";
echo "<a href='index.php?controller=UsersControl&action=closeSession'>Cerrar sesión</a>";


?>