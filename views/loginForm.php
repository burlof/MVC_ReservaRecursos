<?php

if (isset($data['errorMsg'])) {
    echo "<p style='color:red'>" . $data['errorMsg'] . "</p>";
}
if (isset($data['infoMsg'])) {
    echo "<p style='color:blue'>" . $data['infoMsg'] . "</p>";
}

echo"<form method='post' action='index.php?controller=usersControl&action=processLoginForm'>
        <br>
        Usuario:<input type='text' name='username'><br><br>
        Contraseña:<input type='pass' name='password'><br>
        <input type='hidden' name='action' value='processLoginForm'>
        <input type='submit' value='login'>
      </form>";