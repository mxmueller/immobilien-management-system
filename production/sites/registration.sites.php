<?php
include '../templates/header.template.php';
session_start();
?>

<div class="container">
   <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
         <div class="card card-signin my-5">
            <div class="card-body">
               <h5 class="card-title text-center">Registrierung</h5>
               <form class="form-signin" action="../methods/user/registration.user.php" method="POST">
                  <?php
               if (!empty($_GET['error'])) {
                  ?>
                  <div class="form-label-group mt-4">
                     <div class="alert alert-danger" role="alert">
                        E-Mail bereits vorhanden!
                     </div>
                  </div>
                  <?php
                  }
                  ?>

                  <div class="form-label-group mt-3">
                     <input class="form-control" type="text" name="firstname" placeholder="Vorname">
                  </div>
                  <div class="form-label-group mt-3">
                     <input class="form-control" type="text" name="lastname" placeholder="Nachname">
                  </div>
                  <div class="form-label-group mt-3">
                     <input class="form-control" type="email" name="mail" placeholder="E-Mail">
                  </div>
                  <div class="form-label-group mt-3">
                     <input class="form-control" type="password" name="password" placeholder="Passwort">
                  </div>
                  <div class="form-label-group mt-4">
                     <button class="btn btn-primary btn-block text-uppercase" name="submit"
                        type="submit">Abschicken</button>
                  </div>
                  <div class="form-label-group mt-4">
                     <a href="../sites/login.sites.php" class="btn btn-link" role="button">Login</a>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>