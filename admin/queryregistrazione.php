
<?php
session_start();

$connection = mysqli_connect("localhost", "root", "root", "adminpanel");

if(isset($_POST['registratibtn']))
{
    $username1 = $_POST['user1'];
    $email1 = $_POST['email1'];
    $password1 = $_POST['password1'];
    $confirmpassword1 = $_POST['confermapassword1'];
    $usertype1 = $_POST['tipouser'];

    $query = "SELECT * FROM register WHERE email='$email1' && username='$username1' ";
    $query_run = mysqli_query($connection, $query);

    if(mysqli_num_rows($query_run) > 0)
    {
        $_SESSION['status'] = "Utente già esistente nel database, cambia mail e username";
        $_SESSION['status_code'] = "error";
        header('Location: registrazione.php');  
    }
    else
    {
        if($password1 === $confirmpassword1)
        {
            $query = "INSERT INTO register (username,email,password,usertype) VALUES ('$username1','$email1','$password1','$usertype1')";
            $query_run = mysqli_query($connection, $query);
            
            if($query_run)
            {
                // echo "Saved";
                $_SESSION['status'] = "Utente Aggiunto effettua il login";
                $_SESSION['status_code'] = "success";
                header('Location: login.php');
            }
            else 
            {
                $_SESSION['status'] = "Profilo non aggiunto";
                $_SESSION['status_code'] = "error";
                header('Location: registrazione.php');  
            }
        }
        else 
        {
            $_SESSION['status'] = "Password e password di conferma non corrispondono";
            $_SESSION['status_code'] = "warning";
            header('Location: registrazione.php');  
        }
    }

}

?>