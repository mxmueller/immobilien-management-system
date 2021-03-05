<?php
include '../templates/header.template.php';
session_start();
?>

<div class="container">
   <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
         <div class="card card-signin my-5">
            <div class="card-body">
               <h5 class="card-title text-center">Login</h5>
               <form class="form-signin" action="../methods/user/login.user.php" method="POST">
                  <div class="form-label-group mt-3">
                     <input class="form-control" type="email" name="mail" placeholder="E-Mail">
                  </div>
                  <div class="form-label-group mt-3">
                     <input class="form-control" type="password" name="password" placeholder="Passwort">
                  </div>
                  <div class="form-label-group mt-4">
                  <button class="btn btn-primary btn-block text-uppercase" name="submit" type="submit">Login</button>
                  </div>
                  <div class="form-label-group mt-4">
                  <a href="../sites/registration.sites.php" class="btn btn-link" role="button">Registrierung</a>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>

