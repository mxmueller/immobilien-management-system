
<?php

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
        echo "erfolgreicher loggin";
    } else {
        echo "error loggin";
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