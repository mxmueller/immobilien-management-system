
<?php

if (isset($_POST['submit'])) {

  include '../config/database.config.php';

  $firstname = mysqli_real_escape_string($connection, $_POST['firstname']);
  $lastname = mysqli_real_escape_string($connection, $_POST['lastname']);
  $user = mysqli_real_escape_string($connection, $_POST['user']);
  $password = mysqli_real_escape_string($connection, $_POST['password']);

  $hashPassword = password_hash($password,PASSWORD_DEFAULT);

  $sql = "INSERT INTO landlords (Landlord_Forename, Landlord_Surname) 
            VALUES ('$firstname', '$lastname');";

  $result = mysqli_query($connection, $sql);

//   $mysqli -> query("INSERT INTO Persons (FirstName, LastName, Age) VALUES ('Glenn', 'Quagmire', 33)");

//   // Print auto-generated id
//   echo "New record has id: " . $mysqli -> insert_id;

} else {
// Falls jemand die URL erraten hat, wird er durch
// das else zum Registrierungsformular geschickt
    header("Location: ../signup.php");
    exit();
}