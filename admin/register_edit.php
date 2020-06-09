<?php
include('security.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
?>

<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Modifica Profilo Admin 
    </h6>
  </div>

  <div class="card-body">

   <?php

    $connection = mysqli_connect("localhost", "root", "root", "adminpanel");
    if(isset($_POST['edit_btn'])){
        $id = $_POST['edit_id'];
       
        $query = "SELECT * FROM register WHERE id = '$id'";
        $query_run = mysqli_query($connection, $query);

        foreach($query_run as $row){
            ?>

      

      <form action="code.php" method="POST">
        <input type="hidden" name="edit_id" value="<?php echo $row['id']?>">
        <div class="form-group">
                    <label> Username </label>
                    <input type="text" minlength="5" required name="edit_username" value="<?php echo $row['username']?>" class="form-control" placeholder="Enter Username">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="edit_email" minlength="5" required value="<?php echo $row['email']?>" class="form-control" placeholder="Enter Email">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="edit_password" minlength="5" required value="<?php echo $row['password']?>" class="form-control" placeholder="Enter Password">
                </div>

                <div class="form-group">
                    <label>Utente</label>
                    <select name="update_usertype" class="form-control">
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                    </select>
                </div>
                
                
                <a href="register.php" class="btn btn-danger">Cancella</a>
                <button type="submit" name ="updatebtn" class="btn btn-primary"> Modifica </button>
        </div>
      </form>
    <?php
        }

    }
    ?>
  
  </div>
</div>

</div>


<?php
include('includes/footer.php');
include('includes/scripts.php');

?>