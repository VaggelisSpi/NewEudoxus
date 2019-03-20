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
              <li>Αναζήτηση Σημείου Διανομής</li>
            </ul>
        </div>

        <div class="search-container myBooksSearch">
            <input class="MySearchBookSearchBox" type="text" placeholder="Αναζητήστε το σημείο διανομής που θέλετε..." name="mySearchBookQuery" id="mySearchStoreTerm">
            <button class="MySearchBookSearchButton" type="submit" onclick="mySearchStoreFind()"><i class="fa fa-search"></i></button>
        </div>

        <div id="filterButtonContainer" class="myBooksSearchFiltersButton">
            <a href="#" class="btn" onclick="BookSearchFilterToggle()" id="myFilterButton"> Φίλτρα <br/> Αναζήτησης <i id="filterButtonIcon" class="fa fa-angle-down" aria-hidden="true"></i> </a>
        </div>

        <div class="myBooksSearchFiltersInput myHiddenClass" id="myFiltersInput">
            <div class="form-group row">
              <label for="University" class="col-2 col-form-label">Πόλη:</label>
              <div class="col-3">
                <!-- <input type="text" name="University" id="myUniv-filter" class="form-control" > -->
                <select id="home-page-search-select3">
                    <option value="" selected disabled hidden>Πόλη</option>
                    <option value="Athens">Αθήνα</option>
                    <option value="Thessaloniki">Θεσσαλονίκη</option>
                    <option value="Crete">Κρήτη</option>
                    <option value="Yianena">Γιάννενα</option>
                </select>
              </div>
              <div class="col-2"></div>
              <label for="Publisher" class="col-2 col-form-label">Κατεύθυνση:</label>
              <div class="col-3">
                  <select id="home-page-search-select4">
                      <option value="" selected disabled hidden>Κατεύθυνση</option>
                      <option value="thetikes">Θετικές Επιστήμες</option>
                      <option value="theoritikes">Θεωρητικές Επιστήμες</option>
                  </select>
              </div>
            </div>
            <div class="form-group row">

              <div class="col-8"></div>
              <div class="col-4">
                <a href="#" class="btn" onclick="mySearchStoreFind()" id="myFilterApplyButton"> Εφαρμογή Φίλτρων </a>
              </div>
            </div>
        </div>

        <div class="mySearchBookResultsCount">
        Βρέθηκαν <span class="mySearchBookCounter">3</span> αποτελέσματα για 'Κλειδάριθμος'.
        </div>

        <div class="mySearchStoreOneResult">
            <div class="store-name">
                Κλειδάριθμος Αθηνών
            </div>
            <div class="store-address">
                <div class="col-5">
                    <b>Διεύθυνση:</b>
                </div>
                <div class="col-7">
                    Πανεπιστημίου 35, Αθήνα, 17453
                </div>
            </div>
            <div class="store-hours">
                <div class="col-5">
                    <b>Ώρες Λειτουργίας:</b>
                </div>
                <div class="col-7">
                    Δευτέρα-Τετάρτη-Παρασκευή: 10:00-18:00 <br/>
                    Τρίτη-Πέμπτη: 10:00-15:00 <br/>
                    Σάββατο: 10:00-14:00 <br/>
                </div>
            </div>
            <div class="store-phone">
                <div class="col-5">
                    <b>Τηλέφωνο επικοινωνίας:</b>
                </div>
                <div class="col-7">
                    2102569789
                </div>
            </div>
            <div class="store-links">
                <div class="store-map">
                    <a href="/common/under_construction.php"> Εμφάνιση στο χάρτη</a>
                </div>
                <div class="store-site">
                    <a href="/common/under_construction.php"> Σελίδα καταστήματος</a>
                </div>
            </div>
        </div>

        <div class="mySearchStoreOneResult">
            <div class="store-name">
                Κλειδάριθμος Θεσσαλονίκης
            </div>
            <div class="store-address">
                <div class="col-5">
                    <b>Διεύθυνση:</b>
                </div>
                <div class="col-7">
                    Αριστοτέλους 35, Θεσσαλονίκη, 25698
                </div>
            </div>
            <div class="store-hours">
                <div class="col-5">
                    <b>Ώρες Λειτουργίας:</b>
                </div>
                <div class="col-7">
                    Δευτέρα-Τετάρτη-Παρασκευή: 10:00-19:00 <br/>
                    Σάββατο: 10:00-16:00 <br/>
                </div>
            </div>
            <div class="store-phone">
                <div class="col-5">
                    <b>Τηλέφωνο επικοινωνίας:</b>
                </div>
                <div class="col-7">
                    2214578963
                </div>
            </div>
            <div class="store-links">
                <div class="store-map">
                    <a href="/common/under_construction.php"> Εμφάνιση στο χάρτη</a>
                </div>
                <div class="store-site">
                    <a href="/common/under_construction.php"> Σελίδα καταστήματος</a>
                </div>
            </div>
        </div>

        <div class="mySearchStoreOneResult">
            <div class="store-name">
                Κλειδάριθμος Πατρών
            </div>
            <div class="store-address">
                <div class="col-5">
                    <b>Διεύθυνση:</b>
                </div>
                <div class="col-7">
                    Λαρίσης 43, Πάτρα, 34213
                </div>
            </div>
            <div class="store-hours">
                <div class="col-5">
                    <b>Ώρες Λειτουργίας:</b>
                </div>
                <div class="col-7">
                    Δευτέρα-Παρασκευή: 08:00-19:00 <br/>
                    Σάββατο: 10:00-16:00 <br/>
                </div>
            </div>
            <div class="store-phone">
                <div class="col-5">
                    <b>Τηλέφωνο επικοινωνίας:</b>
                </div>
                <div class="col-7">
                    2243578963
                </div>
            </div>
            <div class="store-links">
                <div class="store-map">
                    <a href="/common/under_construction.php"> Εμφάνιση στο χάρτη</a>
                </div>
                <div class="store-site">
                    <a href="/common/under_construction.php"> Σελίδα καταστήματος</a>
                </div>
            </div>
        </div>

        <div class="endOfResultsPlaceHolder">

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

    </body>
</html>
