<?php
    $resources = $data["resources"];

    //VARIABLES
    $ruta_Resources_Control="index.php?controller=ResourcesControl&action=deleteResources&idResource=";
    $ruta_Resources_Control_Update="index.php?controller=ResourcesControl&action=updateResources&idResource=";
    $ruta_Imagen_Recurso = "http://localhost/ReservaRecursos/assets/images/resources/";
    $ruta_Delete = "http://localhost/ReservaRecursos/assets/images/buttons/delete.png";
    $ruta_Editar = "http://localhost/ReservaRecursos/assets/images/buttons/edit.png";
    $ruta_Search = "http://localhost/ReservaRecursos/assets/images/buttons/search.png";
    $ruta_Add = "http://localhost/ReservaRecursos/assets/images/buttons/add.png";
    $estilo_Recurso = "style=width:60px;height:60px;";
    $estilo_Button = "style=width:25px;height:25px;";
    
    if (isset($data['text'])) {
        echo "<div class='error'>".$data['text']."</div>";
    }


    /*VOLVER AL MENÚ */
    echo "<a href='index.php?controller=UsersControl&action=showMenu'>Volver al Menú</a><br>";
    echo "<br><br>";

    /*BUSCAR RECURSOS */ //AÑADIR PARAMETRO: $textoBusqueda = $_REQUEST["textoBusqueda"];
    echo "<input type='text' name='textoBusqueda'>";
    echo "<a href='index.php?controller=ResourcesControl&action=searchResources'> <img src='$ruta_Search'$estilo_Button> </a>";

    /*AÑADIR RECURSOS */
    echo "<a href='index.php?action=showMenu'> <img src='$ruta_Add'$estilo_Button> </a><br>";

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