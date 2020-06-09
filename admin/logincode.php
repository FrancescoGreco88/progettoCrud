<?php
include('security.php');

$connection = mysqli_connect("localhost","root","root", "adminpanel");



if(isset($_POST['login_btn'])){
    $email_login = $_POST['email'];
    $password_login = $_POST['password'];

    $query = "SELECT * FROM register WHERE email='$email_login' && password = '$password_login'";
    $query_run = mysqli_query($connection, $query);
    $usertypes = mysqli_fetch_array($query_run);
 

    if(!mysqli_num_rows($query_run) > 0)
    {
        $_SESSION['status'] = "Utente non esistente nel database, registrati";
        $_SESSION['status_code'] = "error";
        header('Location: registrazione.php');  
    }

   
    if($usertypes['usertype'] == 'admin'){
        $_SESSION['status'] = "Admin loggato";
        $_SESSION['status_code'] = "success";
        $_SESSION['username'] = $email_login;
        header('Location:index.php');
    }

    else if($usertypes['usertype'] == 'user'){
     
        $_SESSION['username'] = $email_login;
        header('Location: ../index.php');
    }
    

   


}
?>
