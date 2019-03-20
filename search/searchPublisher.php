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
              <li>Αναζήτηση Εκδότη</li>
            </ul>
        </div>

        <div class="search-container myBooksSearch">
            <input class="MySearchBookSearchBox" type="text" placeholder="Αναζητήστε τον εκδότη που θέλετε..." name="mySearchBookQuery" id="mySearchPublisherTerm">
            <button class="MySearchBookSearchButton" type="submit" onclick="mySearchPublisherFind()"><i class="fa fa-search"></i></button>
        </div>

        <div class="mySearchBookResultsCount">
        Βρέθηκαν <span class="mySearchBookCounter">3</span> αποτελέσματα για 'Παπαδόπουλος'.
        </div>

        <div class="mySearchPublisherOneResult">
            <div class="publisher-image">
                <img src="/images/150.png" alt="Image Placeholder">
            </div>
            <div class="publisher-name">
                Νίκος Παπαδόπουλος
            </div>
            <div class="publisher-description">
                Γεννήθηκε στην Αθήνα. Σπούδασε Θεολογία στο Εθνικό και Καποδιστριακό Πανεπιστημίο Αθηνών. Από το
                1985 ασχολείται με την έκδοση θεολογικών βιβλίων.
            </div>
            <div class="publisher-list-books">
                <a href="/common/under_construction.php"> Βιβλία του εκδότη</a>
            </div>
            <div class="publisher-site">
                <a href="/common/under_construction.php"> Προσωπική σελίδα του εκδότη</a>
            </div>
        </div>

        <div class="mySearchPublisherOneResult">
            <div class="publisher-image">
                <img src="/images/150.png" alt="Image Placeholder">
            </div>
            <div class="publisher-name">
                Δημήτρης Παπαδόπουλος
            </div>
            <div class="publisher-description">
                Γεννήθηκε στην Κωνσταντινούπολη. Σπούδασε Ιστορία και Αρχαιολογία στο Πανεπιστημίο της Κωνσταντινούπολης. Έχει εκδόσει
                πολυάριθμα βιβλία πάνω στην Ελληνική Ιστορία αλλά και στην Αρχαία Ελλάδα.
            </div>
            <div class="publisher-list-books">
                <a href="/common/under_construction.php"> Βιβλία του εκδότη</a>
            </div>
            <div class="publisher-site">
                <a href="/common/under_construction.php"> Προσωπική σελίδα του εκδότη</a>
            </div>
        </div>

        <div class="mySearchPublisherOneResult">
            <div class="publisher-image">
                <img src="/images/150.png" alt="Image Placeholder">
            </div>
            <div class="publisher-name">
                Μιχάλης Παπαδόπουλος
            </div>
            <div class="publisher-description">
                Γεννήθηκε στην Πάτρα. Σπούδασε Χημικός Μηχανικός στο Πανεπιστημίο Πατρών. Εδώ και 10 χρόνια εκδίδει
                βιβλία πάνω στην επιστήμη της Μηχανολογίας.
            </div>
            <div class="publisher-list-books">
                <a href="/common/under_construction.php"> Βιβλία του εκδότη</a>
            </div>
            <div class="publisher-site">
                <a href="/common/under_construction.php"> Προσωπική σελίδα του εκδότη</a>
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
