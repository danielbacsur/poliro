
<!DOCTYPE html>
<html lang="en">
  <?php include("../php/database.php"); ?>
  <?php include('../php/head.php'); ?>

<body class="g-sidenav-show  bg-gray-100">
  <?php include('../php/aside.php'); ?>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <?php include('../php/nav.php'); ?>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Projects table</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center justify-content-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Paragrafus</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Lecke</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Részlet</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Pontosság</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $account_id = $_SESSION['account_id'];
                    $exercise_sql = "SELECT * FROM exercises WHERE account_id='$account_id'";
                    $exercise_qry = mysqli_query($db,$exercise_sql);
                    while ($exercise_arr = mysqli_fetch_array($exercise_qry)) {
                        $exercise_id = $exercise_arr['id'];
                        $exercise_uuid = $exercise_arr['uuid'];
                        $exercise_length = $exercise_arr['length'];
                        $exercise_timestamp = $exercise_arr['timestamp'];
                        
                        
                        $paragraph_id = $exercise_arr['paragraph_id'];
                        $paragraph_sql = "SELECT * FROM paragraphs WHERE id='$paragraph_id'";
                        $paragraph_qry = mysqli_query($db,$paragraph_sql);
                        $paragraph_row = mysqli_fetch_array($paragraph_qry);
                        $paragraph_title = $paragraph_row['title'];
                        $paragraph_section = $paragraph_row["section"];
                        $paragraph_subsection = $paragraph_row["subsection"];
                        $paragraph_text =  $paragraph_row["text"];
                        $paragraph_snippet = mb_substr($paragraph_text, 0, 50);
                        $percent = 40;
                    ?>
                    <tr>
                      <td>
                        <div class="d-flex px-2">
                          <div>
                            <img src="../assets/img/small-logos/logo-spotify.svg" class="avatar avatar-sm rounded-circle me-2" alt="spotify">
                          </div>
                          <div class="my-auto">
                            <h6 class="mb-0 text-sm">Paragrafus #<?php echo $paragraph_id; ?></h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-sm font-weight-bold mb-0"><?php echo implode('.', [$paragraph_title, $paragraph_section, $paragraph_subsection]); ?></p>
                      </td>
                      <td>
                        <span class="text-sm font-weight-bold"><?php echo $paragraph_snippet; ?></span>
                      </td>
                      <td class="align-middle text-center">
                        <div class="d-flex align-items-center justify-content-center">
                          <span class="me-2 text-sm font-weight-bold"><?php echo $percent; ?>%</span>
                          <div>
                            <div class="progress">
                              <div class="progress-bar bg-gradient-info" role="progressbar" aria-valuenow="<?php echo $percent; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $percent; ?>%;"></div>
                            </div>
                          </div>
                        </div>
                      </td>
                      <td class="align-middle">
                        <a class="text-secondary font-weight-bold text-sm mb-0">
                          Megtekintés
                        </a>
                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer pt-3  ">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-muted text-lg-start">
                © <script>
                  document.write(new Date().getFullYear())
                </script>,
                made with <i class="fa fa-heart"></i> by
                <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Creative Tim</a>
                for a better web.
              </div>
            </div>
            <div class="col-lg-6">
              <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                <li class="nav-item">
                  <a href="https://www.creative-tim.com" class="nav-link text-muted" target="_blank">Creative Tim</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted" target="_blank">About Us</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/blog" class="nav-link text-muted" target="_blank">Blog</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted" target="_blank">License</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </main>
  <!--   Core JS Files   -->
  <?php include('../php/core.php'); ?>
</body>

</html>