
<?php

session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) { 
    header("Location: ../../sites/dashboard.sites.php"); 
}

if (isset($_POST['submit'])) {

  include '../config/database.config.php';

  $firstname = mysqli_real_escape_string($connection, $_POST['firstname']);
  $lastname = mysqli_real_escape_string($connection, $_POST['lastname']);
  $password = mysqli_real_escape_string($connection, $_POST['password']);
  $mail = mysqli_real_escape_string($connection, $_POST['mail']);
  $hashPassword = password_hash($password,PASSWORD_DEFAULT);

  $check = "SELECT Landlord_Mail FROM landlords_credentials WHERE Landlord_Mail = '$mail'";
  $result_check = mysqli_query($connection, $check);
  
  if($result_check->num_rows == 0) {
      $sql_landlords = "INSERT INTO landlords (Landlord_Forename, Landlord_Surname) 
            VALUES ('$firstname', '$lastname');";

      $result_landlords = mysqli_query($connection, $sql_landlords);
      $last_record = mysqli_insert_id($connection);

      $sql_landlords_credentials = "INSERT INTO landlords_credentials (LandlordID, Landlord_Mail, Landlord_Password) 
            VALUES ('$last_record', '$mail', '$hashPassword');";

      $result_landlords_credentials = mysqli_query($connection, $sql_landlords_credentials);

      header("Location: ../../sites/login.sites.php");
  } else {
       header("Location: ../../sites/registration.sites.php?error=true");
  }


} else {
    header("Location: ../../sites/login.sites.php");
    exit();
}