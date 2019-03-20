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
              <li>Αναζήτηση Συγγραμμάτων</li>
            </ul>
        </div>

        <div class="search-container myBooksSearch">
            <input class="MySearchBookSearchBox" type="text" placeholder="Αναζήτηση..." name="mySearchBookQuery" id="mySearchBookTerm">
            <button class="MySearchBookSearchButton" type="submit" onclick="mySearchBookFind()"><i class="fa fa-search"></i></button>
        </div>

        <div id="filterButtonContainer" class="myBooksSearchFiltersButton">
            <a href="#" class="btn" onclick="BookSearchFilterToggle()" id="myFilterButton"> Φίλτρα <br/> Αναζήτησης <i id="filterButtonIcon" class="fa fa-angle-down" aria-hidden="true"></i> </a>
        </div>

        <div class="myBooksSearchFiltersInput myHiddenClass" id="myFiltersInput">
            <div class="form-group row">
              <label for="University" class="col-2 col-form-label">Ίδρυμα:</label>
              <div class="col-3">
                <!-- <input type="text" name="University" id="myUniv-filter" class="form-control" > -->
                <select class="" name="university" id="myUniv-search-select" onchange="myDepartmentOptionsDisplaySearchBooks(this.value)">
                    <option value="" selected disabled hidden>Επιλογή Ιδρύματος</option>
                    <?php
                        $path = $_SERVER['DOCUMENT_ROOT'];
                        $path .= "/common/universityValues.php";
                        include $path;
                    ?>
                </select>
              </div>
              <div class="col-2"></div>
              <label for="Publisher" class="col-2 col-form-label">Εκδόσεις:</label>
              <div class="col-3">
                <input type="text" name="Publisher" id="myPubl-filter" class="form-control" >
              </div>
            </div>
            <div class="form-group row">
              <label for="Department" class="col-2 col-form-label">Τμήμα:</label>
              <div class="col-3">
                <!-- <input type="text" name="Department" id="myDep-filter" class="form-control" > -->
                <select class="" name="department" id="myDepart-search-select" disabled>
                    <option value="" selected disabled hidden>Επιλογή Τμήματος</option>
                </select>
              </div>
              <div class="col-2"></div>
              <label for="Author" class="col-2 col-form-label">Συγγραφέας:</label>
              <div class="col-3">
                <input type="text" name="Author" id="myAuthor-filter" class="form-control" >
              </div>
            </div>
            <div class="form-group row">
              <label for="Semister" class="col-2 col-form-label">Εξάμηνο:</label>
              <div class="col-3">
                <!-- <input type="text" name="Semister" id="mySem-filter" class="form-control" > -->
                <select id="mySem-search-select">
                    <option value="" selected disabled hidden>Νο</option>
                    <option value="1">1ο</option>
                    <option value="2">2ο</option>
                    <option value="3">3ο</option>
                    <option value="4">4ο</option>
                    <option value="5">5ο</option>
                    <option value="6">6ο</option>
                    <option value="7">7ο</option>
                    <option value="8">8ο</option>
                </select>
              </div>
              <div class="col-2"></div>
              <label for="Isbn" class="col-2 col-form-label">ISBN:</label>
              <div class="col-3">
                <input type="text" name="Isbn" id="myIsbn-filter" class="form-control" >
              </div>
            </div>
            <div class="form-group row">
              <label for="Subject" class="col-2 col-form-label">Μάθημα:</label>
              <div class="col-3">
                <input type="text" name="Subject" id="mySubj-filter" class="form-control" >
              </div>
              <div class="col-2"></div>
              <label for="Year" class="col-2 col-form-label">Έτος:</label>
              <div class="col-3">
                <input type="text" name="Year" id="myYear-filter" class="form-control" >
              </div>
            </div>
            <div class="form-group row">

              <div class="col-8"></div>
              <div class="col-4">
                <a href="#" class="btn" onclick="mySearchBookFind()" id="myFilterApplyButton"> Εφαρμογή Φίλτρων </a>
              </div>
            </div>
        </div>

        <?php
            $path = $_SERVER['DOCUMENT_ROOT'];
            $path .= "/search/executeSearch.php";
            include $path;
        ?>

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
