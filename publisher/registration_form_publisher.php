<?php
session_start();
?>
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
                <li><a href="/common/register_options.php">Εγγραφή</a></li>
                <li>Εγγραφή Εκδότη</li>
            </ul>
        </div>


        <div class="back-to-reg-options">
            <a href="/common/register_options.php" class="btn"><i class="fa fa-chevron-left" aria-hidden="true"></i>    Επιστροφή στην Επιλογή Εγγραφής </a>
        </div>

        <?php include 'signup_publisher.php';?>

        <div class="my-main-content-registration">
            <p> Η συμπλήρωση των πεδίων με <span class="my-req-star">*</span> είναι υποχρεωτική.</p>
            <p class="success-registration"> <?php echo $succ;?> </p>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="my-registration-from">
                <div class="my-reg-account-info">
                    <h> Στοιχεία Λογαριασμού </h>
                      <div class="form-group row">
                        <label for="myEmail" class="col-5 col-form-label"><i class="fa fa-envelope" aria-hidden="true"></i>   <span class="my-req-star">*</span>Email:</label>
                        <div class="col-6">
                          <input type="text" name="email" onfocusout="valRegEmail()" value="<?php echo $email;?>" id="myEmail-reg" class="form-control" >
                        </div>
                      </div>
                      <div class="row error-msg">
                          <div class="col-5">
                          </div>
                          <div class="col-6 error-email-reg">
                          </div>
                      </div>
                      <div class="form-group row">
                        <label for="myPassword" class="col-5 col-form-label"><i class="fa fa-lock" aria-hidden="true"></i>   <span class="my-req-star">*</span>Κωδικός:</label>
                        <div class="col-6">
                            <div class="input-group" id="show_hide_password_first">
                              <input class="form-control" name="password" onfocusout="valPassword()" value="<?php echo $pass;?>" type="password" id="myPassword-reg">
                              <div class="input-group-addon">
                                <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                              </div>
                            </div>
                        </div>
                        <div class="col-1">
                            <span class="my-question-popover" title="" data-toggle="popover" data-trigger="hover"
                            data-content="Εισάγετε τον κωδικό σας. Πρέπει να είναι υποχρεωτικά τουλάχιστον 8 χαρακτήρες
                            και μπορεί να αποτελείται απο κεφαλαίους και μικρούς λατινικούς χαρακτήρες, αριθμούς και
                            σύμβολα">
                                <i class="fa fa-question-circle" aria-hidden="true"></i></span>
                        </div>
                      </div>
                      <div class="row error-msg">
                          <div class="col-5">
                          </div>
                          <div class="col-6 error-pass-reg" id="myPasswordStrength">
                          </div>
                      </div>
                      <div class="form-group row">
                        <label for="myPasswordConfirm" class="col-5 col-form-label"><i class="fa fa-lock" aria-hidden="true"></i>   <span class="my-req-star">*</span>Επιβεβαίωση:</label>
                        <div class="col-6">
                            <div class="input-group" id="show_hide_password_confirm">
                              <input class="form-control" name="passwordConf" onfocusout="valPassConf()" value="<?php echo $passConf ?>"type="password" id="myPasswordConfirm-reg">
                              <div class="input-group-addon">
                                <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                              </div>
                            </div>
                          <!-- <input type="password" class="form-control" id="myPasswordConfirm" placeholder="Password"> -->
                        </div>
                        <div class="col-1">
                            <span class="my-question-popover" title="" data-toggle="popover" data-trigger="hover"
                            data-content="Εισάγετε τον ίδιο κωδικό με από πάνω για επιβεβαίωση">
                                <i class="fa fa-question-circle" aria-hidden="true"></i></span>
                        </div>
                      </div>
                      <div class="row error-msg">
                          <div class="col-5">
                          </div>
                          <div class="col-6 error-conf-pass-reg">
                          </div>
                      </div>
                </div>
                <div class="my-reg-personal-info">
                    <h> Προσωπικά Στοιχεία </h>
                    <div class="form-group row">
                      <label for="myFirstName" class="col-5 col-form-label"><span class="my-req-star">*</span>Όνομα:</label>
                      <div class="col-6">
                        <input type="text" name="firstName" onfocusout="valFirstName()" value="<?php echo $firstName ?>" class="form-control" id="myFirstName-reg">
                      </div>
                    </div>
                    <div class="row error-msg">
                        <div class="col-5">
                        </div>
                        <div class="col-6 error-first-name-reg">
                        </div>
                    </div>
                    <div class="form-group row">
                      <label for="myLastName" class="col-5 col-form-label"><span class="my-req-star">*</span>Επώνυμο:</label>
                      <div class="col-6">
                        <input type="text" name="lastName" onfocusout="valLastName()" value="<?php echo $lastName ?>"class="form-control" id="myLastName-reg">
                      </div>
                    </div>
                    <div class="row error-msg">
                        <div class="col-5">
                        </div>
                        <div class="col-6 error-last-name-reg">
                        </div>
                    </div>
                </div>
                <div class="my-reg-law-info">
                    <h> Νομικά Στοιχεία </h>
                    <div class="form-group row">
                      <label for="myIdNumber" class="col-5 col-form-label"><span class="my-req-star">*</span>Αριθμός Ταυτότητας:</label>
                      <div class="col-6">
                        <input type="text" name="id" onfocusout="valIdNumber()" value="<?php echo $id ?>"class="form-control" id="myIdNumber-reg">
                      </div>
                      <div class="col-1">
                          <span class="my-question-popover" title="" data-toggle="popover" data-trigger="hover"
                          data-content="Εισάγετε τον αριθμό που αναγράφεται στην μπροστινή μεριά της αστυνομικής ταυτότητας σας. Ξεκινάει υποχρεωτικά
                          με Α ακολουθούμενο από ένα γράμμα και αριθμούς ή μόνο αριθμούς. Απαραίτητα 10 χαρακτήρες.">
                              <i class="fa fa-question-circle" aria-hidden="true"></i></span>
                      </div>
                    </div>
                    <div class="row error-msg">
                        <div class="col-5">
                        </div>
                        <div class="col-6 error-id-reg">
                        </div>
                    </div>
                    <div class="form-group row">
                      <label for="myTaxNumber" class="col-5 col-form-label"><span class="my-req-star">*</span>ΑΦΜ:</label>
                      <div class="col-6">
                        <input type="text" name="taxNum" onfocusout="valTaxNumber()" value="<?php echo $tax ?>"class="form-control" id="myTaxNumber-reg">
                      </div>
                      <div class="col-1">
                          <span class="my-question-popover" title="" data-toggle="popover" data-trigger="hover"
                          data-content="Εισάγετε το ΑΦΜ σας. Αποτελείται υποχρεωτικά από 10 ψηφία">
                              <i class="fa fa-question-circle" aria-hidden="true"></i></span>
                      </div>
                    </div>
                    <div class="row error-msg">
                        <div class="col-5">
                        </div>
                        <div class="col-6 error-tax-reg">
                        </div>
                    </div>
                    <div class="form-group row">
                      <label for="myAmkaNumber" class="col-5 col-form-label"><span class="my-req-star">*</span>ΑΜΚΑ:</label>
                      <div class="col-6">
                        <input type="text" name="amka" onfocusout="valAmkaNumber()" value="<?php echo $amka ?>"class="form-control" id="myAmkaNumber-reg">
                      </div>
                      <div class="col-1">
                          <span class="my-question-popover" title="" data-toggle="popover" data-trigger="hover"
                          data-content="Εισάγετε το ΑΜΚΑ σας. Αποτελείται υποχρεωτικά από 10 ψηφία">
                              <i class="fa fa-question-circle" aria-hidden="true"></i></span>
                      </div>
                    </div>
                    <div class="row error-msg">
                        <div class="col-5">
                        </div>
                        <div class="col-6 error-amka-reg">
                        </div>
                    </div>
                </div>
                <div class="my-reg-contact-info">
                    <h> Στοιχεία Επικοινωνίας </h>
                    <div class="form-group row">
                      <label for="myPhoneNumber" class="col-5 col-form-label"><i class="fa fa-phone" aria-hidden="true"></i> Τηλέφωνο Επικοινωνίας:</label>
                      <div class="col-6">
                        <input type="text" name="phone" onfocusout="valPhoneNumber()" value="<?php echo $phone ?>"class="form-control successRegField" id="myPhoneNumber-reg">
                      </div>
                      <div class="col-1">
                          <span class="my-question-popover" title="" data-toggle="popover" data-trigger="hover"
                          data-content="Εισάγετε τον αριθμό του κινητού η του σταθρού τηλεφώνου σας. Αποτελείται υποχρεωτικά από
                          10 ψηφία και ξεκινάει με 2 η 69">
                              <i class="fa fa-question-circle" aria-hidden="true"></i></span>
                      </div>
                    </div>
                    <div class="row error-msg">
                        <div class="col-5">
                        </div>
                        <div class="col-6 error-phone-reg">
                        </div>
                    </div>
                    <div class="form-group row">
                      <label for="myAddress" class="col-2 col-form-label"><i class="fa fa-map-marker" aria-hidden="true"></i> Οδός:</label>
                      <div class="col-4">
                        <input type="text" name="address" onfocusout="valAddress()" value="<?php echo $address ?>"class="form-control successRegField" id="myAddress-reg">
                      </div>
                      <label for="myAddressNum" class="col-3 col-form-label"><i class="fa fa-map-marker" aria-hidden="true"></i> Αριθμός:</label>
                      <div class="col-2">
                        <input type="text" name="addressNum" onfocusout="valAddressNumber()" value="<?php echo $addressNum ?>" class="form-control successRegField" id="myAddressNum-reg">
                      </div>
                      <div class="col-1">
                      </div>
                    </div>
                    <div class="row error-msg">
                        <div class="col-2">
                        </div>
                        <div class="col-4 error-myAddress-reg">
                        </div>
                        <div class="col-3">
                        </div>
                        <div class="col-2 error-myAddressΝum-reg">
                        </div>
                        <div class="col-1">
                        </div>
                    </div>
                    <div class="form-group row">
                      <label for="myDimos" class="col-2 col-form-label"><i class="fa fa-map-marker" aria-hidden="true"></i> Δήμος:</label>
                      <div class="col-4">
                        <input type="text" name="addressDimos" onfocusout="valMunicipality()" value="<?php echo $municipality ?>" class="form-control successRegField" id="myAddressDimos-reg">
                      </div>
                      <label for="myAddressTK" class="col-3 col-form-label"><i class="fa fa-map-marker" aria-hidden="true"></i> Ταχ. Κώδικας:</label>
                      <div class="col-2">
                        <input type="text" name="addressTK" onfocusout="valTK()" value="<?php echo $TK ?>" class="form-control successRegField" id="myAddressTK-reg">
                      </div>
                      <div class="col-1">
                      </div>
                    </div>
                    <div class="row error-msg">
                        <div class="col-2">
                        </div>
                        <div class="col-4 error-myAddressDimos-reg">
                        </div>
                        <div class="col-3">
                        </div>
                        <div class="col-2 error-myAddressTK-reg">
                        </div>
                        <div class="col-1">
                        </div>
                    </div>
                </div>
                <div class="my-registration-submit">
                    <div class="row">
                        <label><input type="checkbox" value="" id="reg-checkbox">  Έχω διαβάσει και αποδέχομαι τους <a href="/common/under_construction.php">όρους χρήσης</a> </label>
                    </div>
                    <div class="row">
                        <input type="submit" name="submit" class="btn btn-primary" value="Ολοκλήρωση Εγγραφής" disabled id="submit-reg-button">
                    </div>
                </div>
            </form>
        </div>

        <!-- <div class="my-registration-submit">
            <div class="checkbox">

            </div>
            <a href="/common/under_construction.php" class="btn btn-primary"> Ολοκλήρωση Εγγραφής </a>
        </div> -->


        <!-- Footer Start  -->
        <footer class="bg-dark footer">
            <p class="text-center text-white">Copyright &copy; Eudoxus Team 2018</p>
        </footer>
        <!-- Footer End  -->

        <?php
            $path = $_SERVER['DOCUMENT_ROOT'];
            $path .= "/common/login_popup_content.php";
            include $path;
        ?>
    </body>
</html>
