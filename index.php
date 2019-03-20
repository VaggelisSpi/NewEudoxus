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

        <!-- Header Start -->
        <div class="my-nav-bar">
            <!-- Navigation -->
            <nav class="navbar fixed-top navbar-expand navbar-dark bg-dark">
              <a class="navbar-brand ml-auto" href="/index.php">Νέος Εύδοξος</a>
                <ul class="my-navbar-main-list navbar-nav">
                  <li class="nav-item active">
                    <a class="nav-link" href="/index.php"><i class="fa fa-home" aria-hidden="true"></i>Αρχική <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="/common/under_construction.php">Ανακοινώσεις</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="/common/under_construction.php">Επικοινωνία</a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="/common/under_construction.php" id="navbarDropdownInfo" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Πληροφορίες
                    </a>
                    <div class="dropdown-menu dropdown-menu-right myNavbarDropdownInfo" aria-labelledby="navbarDropdownInfo">
                      <a class="dropdown-item" href="/student/student_info.php">Πληροφορίες για Φοιτητές</a>
                      <a class="dropdown-item" href="/secretary/secretary_info.php">Πληροφορίες για Γραμματείς</a>
                      <a class="dropdown-item" href="/common/under_construction.php">Πληροφορίες για Εκδότες</a>
                      <a class="dropdown-item" href="/common/under_construction.php">Πληροφορίες για Βιβλιοθήκη</a>
                    </div>
                  </li>
                </ul>
                <div class="home-page-search">
                    <form class="my-search-bar" onsubmit="return homePageSearchSubmit()">
                      <div class="inner-form">
                        <div class="input-field first-wrap">
                          <div class="input-select">
                            <select id="home-page-search-select" onchange="homePageSearchSelect(this.value)">
                              <option value="book" selected>Σύγγραμμα</option>'
                              <option value="store">Σημείο Διανομής</option>'
                              <option value="publisher">Εκδότης</option>'
                            </select>
                          </div>
                        </div>
                        <div class="input-field second-wrap">
                          <input id="home-page-search-input" type="text" placeholder="Αναζήτηση..." />
                        </div>
                        <div class="input-field third-wrap">
                          <button class="btn-search" type="button">
                            <svg class="svg-inline--fa fa-search fa-w-16" aria-hidden="true" data-prefix="fas" data-icon="search" role="img" viewBox="0 0 512 512">
                              <path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path>
                            </svg>
                          </button>
                        </div>
                      </div>
                    </form>
                </div>
                <?php
                    $path = $_SERVER['DOCUMENT_ROOT'];
                    $path .= "/login/isLoggedIn.php";
                    include $path;
                ?>
            </nav>
        </div>
        <!-- Header End -->

        <?php
            $path = $_SERVER['DOCUMENT_ROOT'];
            $path .= "/common/userOptions.php";
            include $path;
        ?>

        <div class="my-breadcrumb">
            <ul class="breadcrumb">
              <li><a href="/index.php"><i class="fa fa-home" aria-hidden="true"></i></a></li>
            </ul>
        </div>


            <div class="main-content mr-auto ml-auto">
                <div class="my-section student-area">
                  <div class="title-area">
                    <h5> <svg height="40px" viewBox="0 0 512 512.0005" width="40px" ><path d="m482 333.582031v-205.96875l20.25-7.5625c5.851562-2.183593 9.738281-7.773437 9.75-14.023437s-3.855469-11.851563-9.699219-14.058594l-241-91c-3.417969-1.292969-7.183593-1.292969-10.597656 0l-241 91c-5.851563 2.207031-9.7148438 7.808594-9.703125 14.058594s3.898438 11.839844 9.753906 14.023437l81.246094 30.34375v109.355469c0 6.132812 3.734375 11.648438 9.429688 13.925781 49.699218 19.882813 102.042968 29.960938 155.570312 29.960938s105.871094-10.078125 155.570312-29.960938c5.695313-2.277343 9.429688-7.792969 9.429688-13.925781v-109.355469l31-11.578125v194.765625c-17.457031 6.191407-30 22.863281-30 42.417969 0 11.515625 4.355469 22.03125 11.496094 30-7.140625 7.96875-11.496094 18.484375-11.496094 30v61c0 8.285156 6.714844 15 15 15h60c8.285156 0 15-6.714844 15-15v-61c0-11.515625-4.355469-22.03125-11.496094-30 7.144532-7.96875 11.496094-18.484375 11.496094-30 0-19.554688-12.539062-36.226562-30-42.417969zm-226-302.546875 198.332031 74.886719c-8.78125 3.28125-189.585937 70.800781-198.332031 74.066406-6.605469-2.464843-184.097656-68.75-198.332031-74.066406zm135 218.421875c-87.445312 32.410157-182.554688 32.410157-270 0v-87.859375l129.753906 48.457032c3.382813 1.261718 7.109375 1.261718 10.496094 0l129.75-48.457032zm76 111.542969c8.269531 0 15 6.730469 15 15 0 8.273438-6.730469 15-15 15s-15-6.726562-15-15c0-8.269531 6.730469-15 15-15zm15 121h-30v-46c0-8.269531 6.730469-15 15-15s15 6.730469 15 15zm0 0"/> <path d="m271 106c0 8.285156-6.714844 15-15 15s-15-6.714844-15-15 6.714844-15 15-15 15 6.714844 15 15zm0 0"/> </svg>
                    <span class="my-svg-text">Φοιτητής</span> </h5>
                  </div>
                  <div class="button-area">
                          <a href="/student/dilosi_step.php" class="btn section-button" >Δήλωση Συγγραμμάτων</a>
                          <a href="/common/under_construction.php" class="btn section-button" >Ανταλλαγή Συγγραμμάτων</a>
                          <a href="/student/student_app.php" class="btn section-button" >Εφαρμογή Φοιτητών</a>
                          <a href="/student/student_info.php" class="btn section-button" ><span class="my-content">Πληροφορίες <br> για Φοιτητές</a>
                  </div>
                </div>
                <div class="my-section secretary-area">
                    <div class="title-area">
                      <h5>

                          <svg version="1.1" id="Capa_1" x="0px" y="0px" width="40px" height="40px"
                          	 viewBox="0 0 399.688 399.688" style="enable-background:new 0 0 399.688 399.688; " xml:space="preserve">
                          <g>
                              <path d="M389.688,169.477H130.201c0.001-0.045,0.007-0.088,0.007-0.133v-16h57.636c5.523,0,10-4.477,10-10v-85
                              c0-5.523-4.477-10-10-10H52.572c-5.523,0-10,4.477-10,10v85c0,5.523,4.477,10,10,10h57.636v16c0,0.045,0.006,0.088,0.007,0.133H10
                              c-5.523,0-10,4.477-10,10s4.477,10,10,10h0.857v135.914c0,5.523,4.477,10,10,10h7.487v5.953c0,5.523,4.477,10,10,10s10-4.477,10-10
                              v-5.953h81.759c5.523,0,10-4.477,10-10v-26.479h119.482v26.479c0,5.523,4.477,10,10,10h81.759v5.953c0,5.523,4.477,10,10,10
                              s10-4.477,10-10v-5.953h7.487c5.523,0,10-4.477,10-10V189.477h0.857c5.523,0,10-4.477,10-10S395.21,169.477,389.688,169.477z
                              M62.572,68.344h115.272v65H62.572V68.344z M120.103,189.477v52.957H30.857v-52.957H120.103z M30.857,315.391v-52.957h89.246
                              v52.957H30.857z M140.103,278.913v-89.436h119.482v89.436H140.103z M279.585,262.434h89.246v52.957h-89.246V262.434z
                              M368.831,242.434h-89.246v-52.957h89.246V242.434z"/>
                              <path d="M90.364,278.913H60.596c-5.523,0-10,4.477-10,10s4.477,10,10,10h29.768c5.523,0,10-4.477,10-10
                              S95.887,278.913,90.364,278.913z"/>
                              <path d="M60.596,225.956h29.768c5.523,0,10-4.477,10-10s-4.477-10-10-10H60.596c-5.523,0-10,4.477-10,10
                              S55.073,225.956,60.596,225.956z"/>
                              <path d="M339.092,278.913h-29.768c-5.523,0-10,4.477-10,10s4.477,10,10,10h29.768c5.523,0,10-4.477,10-10
                              S344.615,278.913,339.092,278.913z"/>
                              <path d="M309.324,225.956h29.768c5.523,0,10-4.477,10-10s-4.477-10-10-10h-29.768c-5.523,0-10,4.477-10,10
                              S303.801,225.956,309.324,225.956z"/>
                          </g><g></g><g>
                          </g><g></g>
                          <g></g>
                          <g></g>
                          <g></g>
                          <g></g>
                          <g></g>
                          <g></g>
                          <g></g><g>
                          </g><g></g>
                          <g></g>
                          <g></g>
                          <g></g>
                          </svg>



                          <span class="my-svg-text">Γραμματεία</span></h5>
                    </div>
                    <div class="button-area">
                            <a href="/secretary/secretary_edit_books_prepare.php" class="btn section-button" >Διαχείριση Συγγραμμάτων</a>
                            <a href="/common/under_construction.php" class="btn section-button" >Επεξεργασία <br> Προγράμματος Σπουδών</a>
                            <a href="/secretary/secretary_app.php" class="btn section-button" >Εφαρμογή Γραμματείας</a>
                            <a href="/secretary/secretary_info.php" class="btn section-button" ><span class="my-content">Πληροφορίες <br> για Γραμματείς</a>
                    </div>
                </div>
                <div class="my-section publisher-area">
                    <div class="title-area">
                      <h5>
                          <svg version="1.1" id="Capa_1" width="45px" height="45px" x="0px" y="0px"
                              viewBox="0 0 465 465" style="enable-background:new 0 0 465 465;" xml:space="preserve">
                          <g>
                              <path d="M240,356.071V132.12c0-4.143-3.357-7.5-7.5-7.5s-7.5,3.357-7.5,7.5v223.951c0,4.143,3.357,7.5,7.5,7.5
                                  S240,360.214,240,356.071z"/>
                              <path d="M457.5,75.782c-15.856,0-35.614-6.842-56.533-14.085c-26.492-9.174-56.521-19.571-87.663-19.571
                                  c-36.035,0-58.019,15.791-70.115,29.038c-4.524,4.956-8.03,9.922-10.688,14.327c-2.658-4.405-6.164-9.371-10.688-14.327
                                  c-12.097-13.247-34.08-29.038-70.115-29.038c-31.143,0-61.171,10.397-87.663,19.571C43.114,68.94,23.356,75.782,7.5,75.782
                                  c-4.143,0-7.5,3.357-7.5,7.5v302.092c0,4.143,3.357,7.5,7.5,7.5c18.38,0,39.297-7.243,61.441-14.911
                                  c25.375-8.786,54.136-18.745,82.755-18.745c24.54,0,44.403,8.126,59.038,24.152c2.792,3.058,7.537,3.273,10.596,0.48
                                  s3.273-7.537,0.48-10.596c-12.097-13.246-34.08-29.037-70.114-29.037c-31.143,0-61.171,10.397-87.663,19.571
                                  C46.298,369.931,29.396,375.782,15,377.422V90.41c16.491-1.571,34.755-7.896,53.941-14.539
                                  c25.375-8.786,54.136-18.745,82.755-18.745c57.881,0,73.025,45.962,73.634,47.894c0.968,3.148,3.876,5.298,7.17,5.298
                                  s6.202-2.149,7.17-5.298c0.146-0.479,15.383-47.894,73.634-47.894c28.619,0,57.38,9.959,82.755,18.745
                                  c19.187,6.644,37.45,12.968,53.941,14.539v287.012c-14.396-1.64-31.298-7.491-49.033-13.633
                                  c-26.492-9.174-56.521-19.571-87.663-19.571c-36.036,0-58.02,15.791-70.115,29.038c-2.793,3.06-2.578,7.803,0.48,10.596
                                  c3.06,2.793,7.804,2.578,10.596-0.48c14.635-16.027,34.498-24.153,59.039-24.153c28.619,0,57.38,9.959,82.755,18.745
                                  c22.145,7.668,43.062,14.911,61.441,14.911c4.143,0,7.5-3.357,7.5-7.5V83.282C465,79.14,461.643,75.782,457.5,75.782z"/>
                              <path d="M457.5,407.874c-15.856,0-35.614-6.842-56.533-14.085c-26.492-9.174-56.521-19.571-87.663-19.571
                                  c-33.843,0-55.291,13.928-67.796,26.596l-26.017-0.001c-12.505-12.668-33.954-26.595-67.795-26.595
                                  c-31.143,0-61.171,10.397-87.663,19.571c-20.919,7.243-40.677,14.085-56.533,14.085c-4.143,0-7.5,3.357-7.5,7.5s3.357,7.5,7.5,7.5
                                  c18.38,0,39.297-7.243,61.441-14.911c25.375-8.786,54.136-18.745,82.755-18.745c24.54,0,44.403,8.126,59.038,24.152
                                  c1.421,1.556,3.431,2.442,5.538,2.442l32.454,0.001c2.107,0,4.117-0.887,5.538-2.442c14.635-16.027,34.498-24.153,59.039-24.153
                                  c28.619,0,57.38,9.959,82.755,18.745c22.145,7.668,43.062,14.911,61.441,14.911c4.143,0,7.5-3.357,7.5-7.5
                                  S461.643,407.874,457.5,407.874z"/>
                          </g>
                          <g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g>
                          <g>
                          </g>
                        </svg>


                          <span class="my-svg-text">Εκδότες</span></h5>
                    </div>
                    <div class="button-area">
                            <a href="/common/under_construction.php" class="btn section-button" >Προσθήκη Συγγράμματος</a>
                            <a href="/common/under_construction.php" class="btn section-button" >Διαχείριση <br> Σημείων Διανομής</a>
                            <a href="/common/under_construction.php" class="btn section-button" >Εφαρμογή Εκδοτών</a>
                            <a href="/common/under_construction.php" class="btn section-button" ><span class="my-content">Πληροφορίες <br> για Εκδότες</a>
                    </div>
                </div>
                <div class="my-section library-area">
                    <div class="title-area">
                      <h5>
                          <svg version="1.1" id="Capa_1" width="45px" height="45px" x="0px" y="0px"
                            viewBox="0 0 464.585 464.585" style="enable-background:new 0 0 464.585 464.585;" xml:space="preserve">
                          <g>
                              <path d="M464.585,393.312L377.122,78.297L301.73,99.229l8.329,29.998h-83.857V87.446h-78.243v30.92h-42.373V50.207H0v364.17h90.586
                                h15h42.373h15h48.243h15h98.153V180.715l64.838,233.528L464.585,393.312z M162.959,102.446h48.243v37.147h-48.243V102.446z
                                M162.959,201.81h48.243v170.575h-48.243V201.81z M162.959,186.81v-8.608h48.243v8.608H162.959z M162.959,163.202v-8.609h48.243
                                v8.609H162.959z M90.586,370.189H15V94.199h75.586V370.189z M90.586,65.207v13.992H15V65.207H90.586z M15,399.378v-14.189h75.586
                                v14.189H15z M147.959,399.378h-42.373V133.366h42.373V399.378z M162.959,399.378v-11.993h48.243v11.993H162.959z M309.355,399.378
                                h-83.153V144.226h83.153V399.378z M399.634,395.778l-52.742-189.961l46.485-12.907l52.742,189.961L399.634,395.778z
                                M342.879,191.364l-4.133-14.884l46.485-12.907l4.133,14.884L342.879,191.364z M366.681,96.762l14.537,52.358l-46.485,12.907
                                l-14.537-52.358L366.681,96.762z"/>
                            <rect x="243.621" y="160.457" width="48.315" height="15"/>
                            <rect x="243.621" y="186.81" width="48.315" height="15"/>
                            <rect x="243.621" y="213.164" width="48.315" height="15"/>
                            <rect x="243.621" y="365.797" width="48.315" height="15"/>
                            <rect x="119.272" y="272.274" width="15" height="25.255"/>
                            <rect x="119.272" y="311.805" width="15" height="57.099"/>
                            <rect x="119.272" y="189.919" width="15" height="68.081"/>
                            <rect x="119.272" y="150.387" width="15" height="26.354"/>
                          </g>
                          <g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g>
                          </svg>

                          <span class="my-svg-text">Βιβλιοθήκες</span></h5>
                    </div>
                    <div class="button-area">
                            <a href="/common/under_construction.php" class="btn section-button" >Διαχείριση Συγγραμμάτων</a>
                            <a href="/common/under_construction.php" class="btn section-button" >Συνεργαζόμενοι Εκδότες</a>
                            <a href="/common/under_construction.php" class="btn section-button" >Εφαρμογή Βιβλιοθηκών</a>
                            <a href="/common/under_construction.php" class="btn section-button" ><span class="my-content">Πληροφορίες <br> για Βιβλιοθήκες</a>
                    </div>
                </div>
            </div>


            <div class="my-announcement mr-auto ml-auto">

                <p> Ανακοινώσεις </p>
                <div class="an-announcement">
                    <div class="date">
                        05/01/2019
                    </div>
                    <div class="announcement-content">
                        Η προθεσμία για την δήλωση των συγγραμμάτων λήγει στις 23/01/2019. Παρακαλείσθε όλοι να μεριμνήσετε για την έγκαιρη...
                    </div>
                    <div class="announcement-more">
                        <a href="/common/under_construction.php"> Διαβάστε περισσότερα</a>
                    </div>
                </div>

                <div class="an-announcement">
                    <div class="date">
                        02/01/2019
                    </div>
                    <div class="announcement-content">
                        Ανακοινώθηκε η εγκύκλιος για τον διορισμό ενός ατόμου στην θέση του υπεύθυνου αναπληρωτή για...
                    </div>
                    <div class="announcement-more">
                        <a href="/common/under_construction.php"> Διαβάστε περισσότερα</a>
                    </div>
                </div>

                <div class="an-announcement">
                    <div class="date">
                        01/01/2019
                    </div>
                    <div class="announcement-content">
                        Η ομάδα του Εύδοξου ανακοινώνει ότι από 01/01/2019 αλλάζει η πολιτική απορρήτου. Παρακαλείσθε όλοι να...
                    </div>
                    <div class="announcement-more">
                        <a href="/common/under_construction.php"> Διαβάστε περισσότερα</a>
                    </div>
                </div>

            </div>




        <?php
            $path = $_SERVER['DOCUMENT_ROOT'];
            $path .= "/common/footer.php";
            include $path;
        ?>

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

        <!-- Logout Modal -->
        <div class="modal" id="logoutModal">
          <div class="modal-dialog">
            <div class="modal-content">

              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title">Επιτυχής αποσύνδεση</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>

              <!-- Modal body -->
              <!-- <div class="modal-body">
                Αποσυνδεθήκατε Επιτυχώς!
              </div> -->

              <!-- Modal footer -->
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              </div>

            </div>
          </div>
        </div>

        <!-- Logout Modal -->
        <div class="modal" id="registrationModal">
          <div class="modal-dialog">
            <div class="modal-content">

              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title">Επιτυχής εγγραφή</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>

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
            if (isset($_GET['logout'])) {
                if(isset($_SESSION['loggedoutMessage'])){
                    //we have already shown this message
                }
                else{
                    $_SESSION['loggedoutMessage'] = true;
                    echo '<script>logoutPopup()</script>';
                }

            }
            if (isset($_GET['register'])) {
                if(isset($_SESSION['registrationMessage'])){
                    //we have already shown this message
                }
                else{
                    $_SESSION['registrationMessage'] = true;
                    echo '<script>registerPopup()</script>';
                }
            }
        ?>

    </body>
</html>
