
<?php

session_start();


if (isset($_POST['submit'])) {

include '../config/database.config.php';

  $password = mysqli_real_escape_string($connection, $_POST['password']);
  $user = user(mysqli_real_escape_string($connection, $_POST['mail']));

  $user_collection = array (
        'id' => $user[1],
        'mail' => $user[2],
        'password' => $user[3],
    );

    if (password_verify($password, $user_collection['password'])) {

        $_SESSION['loggedin'] = true;
        $_SESSION['user_id'] = $user_collection['id'];
        $_SESSION['user_mail'] = $user_collection['mail'];

        header("Location: ../../sites/dashboard.sites.php");    
    } else {
        echo "Wrong Password, Mail combination!";
        header("Location: ../..");
    }

} else {
    header("Location: ../../sites/login.sites.php");
    exit();
}

function user($mail) {
    include '../config/database.config.php';
    $sql = "SELECT * FROM landlords_credentials WHERE Landlord_Mail = '$mail'";
    $result = mysqli_query($connection, $sql);
    return mysqli_fetch_row($result);
}