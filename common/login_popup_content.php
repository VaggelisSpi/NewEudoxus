<!-- Login Modal -->
<div class="modal" id="loginModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Επιτυχής σύνδεση</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <!-- <div class="modal-body">
        Συνδεθήκατε Επιτυχώς!
      </div> -->

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<?php
    if (isset($_GET['login'])) {
        if(isset($_SESSION['loggedinMessage'])){
            //we have already shown this message
        }
        else{
            $_SESSION['loggedinMessage'] = true;
            echo '<script>loginPopup()</script>';
        }
    }
?>
