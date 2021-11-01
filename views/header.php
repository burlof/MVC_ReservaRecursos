<!DOCTYPE html> 
<html lang="es-ES"> 
<head>
    <title>Reserva de Recursos</title>
    <link rel="stylesheet" type="text/css" href="assets/style.css">
    <!-- Aquí incluiría cualquier CSS o JS que vaya a usar por toda la web -->
    <!-- Por ejemplo: <link rel="stylesheet" type="text/css" href="assets/style.css"> -->
</head>
<body>
    <div class='header'>
        Esta es la cabecera de mi web
    </div>
    <div class='nav'>
        
        <?php
            if (Security::thereIsSession()) {
                echo "ID Usuario: ".Security::getUserId()."<br>";
            }
        ?>
        Esta es la barra de navegación<br><br>
    </div>
    <div class='container'>
