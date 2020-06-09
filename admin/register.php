<?php
include('security.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
?>
<head>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
</head>

<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Admin Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST">

        <div class="modal-body">

                <div class="form-group">
                    <label> Username </label>
                    <input type="text" name="username" minlength="5" required class="form-control" placeholder="Enter Username">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" minlength="5" required class="form-control check_email" placeholder="Enter Email">
                    <small class="mail_error" style="color:red"></small>
                  </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" minlength="5" required class="form-control" placeholder="Enter Password">
                </div>
                <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" name="confirmpassword" class="form-control" placeholder="Confirm Password">
                </div>
       
                <input type="hidden" name="usertype" value="admin">
        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Chiudi</button>
            <button type="submit" name="registerbtn" class="btn btn-primary">Salva</button>
        </div>
      </form>

    </div>
  </div>
</div>


<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Profilo Admin 
            <button type="button" class="btn btn-primary ml-2" data-toggle="modal" data-target="#addadminprofile">
              Aggiungi Admin
            </button>
    </h6>
  </div>

  <div class="card-body">

 

    <div class="table-responsive">

    <?php 
    $connection = mysqli_connect("localhost","root","root","adminpanel");
    $query = "SELECT * from register";
    $query_run = mysqli_query($connection,$query);
    
    ?>

      <table class="table table-bordered" id="example" >
        <thead>
          <tr>
            <th> ID </th>
            <th> Username </th>
            <th>Email </th>
            <th>Password</th>
            <th>Utente</th>
            <th>Modifica </th>
            <th>Cancella </th>
          </tr>
        </thead>
        <tbody>
        <?php
        if(mysqli_num_rows($query_run) > 0)        
        {
            while($row = mysqli_fetch_assoc($query_run))
            {
               ?>
          <tr>
            <td><?php  echo $row['id']; ?></td>
            <td><?php  echo $row['username']; ?></td>
            <td><?php  echo $row['email']; ?></td>
            <td><?php  echo $row['password']; ?></td>
            <td id="coloreutente" name="colorato"><?php  echo $row['usertype'];  ?></td>
            

            <td>
                <form action="register_edit.php" method="post">
                     <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                    <button  type="submit" name="edit_btn" class="btn btn-success"> Modifica</button>
                </form>
            </td>
            <td>
                <form action="code.php" method="post">
                  <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                  <button type="submit" name="delete_btn" class="btn btn-danger"> Cancella</button>
                </form>
            </td>
          </tr>
          <?php
            } 
        }
        else {
            echo "No Record Found";
        }
        ?>
        </tbody>
      </table>
  
    </div>
  </div>
</div>

</div>



  
<?php
include('includes/footer.php');
include('includes/scripts.php');

?>