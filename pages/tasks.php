
<!DOCTYPE html>
<html lang="en">
  <?php $root_filename = basename(__FILE__); ?>
  <?php include("../php/database.php"); ?>
  <?php include('../php/head.php'); ?>

  <body class="g-sidenav-show  bg-gray-100">
    <?php include('../php/aside.php'); ?>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
      <?php include('../php/nav.php'); ?>
      <div class="container-fluid py-4">
        <div class="row">
          <div class="col-12">
            <div class="card mb-4">
              <div class="card-header pb-0">
                <h6>Határidős Feladatok</h6>
              </div>
              <div class="card-body px-0 pt-0 pb-0">
                <div class="table-responsive p-0">
                  <table class="table align-items-center justify-content-center mb-0">
                    <thead>
                      <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Paragrafus</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Lecke</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Részlet</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Kezdés</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Határidő</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $account_id = $_SESSION['account_id'];
                      $paragraph_sql = "SELECT * FROM paragraphs WHERE id NOT IN (SELECT paragraph_id FROM exercises WHERE account_id=$account_id) LIMIT 20";
                      $paragraph_qry = mysqli_query($db,$paragraph_sql);
                      while ($paragraph_arr = mysqli_fetch_array($paragraph_qry)) {
                          $paragraph_id = $paragraph_arr['id'];
                          $paragraph_title = $paragraph_arr['title'];
                          $paragraph_section = $paragraph_arr["section"];
                          $paragraph_subsection = $paragraph_arr["subsection"];
                          $paragraph_text =  $paragraph_arr["text"];
                          $paragraph_start =  $paragraph_arr["start"];
                          $paragraph_deadline =  $paragraph_arr["deadline"];
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
                        <td>
                          <span class="text-sm font-weight-bold"><?php echo $paragraph_start; ?></span>
                        </td>
                        <td>
                          <span class="text-sm font-weight-bold"><?php echo $paragraph_deadline; ?></span>
                        </td>
                        <td class="align-middle">
                          <a class="text-secondary font-weight-bold text-sm mb-0" href="../php/exercise.php?exercise_uuid=<?php echo $exercise_uuid; ?>">
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
        <div class="row">
          <div class="col-12">
            <div class="card mb-4">
              <div class="card-header pb-0">
                <h6>Gyakorlatok</h6>
              </div>
              <div class="card-body px-0 pt-0 pb-0">
                <div class="table-responsive p-0">
                  <table class="table align-items-center justify-content-center mb-0">
                    <thead>
                      <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Paragrafus</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Lecke</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Részlet</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $account_id = $_SESSION['account_id'];
                      $paragraph_sql = "SELECT * FROM paragraphs WHERE id NOT IN (SELECT paragraph_id FROM exercises WHERE account_id=$account_id) LIMIT 20";
                      $paragraph_qry = mysqli_query($db,$paragraph_sql);
                      while ($paragraph_arr = mysqli_fetch_array($paragraph_qry)) {
                          $paragraph_id = $paragraph_arr['id'];
                          $paragraph_title = $paragraph_arr['title'];
                          $paragraph_section = $paragraph_arr["section"];
                          $paragraph_subsection = $paragraph_arr["subsection"];
                          $paragraph_text =  $paragraph_arr["text"];
                          $paragraph_deadline =  $paragraph_arr["deadline"];
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
                        <td class="align-middle">
                          <a class="text-secondary font-weight-bold text-sm mb-0" href="../php/exercise.php?exercise_uuid=<?php echo $exercise_uuid; ?>">
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
        <?php include('../php/footer.php'); ?>
      </div>
    </main>
    <?php include('../php/core.php'); ?>
  </body>
</html>