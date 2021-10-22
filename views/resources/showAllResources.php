<?php
    $resources = $data["resources"];

    echo "<h1>VISTA DE TODOS LOS RECURSOS</h1>";

    if (isset($data['text'])) {
        echo "<div class='error'>".$data['text']."</div>";
    }


    echo 
    "<table>
        <thead>
            <tr>
                <th>idRecurso</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Localizacion</th>
                <th>Imagen</th>
                <th>Acción 1</th>
                <th>Acción 2</th>
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
                <td>".$res['image']."</td>
                <td> Modificar </td>
                <td> <a href='index.php?controller=ResourcesControl&action=deleteResources&idResource=".$res['idResource']."'> Borrar</a></t d>
                </tr>";
    }
    echo "</table>";
    echo "<br><br><br>";
    echo "<a href='index.php?controller=UsersControl&action=showMenu'>Volver al Menú</a><br>";

?>