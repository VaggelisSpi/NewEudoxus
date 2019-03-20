<!-- Header Start -->
<div class="my-nav-bar">
    <!-- Navigation -->
    <nav class="navbar fixed-top navbar-expand navbar-dark bg-dark">
      <a class="navbar-brand ml-auto" href="/index.php">Νέος Εύδοξος</a>
        <ul class="my-navbar-main-list navbar-nav">
          <li class="nav-item">
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
              <a class="dropdown-item" href="/secretary/secretary_info.php">Πληροφορίες για Γραμματείες</a>
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
