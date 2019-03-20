<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="/vendor/fontawesome-free-5.5.0-web/css/all.css" rel="stylesheet">
        <link rel="stylesheet" href="/css/style.css">

        <!-- Bootstrap core CSS -->
        <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Bootstrap core JavaScript -->
        <script src="/vendor/jquery/jquery.min.js"></script>
        <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <link href="/vendor/select2-4.0.6-rc.1/dist/css/select2.css" rel="stylesheet">
        <script src="/vendor/select2-4.0.6-rc.1/dist/js/select2.js"></script>

        <script src="/vendor/bootstrap-datepicker-1.6.4-dist/js/bootstrap-datepicker.min.js"></script>
        <link href="/vendor/bootstrap-datepicker-1.6.4-dist/css/bootstrap-datepicker.standalone.css" rel="stylesheet">

        <link href="/vendor/jquery-ui-1.12.1.custom/jquery-ui.min.css" rel="stylesheet">
        <script src="/vendor/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>

        <script src="/js/main.js"></script>
        <title> New Eudoxus </title>
    </head>
    <body>

        <?php
            $path = $_SERVER['DOCUMENT_ROOT'];
            $path .= "/common/header.php";
            include $path;
        ?>

        <?php
            $path = $_SERVER['DOCUMENT_ROOT'];
            $path .= "/common/userOptions.php";
            include $path;
        ?>

        <div class="my-breadcrumb">
            <ul class="breadcrumb">
              <li><a href="/index.php"><i class="fa fa-home" aria-hidden="true"></i></a></li>
              <li><a href="/student/student_app.php">Εφαρμογή Φοιτητών</a></li>
              <li>Το προφίλ μου</li>
            </ul>
        </div>

        <?php include 'student_profile_info.php';?>

        <div class="my-main-content-registration my-profile-info">
        <form method="post" action="" autocomplete="false">

            <div class="my-reg-account-info">
                <h> Στοιχεία Λογαριασμού </h>
                  <div class="form-group row">
                    <label for="myEmail" class="col-5 col-form-label"><i class="fa fa-envelope" aria-hidden="true"></i>  Email:</label>
                    <div class="col-6 myEmail-edit" id="myEmail-edit-content">
                        <input id="myEmail-edit-content-value" type=text value="<?php echo $email;?>" disabled/>
                    </div>
                    <div class="col-1 myEmail-edit-icon" id="myEmail-edit-icon-content">
                        <i class="fa fa-pencil-alt" aria-hidden="true"></i>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="myPassword" class="col-5 col-form-label"><i class="fa fa-lock" aria-hidden="true"></i>   Κωδικός:</label>
                    <div class="col-6 myPassword-edit" id="myPassword-edit-content">
                        <input id="myPassword-edit-content-value" type=password value="<?php echo $pass;?>" disabled/>
                    </div>
                    <div class="col-1 myPassword-edit-icon" id="myPassword-edit-icon-content">
                        <i class="fa fa-pencil-alt" aria-hidden="true"></i>
                    </div>
                  </div>
            </div>
            <div class="my-reg-personal-info">
                <h> Προσωπικά Στοιχεία </h>
                <div class="form-group row">
                  <label for="myFirstName" class="col-5 col-form-label">Όνομα:</label>
                  <div class="col-6">
                      <?php echo $firstName;?>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="myLastName" class="col-5 col-form-label">Επώνυμο:</label>
                  <div class="col-6">
                      <?php echo $lastName ;?>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="myBirthDate" class="col-5 col-form-label">Ημερομηνία Γέννησης:</label>
                  <div class="col-6">
                      <?php echo $date ;?>
                  </div>
                </div>
            </div>
            <div class="my-university-info">
                <h> Στοιχεία Σχολής </h>
                <div class="form-group row">
                  <label for="myUniv" class="col-5 col-form-label">Ίδρυμα:</label>
                  <div class="col-6">
                      <?php echo $uni;?>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="myDepart" class="col-5 col-form-label">Τμήμα:</label>
                  <div class="col-6">
                      <?php echo $dept;?>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="myDepart" class="col-5 col-form-label">Αριθμός Μητρώου:</label>
                  <div class="col-6">
                      <?php echo $am;?>
                  </div>
                </div>
            </div>
            <div class="my-reg-contact-info">
                <h> Στοιχεία Επικοινωνίας </h>
                <div class="form-group row">
                  <label for="myPhoneNumber" class="col-5 col-form-label"><i class="fa fa-phone" aria-hidden="true"></i> Τηλέφωνο Επικοινωνίας:</label>
                  <div class="col-6 myPhone-edit" id="myPhone-edit-content">
                      <input id="myPhone-edit-content-value" type="text" name="phone" value="<?php echo $phone ?>" disabled>
                  </div>
                  <div class="col-1 myPhone-edit-icon" id="myPhone-edit-icon-content">
                      <i class="fa fa-pencil-alt" aria-hidden="true"></i>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="myAddress" class="col-2 col-form-label"><i class="fa fa-map-marker" aria-hidden="true"></i> Οδός:</label>
                  <div class="col-3 myAddress-edit" id="myAddress-edit-content">
                      <input id="myAddress-edit-content-value" type="text" name="address" value="<?php echo $address ?>" disabled>
                  </div>
                  <div class="col-1 myAddress-edit-icon" id="myAddress-edit-icon-content">
                      <i class="fa fa-pencil-alt" aria-hidden="true"></i>
                  </div>
                  <label for="myAddressNum" class="col-3 col-form-label"><i class="fa fa-map-marker" aria-hidden="true"></i> Αριθμός:</label>
                  <div class="col-2 myAddressNum-edit" id="myAddressNum-edit-content">
                      <input id="myAddressNum-edit-content-value" type="text" name="addressNum"value="<?php echo $addressNum ?>" disabled>
                  </div>
                  <div class="col-1 myAddressNum-edit-icon" id="myAddressNum-edit-icon-content">
                      <i class="fa fa-pencil-alt" aria-hidden="true"></i>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="myDimos" class="col-2 col-form-label"><i class="fa fa-map-marker" aria-hidden="true"></i> Δήμος:</label>
                  <div class="col-3 myDimos-edit" id="myDimos-edit-content">
                      <input id="myDimos-edit-content-value" type="text" name="addressDimos" value="<?php echo $municipality ?>" disabled>
                  </div>
                  <div class="col-1 myDimos-edit-icon" id="myDimos-edit-icon-content">
                      <i class="fa fa-pencil-alt" aria-hidden="true"></i>
                  </div>
                  <label for="myAddressTK" class="col-3 col-form-label"><i class="fa fa-map-marker" aria-hidden="true"></i> Ταχ. Κώδικας:</label>
                  <div class="col-2 myAddressTK-edit" id="myAddressTK-edit-content">
                      <input id="myAddressTK-edit-content-value" type="text" name="addressTK" value="<?php echo $postalCode ?>" disabled>
                  </div>
                  <div class="col-1 myAddressTK-edit-icon" id="myAddressTK-edit-icon-content">
                      <i class="fa fa-pencil-alt" aria-hidden="true"></i>
                  </div>
                </div>

            </div>
        </form>


        </div>

        <?php
            $path = $_SERVER['DOCUMENT_ROOT'];
            $path .= "/common/footer.php";
            include $path;
        ?>

        <?php
            $path = $_SERVER['DOCUMENT_ROOT'];
            $path .= "/common/login_popup_content.php";
            include $path;
        ?>

        <!-- Email Edit Modal -->
        <div class="modal" id="successEdit-email">
          <div class="modal-dialog">
            <div class="modal-content">

              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title">Επιτυχής ενημέρωση email</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>

              <!-- Modal body -->
              <!-- <div class="modal-body">
                Το email σας ενημερώθηκε επιτυχώς!
              </div> -->

              <!-- Modal footer -->
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              </div>

            </div>
          </div>
        </div>

        <!-- Password Edit Modal -->
        <div class="modal" id="successEdit-password">
          <div class="modal-dialog">
            <div class="modal-content">

              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title">Επιτυχής ενημέρωση κωδικού</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>

              <!-- Modal body -->
              <!-- <div class="modal-body">
                Το password σας ενημερώθηκε επιτυχώς!
              </div> -->

              <!-- Modal footer -->
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              </div>

            </div>
          </div>
        </div>

        <!-- Phone Edit Modal -->
        <div class="modal" id="successEdit-phone">
          <div class="modal-dialog">
            <div class="modal-content">

              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title">Επιτυχής ενημέρωση τηλεφώνου</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>

              <!-- Modal body -->
              <!-- <div class="modal-body">
                Το τηλέφωνο σας ενημερώθηκε επιτυχώς!
              </div> -->

              <!-- Modal footer -->
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              </div>

            </div>
          </div>
        </div>

        <!-- Address Edit Modal -->
        <div class="modal" id="successEdit-address">
          <div class="modal-dialog">
            <div class="modal-content">

              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title">Επιτυχής ενημέρωση διεύθυνσης</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>

              <!-- Modal body -->
              <!-- <div class="modal-body">
                Η διεύθυνσή σας ενημερώθηκε επιτυχώς!
              </div> -->

              <!-- Modal footer -->
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              </div>

            </div>
          </div>
        </div>

    </body>
</html>
