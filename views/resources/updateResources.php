<?php
    include_once ("models/resource.php");
    $res = $data["resources"][0];

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
    echo "<a href='index.php?controller=ResourcesControl&action=selectResources'>Volver a Recursos</a><br>";
    echo "<br><br>";

    echo "<h2>MODIFICACIÓN DE RECURSO</h2>
    
    <form action='index.php' method='GET'>
    <input type='hidden' name='controller' value='ResourcesControl'>
    <input type='hidden' name='action' value='updateResources'>";

    echo "<input type='hidden' name='idResource' value='".$res['idResource']."'><br>

    <label> Name: </label><input type='text' name='name' value='".$res['name']."'><br>

    <label> Description: </label><input type='text' name='description' value='".$res['description']."'><br>

    <label> Location: </label><input type='text' name='location' value='".$res['location']."'><br>

    <label> Image: </label><input type='text' name='image' value='".$res['image']."'><br>
    
    <button type='submit'>Aceptar</button>

    </form>";
    
    echo "<br><br><br>";
    echo "<a href='index.php?controller=UsersControl&action=showMenu'>Volver al Menú</a><br>";

?>