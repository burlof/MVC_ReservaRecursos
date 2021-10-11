<?php

if (isset($data['errorMsg'])) {
    echo "<p style='color:red'>" . $data['errorMsg'] . "</p>";
}
if (isset($data['infoMsg'])) {
    echo "<p style='color:blue'>" . $data['infoMsg'] . "</p>";
}

echo "<form action='index.php'>
        <br>
        Email:<input type='text' name='email'><br><br>
        Contraseña:<input type='password' name='pass'><br>
        <input type='hidden' name='action' value='processLoginForm'>
        <input type='submit'>
      </form>";