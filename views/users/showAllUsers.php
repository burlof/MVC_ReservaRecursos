<?php

    $users = $data["users"];

    echo "<h1>VISTA DE TODOS LOS USUARIOS</h1>

    <table>
        <thead>
            <tr>
                <th>idUser</th>
                <th>UserName</th>
                <th>Password</th>
                <th>Nombre</th>
                <th>Acción 1</th>
                <th>Acción 2</th>
            </tr>
        </thead>
        <tbody>
            ";
    foreach ($users as $res) {
                echo "<tr>
                <td>".$res['idUser']."</td>
                <td>".$res['username']."</td>
                <td>".$res['password']."</td>
                <td>".$res['realname']."</td>
                <td> Modificar </td>
                <td> Borrar </td>
                </tr>";
    }
    echo "</table>";
    echo "<br><br><br>";
    echo "<a href='index.php?action=showMenu'>Volver al Menú</a><br>";

    ?>