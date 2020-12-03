<?php
include '../templates/header.template.php';

session_start();
?>

<h1>Registrierungsformular</h1>
<form action="../methods/user/registration.user.php" method="POST">
   <input type="text" name="firstname" placeholder="Vorname"><br>
   <input type="text" name="lastname" placeholder="Nachname"><br>
   <input type="text" name="user" placeholder="Benutzername"><br>
   <input type="email" name="mail" placeholder="E-Mail"><br>
   <input type="password" name="password" placeholder ="Passwort"><br>
   <button type="submit" name="submit">Registrieren</button>
</form>