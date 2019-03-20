<?php

    include 'searchFuncs.php';

    function printResults($rows, $result, $searchTerm='') {
        $pageLimit = 3;

        $totalPages = intdiv ($rows , $pageLimit );
        if( $rows % $pageLimit != 0 ){
            $totalPages ++;
        }

        if ($rows > 0) {
            if ($searchTerm != '') {
                echo '
                    <div class="mySearchBookResultsCount">
                    Βρέθηκαν <span class="mySearchBookCounter">'.$rows.'</span> αποτελέσματα για \''.$searchTerm.'\'.
                    </div>
                    <div id="paginationTotalPages" class="pagination-hidden-content">'.$totalPages.'</div>
                    <div id="paginationPageLimit" class="pagination-hidden-content">'.$pageLimit.'</div>
                    <div id="paginationCurrentPage" class="pagination-hidden-content">2</div>
                ';
            } else {
                echo '
                    <div class="mySearchBookResultsCount">
                    Βρέθηκαν <span class="mySearchBookCounter">'.$rows.'</span> αποτελέσματα
                    </div>
                    <div id="paginationTotalPages" class="pagination-hidden-content">'.$totalPages.'</div>
                    <div id="paginationPageLimit" class="pagination-hidden-content">'.$pageLimit.'</div>
                    <div id="paginationCurrentPage" class="pagination-hidden-content">2</div>
                ';
            }

            while ($rows != 0) {
                if ($rows > $pageLimit) {
                    $page_res = $pageLimit;
                    $rows = $rows - $pageLimit;
                } else {
                    $page_res = $rows;
                    $rows = 0;
                }

                echo '
                    <div id="overlay" class="loading-overlay"><div id="text" class="overlay-content">Loading...</div></div>
                    <div id="searchResults-pagination-container-id" class="searchResults-pagination-container">
                ';
                for ($i=0; $i < $page_res; $i++) {
                    $row = $result->fetch_assoc();
                    echo '
                            <div class="mySearchBookOneResult">
                                <div class="book-image">
                                    <img src="/images/150.png" alt="Image Placeholder">
                                </div>
                                <div class="book-title">'.$row["Name"].'
                                </div>
                                <div class="book-authors">'.$row["Author"].'
                                </div>
                                <div class="book-publisher">
                                    Εκδόσεις: '.$row["Publisher"].'
                                </div>
                                <div class="book-isbn">
                                    ISBN: '.$row["ISBN"].'
                                </div>
                                <div class="book-comments">
                                    <a href="#">Σχόλια(5)</a>
                                </div>
                                <div class="book-page">
                                    <a href="/common/under_construction.php"> Σελίδα του Βιβλίου <i class="fa fa-chevron-right" aria-hidden="true"></i> </a>
                                </div>
                            </div>';
                }

                // End of searchResults-pagination-container
                echo '</div>';

                if ($rows > $pageLimit) { /* Put pagination button */
                    echo '
                        <div id="more-button-pagination-div-id" class="more-button-pagination">
                            <span class="btn" tabindex="1" id="more-button-pagination-id"> <span class="btn-content" >Περισσότερα</span> </span>
                        </div>';
                }

                break;
            }
        }
        else {
            if ($searchTerm != '') {
                echo '
                    <div class="mySearchBookResultsCount">
                    Δεν βρέθηκαν αποτελέσματα για \''.$searchTerm.'\'.
                    </div>';
            }
            else{
                echo '
                    <div class="mySearchBookResultsCount">
                    Δεν βρέθηκαν αποτελέσματα.
                    </div>';
            }

        }

        echo '<div class="endOfResultsPlaceHolder">
                </div>';
    }

// main like
    $path = $_SERVER['DOCUMENT_ROOT'];
    $path .= "/db_login/login_db.php";
    include $path;

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    if (!$conn->set_charset("utf8")) {
        // printf("Error loading character set utf8: %s<br>", $conn->error);
        exit();
    } else {
        // printf("Current character set: %s<br>", $conn->character_set_name());
    }

    if (isset($_REQUEST['q'])) {
       executeSearchWithArg($conn);
    }
    else {
        executeSearchWithoutArg($conn);
    }

    $conn->close();
?>
