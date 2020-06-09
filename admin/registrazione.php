<?php
session_start();

include('includes/header.php'); 

?>

<html>
 
  

<div class="container mt-4">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-6 col-lg-6 col-md-6">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
            
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4"><i class="fa fa-user fa-1x" aria-hidden="true"></i> Registrazione</h1>

              


                  </div>
                  <form class="user" action="queryregistrazione.php" method="POST">

                  <div class="form-group" style="text-align:center; justify-content:center">
                      <span > Inserisci Nome Utente  <i class="fa fa-envelope fa-1x" aria-hidden="true"></i></span>
                      <input type="text" name="user1" class="form-control form-control-user" minlength="5" required placeholder="Inserimento Utente">
                    </div>

                    <div class="form-group" style="text-align:center; justify-content:center">
                      <span > Inserisci email  <i class="fa fa-envelope fa-1x" aria-hidden="true"></i></span>
                      <input type="email" name="email1" class="form-control form-control-user" minlength="5" required placeholder="Inserimento Mail">
                    </div>
                    <div class="form-group" style="text-align:center; justify-content:center">
                    <span > Inserisci password  <i class="fa fa-key fa-1x" aria-hidden="true"></i></span>
                      <input type="password" name="password1" class="form-control form-control-user" minlength="5" required placeholder="Password">
                    </div>

                    <div class="form-group" style="text-align:center; justify-content:center">
                    <span > Conferma password  <i class="fa fa-key fa-1x" aria-hidden="true"></i></span>
                      <input type="password" name="confermapassword1" class="form-control form-control-user" minlength="5" required placeholder="Conferma Password">
                    </div>
                    <input type="hidden" name="tipouser" value="user">

                    <button type="submit" name="registratibtn" class="btn btn-primary btn-user btn-block">
                      Registrati
                    </button>
                    
                  
                  </form>
                  
               
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  </html>

<?php

include('includes/scripts.php'); 

?>