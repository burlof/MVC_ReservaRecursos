<?php
    $resources = $data["resources"];

    //VARIABLES
    $ruta_Resources_Control="index.php?controller=ResourcesControl&action=deleteResources&idResource=";
    $ruta_Editar = "http://localhost/ReservaRecursos/assets/images/buttons/edit.png";
    $ruta_Imagen_Recurso = "http://localhost/ReservaRecursos/assets/images/resources/";
    $estilo_Recurso = "style=width:60px;height:60px;";
    $estilo_Button = "style=width:25px;height:25px;";
    
    if (isset($data['text'])) {
        echo "<div class='error'>".$data['text']."</div>";
    }


    echo "<a href='index.php?controller=UsersControl&action=showMenu'>Volver al Menú</a><br>";
    echo "<br><br>";
    echo "<a href='index.php?action=showMenu'> <img src='$ruta_Editar'$estilo_Button> </a>";

    echo "<h2>MODIFICACIÓN DE LOS RECURSOS</h2>
    
    <label> ID: </label><input type='text' name='id' value='";
    foreach ($resources as $res) {
                $res['idResource'];
    }
    "'><br>

    <label> Name: </label><input type='text' name='name' value='";
    foreach ($resources as $res) {
                $res['name'];
    }
    "'><br>";


    /*
    foreach ($resources as $res) {
                echo "<tr>
                <td>".$res['idResource']."</td>
                <td>".$res['name']."</td>
                <td>".$res['description']."</td>
                <td>".$res['location']."</td>
                <td><img src='$ruta_Imagen_Recurso".$res['image']."'$estilo_Recurso></td>
                </tr>";
    }
    echo "</table>";
    */
    echo "<br><br><br>";
    echo "<a href='index.php?controller=UsersControl&action=showMenu'>Volver al Menú</a><br>";

?>