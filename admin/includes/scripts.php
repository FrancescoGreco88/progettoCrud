<script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>
  <script src="js/error.js"></script>
  <!-- Script messaggi modale-->
  <script src="js/sweetalert.min.js"></script>
  <script src="js/tabella.js"></script>
  <?php
            if(isset($_SESSION['status']) && $_SESSION['status'] != ''){
              ?>
              <script>
                swal({
                    title: "<?php echo $_SESSION['status']; ?>",
                    //text: "Hai caricato la pagina con successo!",
                    icon: "<?php echo $_SESSION['status_code']; ?>",
                    button: "Esci!",
                    });
              </script>
            
             <?php   unset($_SESSION['status']);
            }

        ?>
      <!-- <script>
        swal({
            title: "Ok!",
            text: "Hai caricato la pagina con successo!",
            icon: "success",
            button: "Esci!",
            });
      </script>-->
 

      <script>
        $(document).ready(function() {
    $('#example').DataTable();
} );
    </script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>