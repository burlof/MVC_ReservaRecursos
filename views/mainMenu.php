<?php
echo "<b>Menú principal</b><br>";
echo "<br>";
echo "Bienvenido, @nombre de usuario<br>";
echo "<br>";
echo "MENÚ DE OPCIONES<br>";
echo "<br><br><br>";
echo "<a href='index.php?action=selectResources'>Mantenimiento de recursos</a><br>";
echo "<a href='index.php?action=selectTimeSlots'>Mantenimiento de tramos horarios</a><br>";
echo "<a href='index.php?action=selectUsers'>Mantenimiento de usuarios</a><br>";


/*
foreach ($data['permissions'] as $permission) {
    echo "<a href='index.php?action=" . $permission['action'] . "'>" . $permission['description'] . "</a><br>";
}*/

echo "<br><br><br>";
echo "<a href='index.php?action=closeSession'>Cerrar sesión</a>";


?>