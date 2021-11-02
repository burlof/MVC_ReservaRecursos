<?php
    $resources = $data["resources"];

    //VARIABLES
    $ruta_Resources_Control="index.php?controller=ResourcesControl&action=deleteResources&idResource=";
    $ruta_Resources_Control_Update="index.php?controller=ResourcesControl&action=edit&idResource=";
    $ruta_Resources_Control_Insert="index.php?controller=ResourcesControl&action=showInsert";
    $ruta_Imagen_Recurso = "/assets/images/resources/";
    $ruta_Delete = "/assets/images/buttons/delete.png";
    $ruta_Editar = "/assets/images/buttons/edit.png";
    $ruta_Add = "/assets/images/buttons/add.png";
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

    /*AÑADIR RECURSOS */
    echo "<a href='".$ruta_Resources_Control_Insert."'>  Añadir <img src='$ruta_Add'$estilo_Button></a><br>";

    /*TÍTULO VISTA */
    echo "<h1>VISTA DE TODOS LOS RECURSOS</h1>
    
    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Localización</th>
                <th>Imagen</th>
                <th>Editar</th>
                <th>Borrar</th>
            </tr>
        </thead>
        <tbody>
            ";
    foreach ($resources as $res) {
                echo "<tr>
                <td>".$res['idResource']."</td>
                <td>".$res['name']."</td>
                <td>".$res['description']."</td>
                <td>".$res['location']."</td>
                <td><img src='$ruta_Imagen_Recurso".$res['image']."'$estilo_Recurso></td>
                <td> <a href='".$ruta_Resources_Control_Update."".$res['idResource']."'> <img src='$ruta_Editar'$estilo_Button> </a> </td>
                <td> <a href='".$ruta_Resources_Control."".$res['idResource']."'> <img src='$ruta_Delete'$estilo_Button> </a></t d>
                </tr>";
    }
    echo "</table>";
    echo "<br><br><br>";
    echo "<a href='index.php?controller=UsersControl&action=showMenu'>Volver al Menú</a><br>";

?>