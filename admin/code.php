<?php
session_start();

$connection = mysqli_connect("localhost", "root", "root", "adminpanel");

if(isset($_POST['checksub'])){
    $email = $_POST['email_id'];


    $email_query = "SELECT * FROM register WHERE email='$email' ";
    $email_query_run = mysqli_query($connection, $email_query,);
    if(mysqli_num_rows($email_query_run) > 0)
    {
       echo "Email esistente. Cambiala ";
    }
    else{
        echo "mail disponibile";
    }
}




if(isset($_POST['registerbtn']))
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
    $usertype = $_POST['usertype'];

    $email_query = "SELECT * FROM register WHERE email='$email' ";
    $email_query_run = mysqli_query($connection, $email_query);
    if(mysqli_num_rows($email_query_run) > 0)
    {
        $_SESSION['status'] = "Email già esistente nel database";
        $_SESSION['status_code'] = "error";
        header('Location: register.php');  
    }
    else
    {
        if($password === $confirmpassword)
        {
            $query = "INSERT INTO register (username,email,password,usertype) VALUES ('$username','$email','$password','$usertype')";
            $query_run = mysqli_query($connection, $query);
            
            if($query_run)
            {
                // echo "Saved";
                $_SESSION['status'] = "Utente Admin aggiunto";
                $_SESSION['status_code'] = "success";
                header('Location: register.php');
            }
            else 
            {
                $_SESSION['status'] = "Profilo Admin non aggiunto";
                $_SESSION['status_code'] = "error";
                header('Location: register.php');  
            }
        }
        else 
        {
            $_SESSION['status'] = "Password e password di conferma non corrispondono";
            $_SESSION['status_code'] = "warning";
            header('Location: register.php');  
        }
    }

}



if(isset($_POST['updatebtn']))
{
    $id = $_POST['edit_id'];
    $username = $_POST['edit_username'];
    $email = $_POST['edit_email'];
    $password = $_POST['edit_password'];
    $usertypeupdate = $_POST['update_usertype'];

    $query = "UPDATE register SET username='$username', email='$email', password='$password', usertype='$usertypeupdate' WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Il tuo record è modificato";
        $_SESSION['status_code'] = "success";
        header('Location: register.php'); 
    }
    else
    {
        $_SESSION['status'] = "Il tuo record non è stato modificato";
        $_SESSION['status_code'] = "error";
        header('Location: register.php'); 
    }
}


if(isset($_POST['delete_btn'])){

    $id = $_POST['delete_id'];

    $query ="DELETE FROM register WHERE id = '$id'";
    $query_run = mysqli_query($connection, $query);

    if($query_run){
        $_SESSION['status'] = "I tuoi dati sono stati cancellati";
        $_SESSION['status_code'] = "success";
       
        header('Location:register.php');
    }
    else{
        $_SESSION['status'] = "i tuoi dati non sono stati cancellati";
        $_SESSION['status_code'] = "error";
        
        header('Location:register.php');
    }

    
}


if(isset($_POST['login_btn'])){
    $email_login = $_POST['email'];
    $password_login = $_POST['password'];

    $query = "SELECT * FROM register WHERE email='$email_login' && password = '$password_login'";
    $query_run = mysqli_query($connection, $query);

    if(mysqli_fetch_array($query_run)){
        $_SESSION['status'] = "Benvenuto";
        $_SESSION['status_code'] = "success";
        header('Location:index.php');
    }
    else{
        $_SESSION['status'] = "Dati non validi";
        $_SESSION['status_code'] = "error";
      
    
        header('Location:login.php');
    
    }


}


?>











